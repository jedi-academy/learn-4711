# Lab #6 - A Taste of XML
COMP4711 - BCIT - Winter 2019

## Lab Goals

The purpose of this lab is to give you a taste of XML,
in a simple yet rich enough context.

You have the role of Snow White, and need to assign
chores to the seven dwarfs.

You are given a starter SQL file, to create an RDB to use.
It contains tables for jobs to do, and related descriptions,
as well for the work crew.

Your app will present

## Lab Teams & Submission

I have setup a new set of groups for the remaining labs, "pairs".
Signup for one of these, with a partner if you like.
This will suit pair programming.

You are to share a github repository. No need to fork & branch, but
do use PRs for changes. If you both want to work on it, the creator can add
the other pair member with commit rights.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your github repository.

Due: this coming Sunday at 17:30.

## Lab Marking Guideline

A marking rubric will be attached to the lab 6 dropbox.

## Your jobs

### 1. Repository setup

Create a new repository, using either the CodeIgniter4 appstarter
of devstarter.

### 2. Database setup

Create a new MySQL database, using the [starter SQL script](/data/tasks.sql).

You should end up with seven tables in it.

### 3. Models

Create simple models for each of the tables in your database.
You should be able to extend the CI model, and bind each of yours to the
appropriate table.

### 4. Chores controller

Create a `Chores` controller. Its `index` method should display
an unordered list of the dwarfs, with each name linking to
the `assign` method of the Chores controller, with the
respective dwarf's ID as a URI segment.

Modify your routes so that this is the default controller.

### 5. Assigning chores

The `assign` method should build a SimpleXML document, containing
three first level properties: `name`, `role` and `chores`.
Values for the first two should come from that dwarf's record.

Choose three tasks randomly, from the ones in the `Tasks` model. For each,
add a `task` child element to the `chores` property.
The `task` element shall include its ID, description, priority, and group.
The latter two need to be retrieved from the appropriate model.

Return the string representation of the SimpleXML document
as your controller response. This is a "normal" controller,
not an API or RESTish one.

### 6. Polish

Make sure your code is formatted, and your `Chores` controller formatted
so that both you & I can follow along.

### 7. Cleanup

Delete any PR branches; you should only have one branch standing by the end.

## Help?

Here are some useful links, should you need them:

- The [PHP Manual](http://php.net/manual/en/book.simplexml.php) will likely be referenced frequently.
- [PHPro](https://phpro.org/tutorials/Introduction-To-SimpleXML-With-PHP.html)
- [BitDegree](https://www.bitdegree.org/learn/php-xml)
- [W3Schools](https://www.w3schools.com/php/php_xml_simplexml_read.asp) has a brief tutorial
