#Lab #9 - Finishing Our Diner Buildout
COMP4711 - BCIT - Fall 2016

##Lab Goals

The purpose of this lab is to finish the "build out" our diner webapp,
by making the ordering functional.
These will give us an excuse to build an entity model for orders, and
to use XML as our persistance format, and SimpleXML as our
manipulation tool.

The lab will build on the last ones (lab 6 or 7). This lab focuses on
the "Shopping" page. We are going to build orders as XML DOMs, store
them as XML documents, and scan them to produce summary data.

We will continue to use gitflow workflow. That means proper branching (master/develop), 
completing new work in feature branches, and good commit comments.

##Lab Teams

Use the same "Lab 5/6" team as for the last lab, unless you were a team of one.
If the latter applies, you need to find a classmate who did not join
a team for the last lab, or combine with an existing team of two.
See me in lab if this applies to you.

##Lab Submission

This lab will result in a github repository for your team, as well as one for each team
member. You are welcome to use the same repository as last lab, if you are building on it.
You can even merge to master, even if I haven't finished the feedback for
the previous lab ... I have figured out how to pick specific points in time
for marking :)

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your team's github **repository**. 
This is not a cloning URL, and I do not need links to the individual
team member repos.

Due: in theory, this should be completed during the lab period,
but some teams will need a bit more time.  
I have set the deadline to this coming Sunday at 17:30.

##Lab Marking Guideline

A marking rubric will be attached to the lab 8 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

##Process

You should already have a team and repo, with suitable roles for the team
members. I don't think you need more direction on this :-/

Make sure that you **merge your develop branch into your master** at the end of the lab.

##Github repository

In your starting Github repo, make sure that everything has been merged into your
*master* branch before starting this lab, so that your *develop* branch
is "clean".

##Database

Use the same database as last lab.

##Starting Point

Your project coming forward from last week integrates Caboose, and provides
full menu maintenance for an admin. 
You do not need to fix those, unless your webapp breaks
using them (because of case sensitivity, for instance).

##Your jobs

The big job this lab is setting up an Order entity model, with persistance,
and then enhancing the Shopping controller.

The steps for that are found in the [Handle Sales Orders With XML](/display/tutorial/xml-xml02)
tutorial.
I used markdown format for the tutorial on purpose, for better readability of code sections.

#Wrapup (Are We Done Yet?)

<div class="alert alert-info">
Captain: assuming that everyone on the team agrees that
you have completed the lab, prepare for submission.

Make a SQL dump of your database, with the option to drop any existing
tables. Put that in the <code>data</code> folder of your
project, and delete the original starter SQL from that folder.
You can keep the Order and Orderitems tables if you wish, but they
will not be used for this lab.

There should be only one SQL file in your data folder,
so that my marking script isn't confused about what has to be
setup to mark your lab.

It is now time
to merge the develop branch into the master branch,
and submit a link to the dropbox!!
</div>

