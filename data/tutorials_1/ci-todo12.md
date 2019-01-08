#Building Out the TODO List
_Part of COMP4711 Lab 7, Fall 2017_

#Job 11 - Use an RDB for Sessions

Last lab, you setup sessions, using the file system for storage.
Many of you experienced issues or hassles with folder permissions,
an all too common problem.

We'll switch that over to an RDB table, which is the usual approach
with a high volume site. Part of the Session library writeup in
CodeIgniter (which you of course read last week) is a section
on [using an RDB for session storage](https://www.codeigniter.com/user_guide/libraries/sessions.html#database-driver).

##8.1 Create the session table

Here comes the first change to our database. When we are done here,
we will make a new SQL dump.

The easiest way to do this, with an existing database, is to 
copy & paste the DDL from the user guide, into the SQL tab of phpMyAdmin.

    CREATE TABLE IF NOT EXISTS `ci_sessions` (
            `id` varchar(128) NOT NULL,
            `ip_address` varchar(45) NOT NULL,
            `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
            `data` blob NOT NULL,
            KEY `ci_sessions_timestamp` (`timestamp`)
    );
    ALTER TABLE ci_sessions ADD PRIMARY KEY (id);

<img class="scale" src="/pix/tutorials/todo/71.png"/>

##8.2 Configure your app for it

Inside `application/config/config.php`, the session configuration is specified
in a block starting about line 380. We need to change two of the settings.

Specify that we want to store session data in an RDB, by *modifying*
the relevant line:

    $config['sess_driver'] = 'database';

And specify the name of the table we created for this purpose, again
by *modifying* the existing setting line:

    $config['sess_save_path'] = 'ci_sessions';


If you reload any page in your app, you should see no difference.
Most importantly, nothing should break.

Actually, if your app was giving you errors because of folder
permissions, you should no longer experience those.

##8.3 Create a SQL dump for your database

In order to share your revised database with your teammates, use
the "Export" feature of phpMyAdmin to save a copy of the database
schema and data.

Select the database in the left sidebar of the phpMyAdmin page, and then
click on the "Export" tab.

Choose the "Custom" radio button to see the available options.

<img class="scale" src="/pix/tutorials/todo/72.png"/>

In the "Output" section, I recommend that you **do not** choose "gzipped" compression,
as it caused issues for a number of teams in lab. Use the compression
option "None".

<img class="scale" src="/pix/tutorials/todo/73.png"/>

In the "Object creation options" section, **do select** the "Add DROP TABLE..."
statement, so that the dump will replace tables when imported on another
system.

Do **not** select the "Add CREATE DATABSE..." statement option, as that
imposes your database name on the system where the SQL dump will be
imported.

<img class="scale" src="/pix/tutorials/todo/74.png"/>

When you click "go", save the SQL dump inside the `data` folder of your project.

<img class="scale" src="/pix/tutorials/todo/75.png"/>

Make sure it is the only SQL dump in that folder, so there is no question
about which of two or more dumps might be the proper one to use.

##8.4 Importing the SQL dump...

When your teammates synch their local repository with the team repo
(once this job has been merged into it), they would select the database
they are using, in the left sidebar of phpMyAdmin, then select the "Import"
tab of phpMyAdmin, to trigger importing the SQL dump into it.

Any existing tables with the same name will be replaced, and any new tables added.

Caution: some of the teams get an "invalid charset" error when they try to import
the SQL dump. In that case, you may find that you need to drop all of your existing tables inside
your `todo` database before importing the SQL dump.

If you delete a table, and then do a SQL dump, importing the SQL dump
on another system will not delete the table there. You need to inform
teammates that they need to drop all the tables in their database before
importing the updated SQL dump.

Side note: CodeIgniter's [Migration class](https://www.codeigniter.com/user_guide/libraries/migration.html)
provides a tool for you to update databases in place, without destroying
any existing data on the target system. It is out-of-scope for this course :(


<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
