#Job 1 - Database & Models

_Part of COMP4711 Lab 5, Fall 2017_

<div class="alert alert-info">
This assumes that you have already setup your team repo properly, per the lab writeup.
</div>

#Preview

We are going to build a simple, responsive site, with a different layout for each page.

My directions here presume that we are using the 
[Bootstrap](http://getbootstrap.com/) CSS framework,
which you are already familiar with from COMP1536. If you would prefer to use or 
explore a different framework to achieve the same end, 
[Foundation](http://foundation.zurb.com/) or 
[Kube](https://imperavi.com/kube/)
are acceptable alternatives. If you do that, however, I am not in a position to offer assistance.

##Info: Sitemap

We are building a site with four pages, each using its own layout:

- welcome, our homepage 
- views, to present ordered views of our todo list
- maintenance, to present structured views of the todo list (next lab)
- helpme, to plead for help completing our tasks

#A. Setup your development environment

Your team captain has created the team repo for this lab, and you have forked that
and cloned it locally.

Make sure you can run the webapp, which means 
- modify the `httpd-vhosts.conf` to remap `comp4711.local` to the `public` folder
inside your local project, **or**
- add a new entry for `todo.local` inside `etc/hosts`, and add a `<VirtualHost>` element
for your project inside httpd-vhosts.conf`

Remember to restart Apache. You will need MySQL running for this lab too.

If all went well, you should see the starter homepage for the lab...
<img class="scale" src="/pix/tutorials/todo/50.png" />

Not much there, and none of the links work :-/ We will fix that!

#B. Setup your database

Oh, hold on - we are using CSV file(s) to persist data, not a MySQL
database. There is nothing to do here!

Well, mostly nothing. You want to make sure that the `data` folder inside
your project, and everything in it, is "world-writeable". 
This is a potentially dangerous practice, but Apache will be running
using different users on the different platforms.

#C. Add a task model

There is only the one CSV file for this app, `data/tasks.csv`.

I suggest naming models after the "tables", which would usually mean
the plural of the entity name that a "table" pertains to. 
For this lab, that suggests `application/models/Tasks.php` ...

    class Flags extends CSV_Model {

            public function __construct()
            {
                    parent::__construct(APPPATH . '../data/tasks.csv', 'id');
            }

    }

The filename above is a mouthful, starting at the `application` folder, moving
up one folder, and then drilling down into the data folder. It would be cleaner
if we had a `DATAPATH` constant to use, and you are free to do that (but not required to),
for instance setting that in `applicaiton/config/constants.php`. If you choose
to do this, **do not** set absolute paths, as they may not work on your
team mates' platforms or mine!

We inherit a whack of functionality from CSV_Model ... CRUD methods, searching methods,
etc. Check out `core/CSV_Model.php`, if you haven't done so already.

Note: In the constructor above, I expressly specified the "table" name (case sensitive) and
the "column" to use as a primary key. If these were not provided, the base model
constructor will assume that
the origin ("table" filename) is the same as the class name, and that the unique identifier
"column" is `id` (that would be the primary key in an RDB table).

Your webapp homepage should still load without change, but without errors.

#D. Pre-load the models

It may not be the best practice, but I want us to pre-load any model classes,
making life easier in later steps. It isn't as efficient as loading only those models 
we need for a specific controller/usecase - agreed.

Add the model names to the appropriate line near the end of `application/config/autoload.php`:

    $autoload['model'] = array('app', 'tasks');

Your webapp homepage should still load without change, but without errors.

#Summary

Hmmm - this **looks** the same as what we started out with, but we have bound our webapp
to our "database", and provided models for all the tables in it.

Model usage for a webapp using conventional or simple "tables", 
without fancy relationships between them, can
be this simple. We still need to extract and manipulate data, but that will
be done by exploiting the "API" for `DataMapper`.
