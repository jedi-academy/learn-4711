#Job 3 - Ordered List Page Features

_Part of COMP4711 Lab 5, Winter 2017_

We want to present a two-column layout, with the left side showing
tasks ordered by priority (high to low), and the right side showing
tasks ordered by category (alphabetically).
We will need a controller, layout template, and view fragments for this.

#A. Setup the second template

Copy <code>application/views/template.php</code> to another view file,
<code>template-secondary.php</code>. 

The big change here is that we intend to have two panels 
making up the page, split evenly. Bootstrap can do that :)
Drawing on your COMP1536 memories, we can setup this template
so that the `<body>` has two columns, side by side at large
window sizes and stacked at smaller window sizes.

    ...
    <div id="content">
        <h1>{pagetitle}</h1>
        <div class="row">
            <div class="lg-6 md-12">
                {content}
            </div>
            <div class="lg-6 md-12">
                {rightside}
            </div>
        </div>
    </div>
    ...

I purposefully used "content" as one of the view parameters,
presumably the more important one, to play nicely with the
way that the view templating has been setup originally in our app.

We need a controller to load this view. It will start out similar to
our original `Welcome`, but named `Views` to match the navbar link.

    class Views extends Application
    {

        public function index()
        {
            $this->data['pagetitle'] = 'Ordered TODO List';
            $tasks = $this->tasks->all();	// get all the tasks

            $this->data['pagebody'] = 'by_priority';
            $this->data['rightside'] = 'by_category';

            $this->render('template-secondary'); 
        }

    }

If you provide empty `by_priority.php` and `by_category.php` view files,
the page will render without errors, but without any task lists.

Let's add a simple title to each of these ordered views, so we can get a 
better feel for the layout.


This panel could be an image or image carousel, but we're just
going to use a Bootstrap [jumbotron](http://getbootstrap.com/components/#jumbotron) 
to keep things simple.

The jumbotron HTML can be injected into the template, above the <code>content</code>
variable...

    <div id="container">
        {navbar}
        <div class="jumbotron">
            <h1>We're hiring</h1>
            <p>You know it would look great on your resume!</p>
            <p>Check out our current offerings and benefits below.</p>
        </div>
        {content}


Nothing we can see yet, because we need the <code>Hiring</code>
controller, which is already linked to in our navbar.

##2.2 Setup a Hiring Page

Copy <code>application/controllers/Welcome.php</code>, to
<code>Hiring.php</code>, and tailor both the filename
and the class name. 

We can provide some dummy content for now, and 
don't forget to request our new layout template.

We have a pretty empty hiring handler!

    class Hiring extends Application {

	function __construct() {
            parent::__construct();
	}
	
	public function index() {
            $this->data['content'] = 'Hi there';
            $this->render('template-secondary'); 
	}
    }

And clicking on the "Hiring" navbar link shows us a hiring page:

<img class="scale" src="/pix/tutorials/5/61.png" />

##2.3 Hiring page body

Now for the "meat" of the hiring page.
We want to use a markdown file, so that even a pointy-haired boss could
update the offerings. If your markdown is rusty (or non-existent),
there is a [Markdown cheatsheet](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
available.

For this lab, the markdown file can contain pretty much anything ... 
be creative, not offensive.

The "trick" is converting the markdown into HTML.
Copy <code>application/libraries/Parsedown.php</code> from the
[course hub repo](https://github.com/jedi-academy/learn-4711), 
into your libraries folder.
This is a [third party Markdown processor](http://parsedown.org/) 
that I use.

I suggest adding it to the appropriate line in the <code>autoload.php</code>
file, or else you will need to explicitly load it in your controller or in the base
controller.

    ...
    $autoload['libraries'] = array('parser', 'database', 'parsedown');

Create <code>/data/jobs.md</code>, with a glowing description of the employee
benefits you offer, a list of current openings, and then contact information
for interested applicants.

Have fun & be creative, not just copying mine.

Here is mine, as an example (and **only** an example):

    Jim's Joint is an award-winning fast food restaurant in beautiful downtown Montague.
    We have full medical, dental, burial,  stressful and joyful benefits for 
    employees lasting more than three months.

    Current openings:

    - cook
    - bottlewasher
    - bouncer
    - assistant to the bouncer
    - sandwich artist
    - social media manager

    Please drop off a resume during opening hours, with muffins. We need muffins - they
    aren't on the menu. Preferably carrot muffins.

    _Our award was for "most likely to be appreciated by zombies",
    but an award is an award._

##2.4 Hiring page body

How do we convert this into beautful HTML? Get the contents
of the markdown file into a string, and run that string
through the markdown processor.

This will complicate our <code>Hiring::index()</code> only a little ...

    public function index() {
        $stuff = file_get_contents('../data/jobs.md');
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render('template-secondary'); 
    }

All going well, you should see something like ...

<img class="scale" src="/pix/tutorials/5/62.png" />

If you wanted to use substitution variables in your markdown, you could
run the result through the template parser as well.

        $stuff = file_get_contents('../data/jobs.md');
        $htmlstuff = $this->parsedown->parse($stuff);
        $this->data['content'] = $this->parser->parseString($htmlstuff,$parameters,true);
        $this->render('template-secondary'); 

If you wanted to do some substitutions and then convert markdown into
HTML, you can use the parsers in the reverse order.

        $stuff = file_get_contents('../data/jobs.md');
        $mdstuff = $this->parser->parseString($stuff,$parameters,true);
        $this->data['content'] = $this->parsedown->parse($mdstuff);
        $this->render('template-secondary'); 

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>

