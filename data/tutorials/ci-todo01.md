#Job 1 - Database & Models

_Part of COMP4711 Lab 5, Winter 2017_

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
- maintenance, to present structured views of the todo list
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

The directions here are for phpMyAdmin, but you are welcome to use MySQL WorkBench
or a database browser built into your IDE - whatever works.

If you are having issues running phpMyAdmin, because virtual hosting had
messed up the Bitnami alias for `phpmyadmin`, install a fresh copy
in the same folder you use for course work, and setup a
virtual host alias (`phpmyadmin.local`?) and mapping for it.

In phpMyAdmin:
- create a new database, for instance `todo`
- select that database in the sidebar
- click `import` in the main window, and select the SQL starter file in
your project, `data/todo.sql`
- by the way, if I forgot to remove `data/starter-data.sql`, please do so

You should be able to browse the `todo` database, with its five control tables
and the main `tasks` table. The DB structure is overkill, contrived, etc - agreed.

#C. Enable database access in your app

In `application/config/autoload.php`, add `database` to the pre-loaded libraries.

    $autoload['libraries'] = array('parser','database');

When you reload your webapp homepage, BOOM!

    Access denied for user ''@'localhost' (using password: NO)

This is expected, since we haven't configured the database inside our app - that is the next step.

#D. Safe collaboration

You don't want to store database or other credentials in a public repository.
If you do that with Amazon credentials, for instance, they will cancel your account!

The solution is to have [environment-specific configuration folders](https://www.codeigniter.com/user_guide/general/environments.html).

At a minimum, create `application/config/development`, and use that to store config files
with sensitive information. Remember to `git ignore` this folder, so that its contents
are not pushed to your repo or team repo. If you want to deplot your webapp, folders
like this may need to be copied to the server separately from the rest of the app.

<div class="alert alert-info">
What I often do is modify `public/index.php` to test the server name my app is running as,
and set the environment to "development" id the server name contains ".local", and
to "production" if the server name contains ".com".
You can also specify an Apache environment variable, `CI_ENV`, to specify the environment to use.

You don't have to either of these for this lab - just pointing out best practices.
</div>

#E. Now we can configure our database access in CI 

Copy `application/config/database.php` to `application/config/development/database.php` - we will work with the latter.

Specify your local settings...

    $db['default'] = array(
        'dsn'	=> '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => 'secret',
        'database' => 'todo',
        'dbdriver' => 'mysqli',

If running MySQL on a port other than 3306, add a `'port'=>...` setting.

The credentials and database name you use are only for your system, not your team mates' and
not my test system. Each team member could use a different DB name if they wanted.
The table names are what matters, once we can connect to the database.

Once you have done this, you should be able to reload your homepage without error.
Nothing will look different either, but that is expected.

#F. Add some models

There are six tables, and we will one model for each of them. The project starter
contains the base model that I showed you in class, which will make our life much easier.

I suggest naming the models after the tables. The first one, for instance, will be
`application/models/Flags.php` ...

    class Flags extends MY_Model {

            public function __construct()
            {
                    parent::__construct('flags', 'id');
            }

    }

We inherit a whack of functionality from MY_Model ... CRUD methods, searching methods,
etc. Check out `core/MY_Model.php`, if you haven't done so already.

Note: In the constructor above, I expressly specified the table name (case sensitive) and
the column to use as a primary key. I did this because some instances of MySQL will
capitalize table names and others won't. The MY_Model constructor will assume that
the table name is the same as the class name, so this forces CI to look
for lower case table names.

Repeat this for the other five tables.

Your webapp homepage should still load without change, but without errors.

#G. Pre-load the models

It may not be the best practice, but I want us to pre-load the model classes,
making life easier in later steps. It isn't as efficient as loading only those models 
we need for a specific controller/usecase - agreed.

Add the model names to the appropriate line near the end of `application/config/autoload.php`:

    $autoload['model'] = array('flags', 'groups', 'priorities', 'sizes', 'statuses', 'tasks');

Your webapp homepage should still load without change, but without errors.

#Summary

Hmmm - this **looks** the same as what we started out with, but we have bound our webapp
to our database, and provided models for all the tables in it.

Model usage for a webapp using conventional RDB tables, without fancy relationships between the tables, can
be this simple. We still need to extract and manipulate data, but that will
be done by exploiting the "API" for MY_Model.
