#Views - Using Markdown for construction

_Part of COMP4711 Lab 5, Fall 2016_

<div class="alert alert-info">
This assumes that you have completed Job 1 from the lab.
</div>

#Job 2 - Hiring Page Features

Our hiring page has a different layout, with an image above text.
It is still single-column, but we want a separate layout to clearly
separate the content pieces (tiles?) that will make up such a page.

##2.1 Setup the second template

Copy <code>application/views/template.php</code> to another view file,
<code>template-secondary.php</code>. We don't want to call this the
"hiring" template, because it will be used for other pages too.

The big change here is that we intent to have a large image, or perhaps an
image carousel, above the "normal" content on the page. 
Further, we want to hide this panel altogether except at the highest
browser window size.

We need to add a chunk of HTML, between the existing {navbar} reference
and the main body of the page, inside the container div.

    <body>
        {navbar}
        <div id="container">
            <div class="row">
                    {topmatter}
            </div>
            {content}
            ...


I used the "topmatter" view variable here. You can use whatever you like,
so long as you set the view parameter appropriately in your controller.

To hide the "topmatter" for medium and smaller windows,
we can use some CSS attributes from Bootstrap.

----- need this & screenshot

##2.2 Setup a Hiring Page

Speaking of controllers, we need one. Let's call it <code>Hiring</code>,
since that is what we said our navbar link would point to.

Copy <code>application/controllers/Welcome.php</code>, to
<code>Hiring.php</code>, and tailor both the filename
and the class name. Don't forget to request our new layout template.

We have a pretty empty hiring handler!

    class Hiring extends Application {

            function __construct() {
                    parent::__construct();
            }

            public function index() {
                    $this->data['topmatter'] = '';
                    $this->data['content'] = '';
                    $this->render('secondary-template'); 
            }

    }

##2.3 Hiring Page Top Matter

We have some choices here...

- provide just an image
- build an [image carousel](), or
- build a [Jumbotron]()

Providing an image could be done by setting the 'topmatter' parameter value
to <code>make_image(?)</code>,

An image carousel would be provided by appropriate configuration, probably in
a view fragment, like <code>slideshow.php</code>.

Building a jumbotron would be provided by appropriate configuration too,
probably as a view fragment to that it could be modified on its own.

You could always get fancy, build all three of these choices, and then
randomly choose one if a user visits or refreshes the hiring page!

Here's what I did:

--- need code & screenshot

##2.4 Hiring page body

Now for the "meat" of the hiring page.
We want to use a markdown file, so that even a pointy-haired boss could
update the offerings. 

For this lab, the markdown file can contain pretty much anything ... 
be creative, not offensive.

The "trick" is converting the markdown into HTML.
Copy <code>application/libraries/Parsedown.php</code> from the
course hub repo, into your libraries folder.
I suggest adding it to the appropriate line in the <code>autoload.php</code>
file, or else you will need to explicitly load it in your controller or in the base
controller.

Create <code>data/jobs.md</code>, with a glowing description of the employee
benefits you offer, a list of current openings, and then contact information
for interested applicants.

Have fun & be creative, not just copying mine.

How do we convert this into beautful HTML? Get the contents
of the markdown file into a string, and run that string
through the markdown processor.

This will complicate our Hiring::index() ...

    public function index() {
        $contents = file_get_contents('../data/jobs.md');
        $this->data['topmatter'] = $this->parsedown-=>parse($content);
        $this->data['content'] = '';
        $this->render('secondary-template'); 
    }

All going well, you should see something like ...

--- need code & screenshot

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>

