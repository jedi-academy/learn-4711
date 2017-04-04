#Lab #8 - Distributing "Our" Diner
COMP4711 - BCIT - Winter 2017

##Lab Goals

The purpose of this lab is to take a working webapp, ["our" diner](https://github.com/jedi-academy/starter-standalone), and split it into two
parts which talk to each other using RESTful distributed system techniques.

We will continue to use gitflow workflow. That means proper branching (master/develop), 
completing new work in feature branches, and good commit comments.

##Lab Teams

I have setup
a new set of "Lab 8" teams for this. You may partner with the
same person as the earlier labs, if you like, but don't have to.

If your set has an odd number of members who show up to lab, I can override-add
you to a team. 

##Lab Submission

This lab will result in **two** github repositories for your team, one 
for each "side" of the distributed webapp. Do not reuse earlier repositories, but feel free to use an
existing github organization if your team makeup hasn't changed.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to each of the team repositories for the lab,
clearly distinguishing between the "front-end" and the "back-end" apps.

I have set the deadline to this coming Sunday at 17:30.

##Lab Marking Guideline

A marking rubric will be attached to the lab 8 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

##Process

You know to setup an organization for your team, if needed.

Make sure that you **merge your develop branch into your master** at the end of the lab,
for both of the repositories.

##Github repositories

Create your two repositories, initially "empty", and **copy** the contents of the earlier
repo that you have chosen as a starter. Make sure that branching is setup,
with a "clean" *develop*, before any team members fork the repos.

Just to be clear: the two repositories will start out identical except for their name.

##Database

Each of the apps will have their own database ... we will take care of that during 
the tutorial.

##Examples?

The example-ferries-... repositories in the Jedi Academy organization provide
an example of what we are doing here.

Additionally, you will find there a package-restful repo, with the goodies we
will need for "distributed glue".

##Your jobs

The steps for that are found in the **[Decoupling Our Diner](/display/tutorial/tut-adv02)**
tutorial.
I used markdown format for the tutorial on purpose, for better readability of code sections.

#Wrapup (Are We Done Yet?)

<div class="alert alert-info">
Captain(s): assuming that everyone on the team agrees that
you have completed the lab, prepare for submission.

In each of your repos, make a SQL dump of that app's database, with the option to drop any existing
tables. Put that in the <code>data</code> folder of the respective projects, 
and delete the original starter SQL from that folder.

There should be only one SQL file in your data folder,
so that my marking script isn't confused about what has to be
setup to mark your lab.

It is now time
to merge the develop branch into the master branch,
and submit a link to the dropbox!!
</div>

