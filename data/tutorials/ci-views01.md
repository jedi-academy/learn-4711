#Views - Making the homepage

_Part of COMP4711 Lab 5, Fall 2016_

<div class="alert alert-info">
This assumes that you have already setup your team repo properly, per the lab writeup.
</div>

#Job 1 - Homepage Features

We are going to build a simple, responsive site, with a different layout for each page.

My directions here presume that we are using the 
[Bootstrap](http://getbootstrap.com/) CSS framework,
which you are already familiar with from COMP1536. If you would prefer to use or 
explore a different framework to achieve the same end, 
[Foundation](http://foundation.zurb.com/) or 
[Kube](https://imperavi.com/kube/)
are acceptable alternatives. If you do that, however, I am not in a position to offer assistance.

##Info: Sitemap

We are building a site with three pages, each using its own layout:

- welcome, our homepage (the focus of this tutorial)
- hiring, for job seekers
- shopping, for the hungry

##Info: Layouts

The "views" lesson showed a multiple layout image:

<img class="scale" width="736" height="552" src="/pix/lessons/5/5-11.jpg"/>

Referring to this image, our welcome page will  use a "home" layout,
our hiring page will use a "secondary" layout, and
our shopping page will use a "landing" layout.

##1.1 Base controller

Out-of-the-box, our base controller is setup for view templating:

    function render($template = 'template')
    {
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->parser->parse('template', $this->data);
    }

It provides for a layout, as a "$template" parameter, but that is not actually
used. Let's use that layout template parameter, defaulting to the calue
'template' if not expressly provided. The templating will be no different
than the original, unless we over-ride the parameter in one of our
controllers.

Let us make our rendering more
flexible, by only using the 'pagebody' fragment if we haven't already
built the content to used in a layout.

These two enhancements will leave our base controller's <code>render</code>
method looking like:

    function render($template = 'template')
    {
        // use layout content if provided
        if (!isset($this->data['content']))
            $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->parser->parse($template, $this->data);
    }

Now we can over-ride the layout, on a page by page basis.

ps - Don't forget to change the 'pagetitle' view parameter, in the base controller's
constructor, to reflect your team name or the name of the diner you are
building an app for!

##1.2 Basic layout template

We can keep <code>application/views/template.php</code> as our base, or "home" layout.
It is up to you if you wish to keep the rendering time
message at the bottom of the page.

The template needs to pull in our CSS framework pieces, and provide
for the common elements across all the layouts, which would be
the page header.

Our <code>template.php</code> out-of-the-box...

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>{pagetitle}</title>
            <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
        </head>
        <body>
            <div id="container">
                {content}
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. 
                    {ci_version}</p>
            </div>
        </body>
    </html>

Following the [Basic template](http://getbootstrap.com/getting-started/#template)
directions on the Bootstrap site, we need to add some links to it, resulting in
something like

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>{pagetitle}</title>
            <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
            <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
        </head>
        <body>
            <div id="container">
                {content}
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. 
                    {ci_version}</p>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </body>
    </html>

Notice that I did not include the "integrity" and "crossorigin" attributes
mentioned on the Bootstrap site - I found that they caused issues, but
could be omitted.

Also notice that I have left the reference to our CSS intact, for now.
I suspect we will have changes to it later :)

Our view is no different, but the Bootstrap and jQuery pieces are being pulled in.

<img class="scale" src="/pix/tutorials/5/50.png" />

##1.3 Add a navbar

All our layouts have a common top element, which we want to use for
shared navigation.
Bootstrap provides a [navbar](http://getbootstrap.com/components/#navbar-default) 
element, which is already responsive. Perfect!

I suggest adding a view fragment to build one of these, so that we have only
one place to modify if we decide to make navbar changes later.

Make <code>application/views/navbar.php</code>, along the lines of the Bootstrap default
navbar, and with menu items: Home, Hiring and Shopping.

My navbar looks like...

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls=""navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">{pagetitle}</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/hiring">Hiring</a></li>
                    <li><a href="/shopping">Shopping</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

The navbar fragment then gets added to the template, inside the <code.body</code>...

    <body>
        {navbar}
        <div id="container">
            {content}
            ...

and we need to add it as a view parameter to the layout, inside our
base controller's render method:

    function render($template = 'template')
    {
        $this->data['navbar'] = $this->parser->parse('navbar', $this->data, true);
        ...

Notice that I provide for running it through the template parser too,
so I can set the "brand" to the name of my restaurant (which you
modified in <code>Application::__construct()</code>.

How does it look so far? 

<img class="scale" src="/pix/tutorials/5/51.png" />


##Info: Our homepage

Our homepage is intended to show the menu categories, each with its image and
description, but with the image alternating position (left or right) on each row.

**View construction** refers to how we build the panels that will make up the page,
while **view assembly** refers to using a template to arrange the page's panels
according to some sort of layout. If we want to arrange elements inside
a panel, that is best done with CSS styling, in accordance with the principle
of "separation of concerns". This line will get blurred, for sure,
but if we start out "properly", it will be easier to keep these different
view aspects separate.

We will return to the homepage shortly, once we setup the data for it to work with :)

##1.4 Models

A SQL dump was provided as part of the views starter, and you earlier in this lab
setup a database for it, right?

We need to add the database, and models that use it, to our webapp.

Fix your database settings for your environment (database name, mysql user nane
and your password). Remember to save this in <code>application/config/development/database.php</code>
and to <code>git ignore</code> it, so you don't expose your password on github.

Each team member will need to do this on their own development system.

We need two models, <code>Menu</code> and <code>Categories</code>, 
each of which extends the MY_Model
that came with the CI starter3. There are two other tables in the database, but
we won't need them until next week.

Each of our models should have a constructor, which calls its inherited constructror, as that is
not automatic. So, <code>application/models/Menu.php</code> will look like the following,
with <code>Categories.php</code> similar.

    class Menu extends MY_Model {
        // constructor
        function __construct() {
            parent::__construct();
        }
    }

<code>MY_Model</code> assumes that the table a model is bound to has the same
name as the model class, and that the primary key is named <code>id</code>,
although those can be over-ridden.

I suggest adding these two models to the appropriate line in 
<code>application/config/autoload.php</code>, since we will
use them everywhere.

There is no change to the page appearance if you reload it.

##1.5 Homepage body

Now we can get down to the homepage body, using view fragments.

We need to iterate through the categories, and add the presentation row for each of 
these to a 'content' view parameter which we will pass on. This is similar to
our second lab, converting a static website to a CI one.

We want to have the image take up part of a row (40%?), and the description the balance.
We also want to hide the description when the browser window is sized "extra
small", as it would be on a smartphone. 

Bootstrap's [grid layout](http://getbootstrap.com/css/#grid) would let us do this,
but I want to stick with CSS for now. If we generate a <code>div</code> with a
suitable CSS attribute, then we can provide for that in <code>default.css</code>.

We can build a fragment to show a category's name, image and description, with
image to the left of its description. Make <code>application/views/category-home.php</code>:

    <div class="row menucat">
        <img src="/images/{image}" />
        <h2>{name}</h2>
        {description}
    </div>

The {name}, {image} and {description} substitution values will come from the table
record for a category.

The styling? We can use some simple CSS to float the image to the left inside this
fragment, and add some spacing for readability.

    .menucat img { padding:5px;}
    .menucat h2 { margin-left:20px; }

The above two lines are all that we should keep in our stylesheet,
<code>/public/assets/css/default.css</code>, as all the other styling
was for the CodeIgniter welcome page, not ours.

Modify our Welcome controller's <code>index()</code> method
to implement our plan.

    function index() {
        $result = '';
        foreach ($this->categories->all() as $category) {
            $result .= $this->parser->parse('category-home',$category, true);
        }
        $this->data['content'] = $result;
        $this->render();
    }


Note that we did not set the 'pagebody' view parameter, since we are
providing the content directly. 

Further, we can actually delete <code>application/views/welcome_message.php</code>,
as we no longer need it.

Your homepage should now show all of our categories :)

<img class="scale" src="/pix/tutorials/5/52.png" />

Oh dear, that looks rather tragic. Remember I suggested we might have to mix
some styling with our view fragments? We can add a "pull-left" attribute,
from Bootstrap, to make things better. The modified fragment:

    <div class="row menucat">
        <img class="pull-left" src="/images/{image}" />
        <h2>{name}</h2>
        {description}
    </div>

The looks better:

<img class="scale" src="/pix/tutorials/5/53.png" />

... but we still need to fix the responsive attributes, so that
the image is all that shows at the smallest window size, and so
that the name and description appear underneath the image
at the second smallest size. Using Bootstrap's
grid layout guidelines, we just need some more attributes in what we already have...

    <div class="row menucat">
        <img class="pull-left col-lg-4 col-md-4 col-sm-12 col-xs-12" src="/images/{image}" />
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <h2>{name}</h2>
            <div class="hidden-xs">{description}</div>
        </div>
    </div>

Try it ... the description should disappear once the browser window is narrow,
and you might notice that the responsive navbar collapses to a hamburger icon.

<img class="scale" src="/pix/tutorials/5/54.png" />


We have one last job here, according to the "home" layout - 
to alternate the position of the image, depending
on whether we are dealing with an even or an odd row.

There are several ways to accomplish this, but the most
straightforward would be to pass an additional
view parameter, "direction", set to "left" or "right" if a category
row is odd or even. That could by injecting that property into the
<code>category</code> variable, in <code>Welcome::index()</code>:

    public function index() {
        $result = '';
        $oddrow = true;
        foreach ($this->categories->all() as $category) {
            $viewparms = array(
                'direction' => ($oddrow ? 'left' : 'right')
            );
            $viewparms = array_merge($viewparms,$category);
            $result .= $this->parser->parse('category-home', $category, true);
            $oddrow = ! $oddrow;
        }
        $this->data['content'] = $result;
        $this->render();
    }

And we have to modify our <code>category-home</code> view fragment to use this:

    <div class="row menucat">
        <img class="pull-{direction} col-lg-4 col-md-4 col-sm-12 col-xs-12" src="/images/{image}" />
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <h2>{name}</h2>
            <div class="hidden-xs">{description}</div>
        </div>
    </div>

Now your homepage, which uses the default layout, should present the categories
as intended :) It isn't pretty, but we can leave that up to a designer to fix!

<img class="scale" src="/pix/tutorials/5/55.png" />


<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>

