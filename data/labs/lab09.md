#Lab #9 - RESTful Client & Server
COMP4711 - BCIT - Fall 2017

##Lab Goals

The purpose of this lab is to take a working webapp, 
the Todo List Manager, and split it into two
parts which talk to each other using RESTful distributed system conventions.

We will continue to use gitflow workflow. That means proper branching (master/develop), 
completing new work in feature branches, and good commit comments.

##Lab Teams

I have setup a new set of "Lab09" teams of two for this,
to give you an opportunity to switch partners if you like. You may partner with the
same person as the earlier labs, if you like, but don't have to.

If your set has an odd number of members who show up to lab, I can override-add
you to a team. Alternately, you are welcome to have a team of one.

This lab really suits a team of two, each wotking on either the frontend or the backend. 
If your team has three members, then one of them will have to contribute to both the
client and the server, to spread the work out fairly.

##Lab Submission

This lab will result in **two** github repositories for your team, one 
for each "side" of the distributed webapp. Do not reuse earlier repositories, but feel free to use an
existing github organization if appropriate.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to each of the team repositories for the lab,
clearly distinguishing between the "front-end" and the "back-end" apps.

I have set the deadline to this coming Sunday at 17:30.

##Lab Marking Guideline

A marking rubric will be attached to the lab 9 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

##Process

You know to setup an organization for your team, if needed.

Make sure that you **merge your develop branch into your master** at the end of the lab,
for both of the repositories.

##Github repositories

You may choose any of the last three labs as the starting point for this one.
The data representation for persistance doesn't matter, and you don't need unit testing for this lab.
This lab is about a distributed system, regardless of the data format or 
the model's correctness.

Create your two repositories, initially "empty", and **copy**, to each, the contents of the earlier
repo that you have chosen as a starter. Make sure that branching is setup,
with a "clean" *develop*, before any team members fork the repos.

Just to be clear: the two repositories will start out identical except for their name.

##Examples?

The example-ferries-... repositories in the Jedi Academy organization provide
an example of what we are doing here. These would be the
[standalone](https://github.com/jedi-academy/example-ferries-standalone) one, 
the [frontend](https://github.com/jedi-academy/example-ferries-client) one,
and the [backend](https://github.com/jedi-academy/example-ferries-server) one.

Additionally, you will find there a [RESTful package repo](https://github.com/jedi-academy/package-restful), 
with the goodies we
will need for "distributed glue".

##Planning

Let's plan a few things before we start modifying code.

Your starting app(s) manage(s) todo items, with changes made through the Views
controller (completion) and the Mtce controller (maintenance).
These use a <code>Tasks</code> model to manage the persistent data.

We are going to split the webapp functionality, so that all todo data maintenance
is literally performed on our "backend" app, which will have the persistent data,
and so that the "frontend" app sends requests to the "backend" one,
instead of attempting to access local data.

You will need to configure separate hostnames and virtual hosts for each of the apps.
let's use "backend.local" for the "backend" app, so that we don't have to mess
with configuration when I check your submissions. 

When the dust settles, there will be no visible difference when running the
"frontend" webapp. The magic happens behind the scenes.

The front-end webapp will have the following changes from the starter:

- <code>models/Tasks</code> will be changed to make RESTful calls to the "backend"
- it will not persist the tasks data
- you will incorporate the RESTful package from the Jedi Academy

The back-end webapp will have the following changes from the starter:

- the <code>Welcome</code> controller will exist, but only to show
a "go away" message
- you will add a <code>Job</code> RESTful resource controller, which acts as a
RESTful server
- all other controllers are removed
- you will incorporate the RESTful package from the Jedi Academy

The above is effectively "splitting" the original app, through the <code>Tasks</code> model.
Each of the apps will have a <code>Tasks</code> model, but the "frontend" one
will only make RESTful requests to the "backend", and the "backend" <code>Tasks</code>
model will work with the real "database" for todo items.

##Your jobs

There are two tutorials for this:
- making a [RESTful resource controller](/display/tutorial/tut-adv02) for the backend
- [adapting the frontend](/display/tutorial/tut-adv03) to use the backend

Divvy up the work accordingly.


#Wrapup (Are We Done Yet?)

<div class="alert alert-info">
Captain(s): assuming that everyone on the team agrees that
you have completed the lab, prepare for submission.

It is now time
to merge the develop branch into the master branch,
and submit a link to the dropbox!!
</div>

