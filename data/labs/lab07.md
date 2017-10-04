#Lab #7 - Completing Our TODO List Buildout
COMP4711 - BCIT - Winter 2017

##Lab Goals

The purpose of this lab is to finish the "build out" of our TODO List webapp,
by adding some role-based CRUD for todo item maintenance.
The lab will also give us an excuse to incorporate some outside components,

This lab will build on the last one (lab 6). If your lab 6 is good, then continue 
to use it. If you are not happy with it, you may use the
[TODO 3 starter](https://github.com/jedi-academy/starter-todo3), 
which is the state yours should have ended up in at the end of the last lab.

We will continue to use gitflow workflow. That means proper branching (master/develop, 
with "develop" merged into "master" just before completion and submission),
completing new work in feature branches (which are throwaway branches, named
"feature/xxx" and merged into "develop" once acceptable), and good commit comments
(to provide a sense of what was done, from looking at the commit history).

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

A marking rubric is attached to the lab 7 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

##Process

You should already have a team and repo, with suitable roles for the team
members. I don't think you need more direction on this :-/

Make sure that you **merge your develop branch into your master** at the end of the lab.

##Github repository

In your starting Github repo for this lab, make sure that all earlier work has been merged into your
*master* branch before starting this lab, so that your *develop* branch
is "clean".

##Starting Point

Your repository from last week should have a user role (stored in a session),
a controller to toggle the role between "user" and "admin", and a menu
maintenance controller, which displays an appropriate title message depending on the user role.

Use the same database as last lab, to start with. The first job will see it enhanced a bit.

##Your jobs

The big job this lab is setting up CRUD for the todo items, with a model to support that.

There are five jobs for this lab. The first and second can be done at the same time.
The third & fourth rely on the first two, and the fifth relies on the fourth job.

- [Job 8 - USE RDB for Sessions](/display/tutorial/ci-todo08)
- [Job 9 - Integrate the Caboose package](/display/tutorial/ci-todo09)
- [Job 10 - Beef up the Homepage](/display/tutorial/ci-todo10)
- [Job 11 - Beef up the maintenance page](/display/tutorial/ci-todo11)
- [Job 12 - Add item maintenance (finally)](/display/tutorial/ci-todo12)
- [Job 11b - Polish the item maintenance](/display/tutorial/ci-todo11b)

Job 11b makes Job 11 comparable to the others :)

#Wrapup (Are We Done Yet?)

<div class="alert alert-info">
Captain: assuming that everyone on the team agrees that
you have completed the lab, prepare for submission.

Make a SQL dump of your database, with the option to drop any existing
tables. Put that in the <code>data</code> folder of your
project, and delete the original starter SQL from that folder.
The first job in this lab will help you with that.

Make sure that your source code is formatted with proper indentation, for
improved readability. In NetBeans, this would be done by `alt-shift-F`
with a source file open and selected.

It is now time
to merge the develop branch into the master branch,
and submit a link to the dropbox!!
</div>

