#Job 5 - Help Wanted Page Features
_Part of COMP4711 Lab 5, Winter 2017_

We want to use a markdown file for the content of this page, 
so that even a pointy-haired boss could
update the offerings. If your markdown is rusty (or non-existent),
there is a [Markdown cheatsheet](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
available.

For this lab, the markdown file can contain pretty much anything ... 
be creative, not offensive. You are trying to solicit other family
members or friends to do some of your work for you :-/

The "trick" is converting the markdown into HTML.

#A. Add a markdown processor

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

#B. Write a help wanted ad

Create <code>/data/jobs.md</code>, with a glowing description of the employee
benefits you offer, a list of current "openings", and then contact information
for interested applicants.

Have fun & be creative, not just copying mine.

Here is mine, as an example (and **only** an example):

    Please, plase, please help with with my COMP1234 homework. I am clueless.

    I can pay you in chocolate chip cookies, one dozen per feature
    completed bug free!!!

    Contact me via PM at 123-456-7890.

Make sure that yours includes some formatting (at least 1 heading,
some bold & italics).

#C. Add a controller

The navbar suggests `controllers/Helpme.php`, which can be patterned after
our homepage to start.

    class Helpme extends Application
    {

        public function index()
        {
            $this->data['pagebody'] = 'homepage';

            $this->render(); 
        }

    }

We can use the default layout, but
we want to provide pre-rendered content instead of a view page.

#D. Process the markdown

How do we convert this into beautful HTML? Get the contents
of the markdown file into a string, and run that string
through the markdown processor.

This will complicate our <code>Helpme::index()</code> only a little ...

    public function index() {
        $this->data['pagetitle'] = 'Help Wanted!';
        $stuff = file_get_contents('../data/jobs.md');
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render(); 
    }

All going well, you should see something like ...

<img class="scale" src="/pix/tutorials/todo/53.png"/>

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

