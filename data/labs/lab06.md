#Lab #6 - Building Out Our DIner
COMP4711 - BCIT - Fall 2016

##Lab Goals

The purpose of this lab is to "build out" our diner webapp,
by adding some role-based CRUD and making the ordering functional.
These will give us an excuse to incorporate some outside components,

The lab will build on the last one (lab 5). If your lab 5 is good, then continue 
to use it. If you are not happy with it, you may use the
[diner starter](https://github.com/jedi-academy/starter-diner), 
which is the state yours should have ended up in last week,

We will continue to use gitflow workflow. That means proper branching (master/develop), 
completing new work in feature branches, and good commit comments.

##Lab Teams

Use the same "Lab 5/6" team as for the last lab, unless you were a team of one.
If the latter applies, you need to find a classmate who did not join
a team for the last lab, or combine with an existing team of two.
See me in lab if this applies to you.

##Lab Submission

Your lab will result in a github repository for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 

Note: this is not a cloning URL, and I do not need links to the individual
team member repos.

Due: in theory, this should be completed during the lab period,
but some teams will need a bit more time.  
I have set the deadline to this Sunday at 17:30.

##Lab Marking Guideline

A marking rubric will be attached to the lab 6 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

##Process

You should already have a team and repo, with suitable roles for the team
members. I don't think you need more direction on this :-/

Make sure that you **merge your develop branch into your master** at the end of the lab.

##Github repository

In your github repo, make sure that everything has been merged into your
*master* branch before starting this lab, so that your *develop* branch
is "clean".

##Database

You have a database already, but we need to fix a couple of things in it.
The *diner-starter* mentioned above has a <code>data/starter.sql</code>
file, which you want to import into the database you used last lab.
It will ensure proper capitalization of table names, and it will add
a table that we can use for session management.

<div class="alert alert-info">
The team captain should create the team repo, all the team members should fork
it and clone theirs locally. This will complete Job 0<br/>
Once done, the "torch" can be passed onto one of the 
team mates to tackle the next step.
</div>

##Your jobs

There are three jobs to do to complete the lab. I suggest that you switch
team members for each.

- [Job 1 - Setup & add roles](/display/tutorial/ci-fun01)
- Job 2 - CRUD & an entity model
- Job 3 - Handle sales orders

Update: I am deferring jobs 2 & 3 until next week.
I want to make sure I get the writeups done properly.
You get a break this week :)

#Wrapup

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

