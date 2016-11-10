#Lab #7 - Continuing Our Diner Buildout
COMP4711 - BCIT - Fall 2016

##Lab Goals

The purpose of this lab is to continue the "build out" our diner webapp,
by adding some role-based CRUD for menu item maintenance.
These will give us an excuse to incorporate some outside components,

The lab will build on the last one (lab 6). If your lab 6 is good, then continue 
to use it. If you are not happy with it, you may use the
[diner II starter](https://github.com/jedi-academy/starter-diner2), 
which is the state yours should have ended up in at the end of the last lab.

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

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 

Note: this is not a cloning URL, and I do not need links to the individual
team member repos.

Due: in theory, this should be completed during the lab period,
but some teams will need a bit more time.  
I have set the deadline to this coming Sunday at 17:30.

##Lab Marking Guideline

A marking rubric will be attached to the lab 7 dropboxes, similar to our
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

Your repository from last week should have a user role (stored in a session),
a controller to toggle the role between "user" and "admin", and a menu
maintenance controller, which displays an appropriate message depending on the user role.

Your project will have the Caboose package integrated & configured, and your template
is using Bootstrap for styling.

##Your jobs

The big job this lab is setting up CRUD for the menu items, with a model to support that.

The steps for that are found in the [CRUD tutorial](/display/tutorial/ci-fun02).
I used markdown format for the tutorial on purpose, for better readability of code sections.

#Wrapup (Are We Done Yet?)

<div class="alert alert-info">
Captain: assuming that everyone on the team agrees that
you have completed the lab, prepare for submission.

Make a SQL dump of your database, with the option to drop any existing
tables. Put that in the <code>data</code> folder of your
project, and delete the original starter SQL from that folder.

It is now time
to merge the develop branch into the master branch,
and submit a link to the dropbox!!
</div>

