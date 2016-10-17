
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

To start your team repo for this lab, 
you could fork the [CI Starter 3](https://github.com/jedi-academy/CodeIgniter3.1-starter3)
 for this, and add the data and media
from the [starter-views](https://github.com/jedi-academy/starter-views)
 repo, or the other way around, or you could
just create an empty repo and add in the contents of those two other repos.

Whatever you chose, your starting point below will be the combination of those
two repositories.

##Database

You will need to create a database for this, and import the starter's SQL dump,
which should be inside the data folder of your repo.

<div class="alert alert-info">
The team captain should create the team repo, all the team members should fork
it and clone theirs locally. This will complete Job 0<br/>
Once done, the "torch" can be passed onto one of the 
team mates to tackle the next step.
</div>

##Your jobs

There are three jobs to do to complete the lab. I suggest that you switch
team members for each.

- [Job 1 - Homepage Features](/display/tutorial/ci-views01)
- [Job 2 - Hiring Page Features](/display/tutorial/ci-views02)
- [Job 3 - Shopping Page Features](/display/tutorial/ci-views03)

#Wrapup

<div class="alert alert-info">
Captain: assuming that everyone on the team agrees that
you have completed the lab, prepare for submission.

If you have made any changes to the database structure or contents,
make a SQL dump of your database, including the option to drop any existing
tables. Put that in the <code>data</code> folder of your
project, and delete the original from the starter.

It is now time
to merge the develop branch into the master branch,
and submit a link to the dropbox!!
</div>

