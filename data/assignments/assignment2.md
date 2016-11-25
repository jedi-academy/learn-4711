#Assignment #2 - Functional & Distributed Pantry Webapp
COMP4711 - BCIT - Fall 2016

##Assignments Overview

The assignments were originally planned to be done in three phases,
but phase two was combined with phase 3 because of lab experience I
thought you should have before tackling it. The original phase 3 scope
has been scaled back as a result, and the last two phases combined into this
assignment.

##Goals for This Assignment

The purpose of this assignment #2 is to apply the techniques we have practiced
in lab, to build a "good" CodeIgniter webapp, distributed over two apps.


##Assignment Teams

You have project teams already, and should stick with them.
If any team membership changes are desired, see me.

Team members do not have to receive the same grade.
Under-contributing members will will receive a lower mark.

##Workflow

You are to use gitflow workflow, with proper forking and branching. 
Team members should use the same github account for all their
work, so that contribution breakdown can be determined.

Contributions to the team repository should be by pull request only.

I encourage you to use issue tracking for work planning and for problems you spot in a teammate's 
code. This will make it easier for all of you to know how close to "done"
you are.

All work should be done in your "develop" branch.
Before the deadline, the CAPTAIN should merge "develop" into "master",
and tag the master as a release, i.e. version 2.0.

If you create design or other documentation that would contribute to
the project, save it in the "docs" folder of your team repository.

My marking assistant script will pull your repositorys' **master** branch,
and only it, for grading. 

##Assignment Submission

Your assignment will result in two github repositories for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your two **team**'s github repositories. 
I don't need links to the member repositories, as they can be determined
from the team one. No screenshots are needed, either, as functionality
will be determined by deploying the webapp on my test system.

Due date: Sunday Dec 4, 23:30.

##Assignment Marking Guideline

A marking rubric will be attached to the assignment dropboxes, similar to 
those used for labs. Assignment 2 will be weighted more than assignment 1,
because of the difference in work expected for proper completion.
The planned ratio is 3:2, i.e. A#1 will be 40% of your assignment grade
and A#2 will be 60%. 

#Your Webapp

Your webapp doesn't have to be "world-class" or even necessarily "real", 
but it needs sufficient complexity to be dynamic, personalized and scaleable/integrated.

You have a target scenario for your webapp, form assignment 1, and a theme
and layout that you should stick with, unless otherwise suggested by me.

##Your Data

You have provided mock data for assignment 1. 
Put this into appropriate tables in a MySQL database for assignment 2.
That would include tables for supplies, recipes, and stock/menu, stemming
from your scenario and assignment 1. You will need a session table too, 
and possibly others, depending on your design choices.

Your webapp will be split in two, with the supplies management done by your
"backend" webapp. It is the only app that should have supplies in the database, and conversely
that app should not have any of the other tables needed for your front-end.

You will need to provide for a transaction history or histories too, perhaps several files with appropriate fields.
You want to track supplies receipts & issues, recipe production, and stock sales.

You want to have a half-dozen or so menu items and recipes, and 6-12 kinds of
items stocked in your pantry. The pantry items should be driven by the recipes.
You are welcome to have more, but that is not required.

##Your Usecases

Let's go with three user roles: admin, user and guest.
Guests can use the sales page of your front-end.
Users can do anything except maintenance.
Admins can do anything including maintenance.

In addition to a homepage for your webapp, you should have a page (or more)
for each of these roles/usecases.

For assignment 1, you made an **administrator** page, providing for "editing" all of the data tables.
The form fields were not active, nor connected to logic.

For assignment 2, the maintenance forms should be handled.
That will mean validation rules in your front-end,
and persistance in the appropriate table (or backend, for supplies).

Similarly, the **receiving, production & sales** pages can now be made "live".

Your **homepage** dashboard can be made "real" too, and give
an indication of the current or recent activity in your "shop".

##Webapp Sitemap

Your frontend webapp would suit having a primary navbar with five items: one for the
homepage and one for each of the usecases.

Some of the usecases will involve additional pages. You could handle that with a
secondary navbar, or with a hierarchical structure (drill down, "back" to return).

If you want to add an "about" page, feel free to do so. This is not expected.
If you do have one, I suggest clear wording to inform the user that this
is an academic project, and not related to or endorsed by any similar
business from the real world.

##Your Presentation

Your webapp will be evaluated on its functionality, not on how good it looks. 
It is better to have a consistent design, with elements appropriate to the 
purpose, than it is to have a pretty design. 
Your "job" is to design and implement the back-end of such a site. 
That doesn't mean your site's appearance should be ugly or cringe-worthy - 
there are many freely available website templates online.

It would be appropriate to have some design, with visual elements appropriate
to your "business". Menu item images, for instance will be added in the next
assignment

What I will be looking for is consistency. It should look like the
different parts of the site, which will likely be built by different
team members, share a similar look & feel!

Feel free to use any CSS/javascript frameworks you are familiar or comfortable 
with, subject to the constraints described next.

##Webapp Constraints

There shall be no PHP in your view source files.

You are welcome to use a third party templating engine, but without PHP in your view.

Remember the golden rules, especially case sensitivity!

##Webapp Components

You are probably stressing out by this point ... just how much do we
have to build for this bleep-bleep assignment?

You will have some configuration, probably config/autoload and config/config.

You will need all the controllers from assignment 1, with modifications
to make them functional and buletproof.

You will also need a second project, with a REST controller to manage
supplies.

##Your Code

You are programmers, and you want to be professional. Code like it.

That means clearly written and formatted code, properly commented.
This applies specifically to classes, which at this stage will be
your controllers and models.

Your views should have no PHP in them, apart from possibly comments.

Remember the golden rules!!! (Can't stress this enough, obviously)

##Parting Notes

I will maintain an FAQ on the course hub, as needed.

I am also working on the automatic deployer, so you can test your project on
a live Linux server. I will provide details on that as soon as possible.

