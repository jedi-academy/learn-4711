#Assignment #1 - Bot Factory Webapp
COMP4711 - BCIT - Winter 2017

##Assignments Overview

The purpose of the assignments, collectively, is to let you apply the techniques 
from the lessons and tutorials.
In teams of up to five, you will be building a small but complete webapp, 
in our case to manage a simple robot factory. 

This will be done in three stages, with specific expectations for each stage. 
Each stage will be a separate assignment, building on top of the
earlier ones.
The framework and a number of supporting technologies have been pre-decided. 
The techniques for applying these will be the subject of upcoming lessons and tutorials.

##Goals for This Assignment

The purpose of this assignment #1 is to get the basic pieces of your webapp 
in the correct places expected for a CodeIgniter webapp.
It is to use a mock database (i.e. mock data for any tables), and present
mock views (no business logic expected), just like in lab 3.

##Backstory

[Umbrella Corporation](http://residentevil.wikia.com/wiki/Umbrella_Corporation) is trying 
to improve its public image, after an "industrial accident" at its 
[Raccoon City](http://residentevil.wikia.com/wiki/Raccoon_City) research & development facility.
The corporation has embarked on a new project, building cute household robots.
Efforts are coordinated at their new Panda Research Center.

Umbrella Corp is outsourcing robot assembly to a number of plants worldwide.
Each team will be building the webapp to support one of these.

Robots come in three pieces - top (with head and manipulator appendages), torso
(for essential fluids and computational components) and bottom (with propulsion
mechanisms). There are three lines of robots - household, butler and companion
bots, each of which might have several models.

Each plant has an inventory of robot pieces, specializes in making one piece for 
a designated robot model, and can ship unneeded pieces or assembled robots
to Umbrella's Panda center, for credit.

Each robot piece, or assembled robot, has a Certificate of Authenticity (CA), issued by Umbrella
Corp. When a plant buys parts from the research center, each comes with its own CA.
When a plant sells parts or robots, they surrender the CA(s) for each of the pieces.

##Assignment Teams

Choose teammates, and select a CAPTAIN. They will create a Github organization
for the team, and they will maintain the team repository stored therein.
Team size should be between 3 and 5. Teams of one or two are **not acceptable**. 
This is partly about collaboration, after all.

If a team ends up dysfunctional, a dissenting member may be relegated or
transferred (depending on your perspective) to a team of my choice.

Team members do not have to be in the same set. It is your responsibility to coordinate
and collaborate appropriately if such is the case.
Team members do not have to receive the same grade.
Under-contributing members will will receive a lower mark.

##Workflow

You are to use gitflow workflow, with proper forking and branching, and
with GPG-signed commits by team members. 
Team members should use the same github account for all their
work, so that contribution breakdown can be determined.

Contributions to the team repository should be by pull request only.

Not required for this assignment, peer review and issue tracking will
come into play for assignment 2.

All work should be done in your "develop" branch.
Before the deadline, the CAPTAIN should merge "develop" into "master",
and tag the master as a release, i.e. version 1.0.

If you create design or other documentation that would contribute to
the project, save it in the "docs" folder of your team repository.

My marking assistant script will pull your repository's **master** branch,
and only it, for grading. 
You may then continue to work towards assignment 2, using your "develop" branch.

##Assignment Submission

Your assignment will result in a github repository for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository only. 
I don't need links to the member repositories, as they can be determined
from the team one. No screenshots are needed, either, as functionality
will be determined by deploying the webapp on my test system.

Deadline: the end of week 4, i.e. 17:30 Sunday Feb 5th.

##Assignment Marking Guideline

A marking rubric will be attached to the assignment dropboxes, similar to 
those used for labs. The assignments will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

#Your Webapp

Your webapp doesn't have to be "world-class" or even necessarily "real", 
but it needs sufficient complexity to be dynamic, personalized and scaleable/integrated.

The theme this term is a "robot plant", as outlined in the Backstory earlier. 
Each of the teams will have a separate "business",
which keeps track of the robot pieces or assembled bots in their plant.

You are free to name your plant or team, just not offensively.

##Your Data

There are three kinds of data to keep track of:

- **Parts** - the individual robot pieces you have on hand. Each will have a unique
identifier, a code
of some sort (eg A3), and a certificate of Authenticity. From the piece's code,
you can determine the robot line and model, and which kind of piece this is.
- **Robots** - the list of assembled robots you have on hand, that you haven't
shipped to the research center yet. Each will need a unique identifier, and
composition information (the identifiers of the pieces that make us this robot).
- **History** - a record of your activity since the plant was opened or
reopened. This would include purchases, assemblies, and shipments.

You might choose to model these as one table, or many tables. You might decide to eliminate
duplicate fields. You might decide to use a flat file to store these, instead
of a database table. Your call.

I think it might be an idea to keep the data separate, as assignment #3 will see the
webapp split into at least two webapps, simulating a distributed system.

You will need to provide for a transaction history or histories too, perhaps several files with appropriate fields.
You want to track supplies receipts & issues, recipe production, and stock sales.

Do NOT use a relational database for this assignment. Instead, build mock
data, the same as was done in the starter-quotes repository you used in week 2.

You want to have a half-dozen or so menu items and recipes, and 6-12 kinds of
items stocked in your pantry. The pantry items should be driven by the recipes.
You are welcome to have more, but that is not required.

##Your Usecases

User roles will be introduced in assignment #2. There are four planned, and they 
form the basis of the pages to build for this assignment: 
administrator, receiving, production, and sales.
Feel free to use simpler names or nouns for these.

In addition to a homepage for your webapp, you should have a page (or more)
for each of these roles/usecases.

The **administrator** page should provide for editing all of the data tables.
This could be presenting each as an HTML table, with "edit" & "delete" buttons
beside each row, and with an additional "add" button somewhere.
You could provide a tabbed interface, with a different tab for each table.
You could provide a drill-down interface, where the main administrator page
had links to further pages for each table. The recipe table will be the
most complicated!

You do not need to implement any CRUD, just build & display the HTML forms
that will be used for that.

The **receiving** page should show a list of items provided for in your
pantry, and then a way to specify how many (receiving) units of each are
being accepted into stock. This could be a numeric field beside each item,
or it could be a button/link beside each, which prompts for the
quantity being received.

You don't need to update any quantities, but should log the transaction that
would have resulted.

The **production** page should show recipes, and for the selected one, show
the ingredients that go into it, flagging any that are not on hand.
Log any items made, without updating inventory.

The **sales** page should show a menu of purchaseable items,
with description & price for each. The goal of this page is to build an order
with multiple items, and to log the transaction that would result if the
sale proceeded for real.

The **homepage** should be a dashboard of sorts, showing some summary
information: $ spent purchasing inventory, $ received from sales,
cost of sales ingredients consumed. These are derived from the transaction logs.

##Webapp Sitemap

Your webapp would suit having a primary navbar with five items: one for the
homepage and one for each of the usecases.

Some of the usecases will involve additional pages. You could handle that with a
secondary navbar, or with a hierarchical structure (drill down, "back" to return).

If you want to add an "about" page, feel free to do so. This is not expected.
If you do have one, I suggest clear wording to inform the user that this
is an academic project, and not related to or endorsed by any similar
business from the real world.

You will note that there has been no mention of authentication - that is on purpose.
It will be coming with one of the latter assignments. Don't complicate
the current one with it!

##Your Presentation

Your webapp will be evaluated on its functionality, not on how good it looks. 
It is better to have a consistent design, with elements appropriate to the 
purpose, than it is to have a pretty design. 
Your "job" is to design and implement the back-end of such a site. 
That doesn't mean your site's appearance should be ugly or cringe-worthy - 
there are many freely available website templates online.

It would be appropriate to have some design, with visual elements appropriate
to your "business". Menu item images, for instance, might be added in the next
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

You will have five controllers, with subcontrollers implemented as
methods. You can split these further in assignment 2 refactoring, if that
makes sense then.
You can use the base controller from the CI starter, just like in lab 3.

You will have three main models, with mock data. These will probably only have a couple
of methods each at the moment: one to retrieve all the data and one to
retrieve a specific record.


You will have a view template, and possibly view fragments for the header, footer
and navbar (if not part of the header). Yes, this implies a consistent
layout for the whole app, at this point.
You will have view fragments, at least one for each of the usecases and
subusecases.

Don't despair! Get one of the usecase controllers done, and the others will be similar.
Get one main model done, and the others will be similar.
Get one usecase view sorted out, with its view fragments, and the others
will be similar. Each team member could become the "specialist" for
a given kind of component :)

This could mean one of the team members piloting a controller, view
or model, and then the others doing the same thing for the others.
In other words, the expected workload for each member is 1 model,
1 controller, and the view fragments needed to support these.
There would be shared stuff and infrastructure, but that can be divided
between the team members.

Phew!

Wait a minute - what about smaller teams? the members of a smaller team will 
have a bit more to do individually, sorry - no break.

##Your Code

You are programmers, and you want to be professional. Code like it.

That means clearly written and formatted code, properly commented.
This applies specifically to classes, which at this stage will be
your controllers and models.

Your views should have no PHP in them.

Remember the golden rules!!! (Can't stress this enough, obviously)

##Cautions

Don't get carried away, spending days coming up with “perfect” design or content, etc.

This is a course assignment, not a job, and not an industry-sponsored project. 
It is a vehicle to learn how to use CodeIgniter to build a simple webapp, 
incorporating good practices.
