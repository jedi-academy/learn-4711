
#Lab #4 - Working With Controllers & Routing
COMP4711 - BCIT - Fall 2016

##Lab Goals

The purpose of this lab is to help you explore and practice some of the controller 
and routing techniques for CodeIgniter.

The lab will result in fixing eight broken links in a starter webapp, using 
the routing techniques discussed in class, and in adding a "hook".

We will continue to use gitflow workflow, with the new twist of simple
issue tracking.

I have setup a [starter repository](https://github.com/jedi-academy/starter-routes) 
for you to work from. Each of the nine tasks will be completed independently.

##Lab Teams

This week, we want teams of three (two in a pinch, if appropriate for the
number if students in lab. Each team will share a single team repository, 
but with each team member using 
their own fork of that. 

Teams of one are *not* acceptable. This is partly about collaboration, after all.

If you miss the lab, you will end up being a defacto team of one, completing
the tasks yourself before the submission deadline.
This will let you earn some of the lab marks, but none of those for collaboration.

Team members will each have a role to play. The nine tasks need to be split amongst
you, with each team member completing three tasks (if a team of 3) or at most 4 tasks
(if a team of 2).
- One member will be the creator and maintainer of the team repo - he/she will be designated the CAPTAIN
- The other members of the team will be contributors - designated as MATES

The lab tasks are meant to be done individually, though the hook task
would benefit from pair programming, i.e. with 
one person "driving", and the other(s) "navigating". 

##Lab Submission

Your lab will result in a github repository for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 

Due: in theory, this should be completed during the lab period,
but some teams will need a bit more time.  
I have set the deadline to this Sunday at 17:30.

##Lab Marking Guideline

A marking rubric has been attached to the lab 4 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

I will be looking at the features in your submitted webapp, to see if you
succeeded at fixing it per spec, in spite of the process; and I will
be looking at the repository, its forks, commit history, and issue
history; to determine how well you followed the collaboration process.

#The Lab:

##Team Setup

-    Choose partners
-    Select one of you to be CAPTAIN
-    The CAPTAIN should join an empty D2L group for lab 4
-    The MATE(s) should join the same group
-    If the group membership gets messed up, see me to fix it

##Team Repository Setup (CAPTAIN)

-    Create a github organization for your team
-    Fork the lab starter repo into that organization, using a name of your choice
-	Add your team mates as collaborators, but **not** with admin rights for the repository
-	 It is up to you if you wish to use a changelog
-    Create a new branch "develop"
-    Make "develop" the default branch

##Preparation (All)

-	Without making any changes in the team repository, and before the team mates
fork it, read what Github has to say about 
[Managing your work with issues](https://help.github.com/articles/managing-your-work-with-issues/)

##Setup Project Tasks (CAPTAIN)

-	Make sure that "issues" are enabled for your team repository, on the repository settings page
-	Add nine issues to your team repository, one for each task in the lab
-	Do not assign these to anyone

##Member Repository Setup (All)

-    Configure your git client to use signing for this project too, if not already setup globally
-    Fork the team repository to your personal github account (including the CAPTAIN)
-    Clone your repository locally, using a name/location of your choice
-    If using an IDE, "git ignore" the IDE's metadata folder, so you don't inflict it on your teammates.
-    If you want to keep this separate from last week's, add a new local domain, eg "routes.local"
-    Map the virtual domain you will use to the "public" folder inside your local repo for this lab
-    Restart Apache
-    Make sure that your project serves correctly, eg. using "routes.local" or the local domain that you setup.


##Undertake a task (All)

-	In the team repository, select the "issues" page.
-	Choose the next unassigned issue, and assign it to yourself
-	Complete that task locally
-	When convinced you have it right, synchronize your develop branch and commit the changes
in your feature branch
-	Push your feature branch to your repo
-	Create a pull request to the team repo for this, making sure you include 
"closes #123" in the PR description, where "123" is the issues # you completed
-	The issue will be automatically closed if/when the PR is merged
-	Repeat until you have completed the requisite number of tasks or until there
are no remaining issues open
    
##Lab Conclusion (CAPTAIN)

-    Make sure there are no open issues
-	Tidy up any loose ends in the repo
-    Merge the develop branch into the master branch, in the team repo
-    You are ready to submit the repo link to your dropbox for the lab

