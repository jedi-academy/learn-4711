
#Lab #5 - Kaleidoscope (Working With Views)
COMP4711 - BCIT - Fall 2016

##Lab Goals

The purpose of this lab is to help you explore and practice some of the view
construction and assembly techniques for CodeIgniter.

The lab will result in a webapp presenting some supplied material
using view fragments and the template parser, markdown content,
and multiple layout templating.

We will continue to use gitflow workflow.

I have setup a [starter repository](https://github.com/jedi-academy/starter-views),
with some data to work with.

##Lab Teams

This week, we want teams of two (three in a pinch, if appropriate for the
number if students in lab). Feel free to pair up as previously, which could
save you creating a new organization for this lab. Each team will share a single team repository, 
but with each team member using 
their own fork of that. 

The same team & organization will be used for next week's lab.

Teams of one are *not* acceptable. This is partly about collaboration, after all.

If you miss the lab, you will end up being a defacto team of one, completing
the tasks yourself before the submission deadline.
This will let you earn some of the lab marks, but none of those for collaboration.


##Lab Submission

Your lab will result in a github repository for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 

Due: in theory, this should be completed during the lab period,
but some teams will need a bit more time.  
I have set the deadline to this Sunday at 17:30.

##Lab Marking Guideline

A marking rubric will be attached to the lab 5 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

##Process

You should be very familiar already with joining a team, and setting
up a github organization and repo, with suitable roles for the team
members. I don't think you need more direction on this :-/

Make sure that you merge your develop branch into your master at the end of the lab,
so you can keep working on the webapp next week even if I haven't finished
with the lab 5 feedback.

##Github repository

To start your tream repo for this lab, 
you could fork the [CI Starter 3](https://github.com/jedi-academy/CodeIgniter3.1-starter3)
 for this, and add the data and media
from the [starter-views](https://github.com/jedi-academy/starter-views)
 repo, or the other way around, or you could
just create an empty repo and add in the contents of those two other repos.

Whatever you chose, your starting point below will be the combination of those
two repositories.

##Database

You will need to create a database for this, and import the SQL dump inside
the data folder of your repo.

#Features

We are going to build a simple, responsive site, with a different layout for each page.

My directions here presume that we are using the 
[Bootstrap](http://getbootstrap.com/) CSS framework,
which you are already familiar with from COMP1536. If you would prefer to use or 
explore a different framework to achieve the same end, 
[Foundation](http://foundation.zurb.com/) or 
[Kube](https://imperavi.com/kube/)
are acceptable alternatives. If you do that, however, I am not in a position to offer assistance.

##Sitemap

We are building a site with three pages, each using its own layout:

- welcome, our homepage
- hiring, for job seekers
- shopping, for the hungry

##Layouts

The views lesson showed a multiple layout image:

<img class="scale" width="736" height="552" src="/pix/lessons/5/5-11.jpg"/>

Basically our welcome page will  use a "home" layout,
our hiring page will use a "secondary" layout, and
our shopping page will use a "landing" layout.

##base controller

Out-of-the-box, our base controller is setup for view templating:

    function render($template = 'template')
    {
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->parser->parse('template', $this->data);
    }

It provides for a layout, as a "template" parameter, but that is not actually
used. Let's use the layout template parameter, and make our rendering more
flexible by only using the 'pagebody' fragment if we haven't already
built the content to used in a layout.

    function render($template = 'template')
    {
        // use layout content if provided
        if (!isset($this->data['content']))
            $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->parser->parse($template, $this->data);
    }

Now we can over-ride the layout, on a page by page basis.

##Basic layout template

We can keep application/views/template.php as our base, or "home" layout.
It is up to you if you wish to keep the rendering time
message at the bottom of the page.

The template needs to pull in our CSS framework pieces, and provide
for the common elements across all the layouts, which would be
the page header.

Our template.php out-of-the-box...

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

Notice that I did not include the integrity and crossorigin attributes
mentioned on the Bootstrap site - I found that they caused issues, but
could be omitted.

Also notice that I have left the reference to our CSS intact, for noe.
It will probably be eliminated later.

##Add a navbar

All our layouts have a common top element, which we want to use for
shared navigation.

Bootstrap provides a [navbar](http://getbootstrap.com/components/#navbar-default) 
element, which is already responsive. Perfect!

I suggest adding a view fragment to build one of these, so that have only
one place to modify if we decide to make navbar changes later.

Make <code>application/views/navbar.php</code>, along the lines of the Bootstrap default
navbar, and with menu items: Home, Hiring and Shopping.

The navbar fragment then gets added to the template, inside the <body>...

        <body>
            {navbar}
            <div id="container">
                {content}
                ...

and we need to add it as a view parameter to the layout, inside our
base controller's render method:

    function render($template = 'template')
    {
        $this->data['navbar'] = $this->parser->parse('navbar', $this->data);
        ...

Notice that I provide for running it through the template parser too,
in case we want to provide variable menu data later.

We are ending up with fragments inside fragments... :)

##Our homepage

Our homepage is intended to show the menu categories

