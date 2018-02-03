#Lab #5 - Todo List (Working With Models & Views)  
COMP4711 - BCIT - Fall 2017

##Lab Goals

The purpose of this lab is to help you explore and practice some of the view
construction and assembly techniques for CodeIgniter, in addition to
setting up and working with a model backed by a CSV file.
The lab will result in a webapp presenting some supplied material
using view fragments and the template parser, markdown content,
and multiple layout templating.
We will continue to use gitflow workflow.

I have setup a [starter repository](https://github.com/jedi-academy/starter-todo4),
with some task data to work with.
It has a homepage with no real content, and disabled navbar links to additional
pages that will be completed as part of this lab or the next.

If curious, it was based on CodeIgniter3.1-starter3 from the Jedi Academy.

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
It should contain a link to your **team**'s github repository
(not its cloning link). 

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
you should fork the [Starter](https://github.com/jedi-academy/starter-todo4)
in your organization.

<div class="alert alert-info">
The team captain should create the team repo, all the team members should fork
it and clone theirs locally.<br/>
Once done, the "torch" can be passed from one team mate to the next
to deal with each step.
</div>

##Starter repo notes

The starter project for this lab has had significant changes made to its base
model classes, pursuant to what we talked about in class.
The `MY_Model` class is now a reference implementation of the `DataMapper`
interface, which has been extracted to its own source file.
The intended class for you to use, for RDB persistence, would be
`RDB_Model`.

There is another implementation of that interface, `Memory_Model`, which
does the same collection manipulation, but working with an in-memory array.
This isn't too useful on its own, as the data doesn't persist past the current
request. The cool part comes in with the subclasses of this, which are
intended to add different persistence techniques. The one we are working
with this week is `CSV_Model`, which persists data as a CSV file.

Over the weeks to come, we can add additional persistence subclasses as
appropriate, for instance `XML_Model` or `JSON_Model`. Usage of these
is the same, because of the shared `DataMapper` interface.

The names above, apart from `MY_Model`, do not follow CodeIgniter naming
conventions, but they are usable because they are pulled in from
`MY_Model`, which does. 

I mentioned substantial changes, right? That means that there could be bugs
in the base model implementation. If so, I will correct the starter, and
your team captain will need to resynch the team repo's master branch with
the updated starter! That will then need to trickle down to the team
member repos and your develop branch!

One last change I made in the starter repo, was to add `application/models/App`,
as a holder for the lookup codes used in the Todo list app. It has felt funny
having separate tables for them, and this is the solution I came up with.

##Your jobs

There are five jobs to do to complete the lab. I suggest that you switch
team members for each.

- [Job 1 - Database and models](/display/tutorial/ci-todo01)
- [Job 2 - Homepage Features](/display/tutorial/ci-todo02)
- [Job 3 - Ordered List Page Features](/display/tutorial/ci-todo03)
- Job 4 - Maintenance Page Features -- deferred to next week
- [Job 5 - Help Wanted Page Features](/display/tutorial/ci-todo05)


#Wrapup

<div class="alert alert-info">
Captain: assuming that everyone on the team agrees that
you have completed the lab, prepare for submission.

It is now time
to merge the develop branch into the master branch,
and submit a link to the dropbox!!

ps - it would be a good idea for the team members to synch their repos, both
the master and develop branches, with the submitted team repo.
</div>
