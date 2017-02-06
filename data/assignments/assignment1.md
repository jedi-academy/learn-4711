#Assignment #1 - Bot Factory Webapp
COMP4711 - BCIT - Winter 2017

##Assignments Overview

<img src="/pix/assignments/umbrellacorporation3.png" class="pull-left"/>
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

The important thing here is to get the right pieces in the right places.
You will add proper functionality "behind" the components in the next two assignments.

#Backstory

<img src="/pix/assignments/panda.jpg" class="pull-left"/>
[Umbrella Corporation](http://residentevil.wikia.com/wiki/Umbrella_Corporation) is trying 
to improve its public image, after an "industrial accident" at its 
[Raccoon City](http://residentevil.wikia.com/wiki/Raccoon_City) research & development facility.
The corporation has embarked on a new project, building cute household robots.
Efforts are coordinated at their new Panda Research Center.

Umbrella Corp is outsourcing robot assembly to a number of plants worldwide.
Each COMP4711 team will be building the webapp to support one of these.

***

##Cute household robots

<img src="/download/bots/a.jpg" width="80" height="100" class="pull-left"/>
Umbrella Corp currently produces six robot models, each designated by a single letter.
There are three lines of robots - household, butler and companion
bots, in order of perceived value and increasing price.
Models `A` through `L` have been reserved for household bots, `M` through `V` for butler
bots, and `W` through `Z` for companion bots.
Not needed, but you might be interested in the [collection of bots](/download/bots.zip)
pictures.  

***

<img src="/download/parts/a1.jpeg"  width="80" height="31" class="pull-left"/>
Robots come in three pieces - top (with head and manipulator appendages), torso
(for essential fluids and computational components) and bottom (with propulsion
mechanisms). Each piece has a two-letter designation - the bot model (`a`-`z`)
and the part (`1`-`3`). You should grab the [collection of parts](/download/parts.zip)
pictures to use in your app.

***

<img src="/download/parts/b2.jpeg" width="80" height="31" class="pull-left"/>
Each plant has an inventory of robot parts, specializes in making one piece for 
a designated robot model, and can ship unneeded parts or assembled robots
to Umbrella's Panda Research Center, for credit.

***

<img src="/download/parts/c3.jpeg" width="80" height="31" class="pull-left"/>
Each robot piece, or assembled robot, has a Certificate of Authenticity (CA) code, issued by Umbrella
Corp. When a plant buys parts from the research center, each comes with its own CA.
When a plant sells parts or robots, they surrender the CA(s) for each of the pieces.
Practically speaking, each CA will be a 6-8 hex digit code, which can be verified
through head office.

##Commerce

Ultimately, each plant hopes to make a "profit" through its collaboration with
Umbrella Corp. Umbrella keeps track of the credits that each plant has earned,
and which are available to spend on more parts. Head office tracks all of these,
and will prevent transactions for which a plant does have sufficient credits on hand.

At the beginning of a "business day", balances will be reset to a standard starting point.
A plant can buy boxes of parts ($100 for ten), to use to assemble bots in-house.
Completed bots can be sold to Umbrella, at pre-determined prices ($25/50 for household bot,
$50/100 for a butler bot, $100/200 for a companion bot, and $25 for a "motley" bot).

The higher prices, if two are shown, apply if the three parts are for the same model.
The lower prices are for parts from the same line of robots, but not the same model.
A "motley" bot is one where the parts do not come from the same line of robots.

Plants can also return unwanted parts to head office, for a credit of $5 each
(after the 50% restocking charge).

These transactions are not enabled for assignment 1 - they will be part of assignment 2.
They might inform your UX design, however.

#Process

##Assignment Teams

Choose teammates, and select a CAPTAIN. They will create a Github organization
for the team, and they will maintain the team repository stored therein.
Team size should be between 3 and 5. Teams of one or two are **not acceptable**. 
This is partly about collaboration, after all.

The group sizes have been set to 4, with self-enrolment. 
That gives a reasonable number of groups to play with.
Ask me to over-ride that if you have a fifth member.

If a team ends up dysfunctional, a dissenting member may be relegated or
transferred (depending on your perspective) to a team of my choice.

Team members do not have to be in the same set. It is your responsibility to coordinate
and collaborate appropriately if such is the case.
Team members do not have to receive the same grade.
Under-contributing members will will receive a lower mark.

##Testing & Deployment

The team captain should send me an email, identifying their team group.
I will reply with a super-secret access code. Use this to login
to Umbrella Corp's [Panda Center](https://umbrella.jlparry.com/vault) website,
and configure your plant's repository settings for "head office".

You will then need to setup a webhook in your team repo settings,
linking to the corporate [deployment handler](https://umbrella.jlparry.com/deploy).
Each time you merge to the configured branch in your team repo, the
repo will be automatically pulled and deployed on my server. 
It will then be accessible for testing through the subdomain with
your team name, for instance https://tomato.jlparry.com.

##Workflow

You are to use gitflow workflow, with proper forking and branching, and
with GPG-signed commits by team members. 

Contributions to the team repository should be by pull request only.

(Not required for this assignment, peer review and issue tracking will
come into play for assignment 2.)

All work should be done in your "develop" branch.
Before the deadline, the CAPTAIN should merge "develop" into "master",
and tag the master as a release, i.e. version 1.0.

If you create design or other documentation that would contribute to
the project, save it in the "docs" folder of your team repository.

My marking assistant script will pull your repository's **master** branch,
and only it, for grading. 
You may then continue to work towards assignment 2, using your "develop" branch.

##Assignment Submission

Your assignment will result in a github repository for your team, separate from those for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository only. 
I don't need links to the member repositories, as they can be determined
from the team one. No screenshots are needed, either, as functionality
will be determined by deploying the webapp on my test system.

Deadline: the end of week 5, i.e. 17:30 Sunday Feb 12th.

##Assignment Marking Guideline

A marking rubric will be attached to the assignment dropboxes, similar to 
those used for labs. The assignments will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

#Features

Your webapp doesn't have to be "world-class" or even necessarily "real", 
but it needs sufficient complexity to be dynamic, personalized and scaleable/integrated.

The theme this term is a "robot plant", as outlined in the Backstory earlier. 
Each of the teams will have a separate "business",
which keeps track of the robot pieces or assembled bots in their plant.

You are free to name your plant or team, just not offensively.

##Your Data

There are three kinds of data to keep track of:

- **Parts** - the individual robot pieces you have on hand. Each will have a unique
identifier, a robot part code (eg A3), a Certificate of Authenticity (CA) code, 
plant built at, and date & time built. 
From the piece's code,
you can determine the robot line and model, and which kind of piece this is.
- **Robots** - the list of assembled robots you have on hand, that you haven't
shipped to the research center yet. Each will need a unique identifier, and
composition information (the identifiers of the pieces that make us this robot).
- **History** - a record of your activity since the plant was opened or
reopened. This would include purchases, assemblies, and shipments; and the date & 
time of each transaction.

You might choose to model these as one "table", or many "tables". You might decide to eliminate
duplicate fields. You might decide to use a flat file to store these, instead
of a database table. Your call. For this assignment, "storage" is a moot point, 
as you are to provide mock data in your model classes.


Do NOT use a relational database for this assignment. Instead, build mock
data, the same as was done in the starter-quotes repository you used in week 2.

You want to have a half-dozen or so items for the mock data for each of your models,
so that the webapp gives a sense of how the working version might look. 

##Your Usecases

User roles will be introduced in assignment #2. There are four planned, and they 
form the basis of the pages to build for this assignment: 
guest, worker, supervisor, and boss.
Each of these roles will have a webpage, to help them do their job better.
There is no authentication for this assignment - the roles are mentioned
to help give you a better understanding

Your webapp will have four mandatory pages: home, parts, assembly, and history.

###Homepage

Your webapp **homepage** is meant to be a dashboard of sorts, and eventually
the only page that a guest would able to see.  
Data to show: # of parts on hand, # assembled bots, $ spent, #earned

###Parts page

The **parts** page (for workers) should show all the parts currently on hand, ordered
reasonably (piece type?) in a grid with images.
Show the model & line as either a tooltip for the image, or underneath each.

Clicking on a part should show the complete data you have for that part, including
CA, date made or acquired, etc. This would suit a subcontoller and
secondary page for just one piece.

###Assembly page

The **assembly** page (for supervisors) lets a user select the pieces that 
they would like combined to make a complete bot, the pieces that they
consider unwanted and would like to return, or the assembled bot(s) that they
would like to ship to head office.

This could be accommodated by presenting all the parts you have,
with a checkbox beside each. The "returning" could then
be handled by selecting all unwanted parts and clicking a
"return to head office" button. Assembly could be affected
by selected one of each type of part, and clicking a 
"build it" button.

You don't need functionality behind the two action buttons for
this assignment, but the upcoming functionality will likely
influence your layout.

###History page

The **history** page (for bosses) should show a list of your plant's history
transactions. Plan for this list being sortable and paginated
come assignment 2.

###About page?

If a team of four, and you want to add an "about" page, feel free to do so. 
If a team of five, an "about" page is expected.

If you do have one, I suggest clear wording to inform the user that this
is an academic project, and not related to, or endorsed by, any similar
business from the real world.


##Webapp Sitemap

Your webapp would suit having a primary navbar with menu items for the
homepage and each of the other pages/usecases.

Some of the usecases will involve additional pages/subpages. 
The webapp complexity does not warrant having a secondary navbar.
In such cases, a "Back" button on any subpages would suffice.

You will note that there has been no mention of authentication, with
login and logout menu items. That is on purpose.
This will be coming with one of the latter assignments. Don't complicate
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

You will have some configuration, probably `config/autoload` and `config/config`.

You will have **four/five controllers**, with any subcontrollers implemented as
methods. You can split these further in assignment 2 refactoring, if that
makes sense then.
You can use the base controller from the CI starter, just like in lab 3.

You will probably have **three models**, with mock data. These will probably only have a couple
of methods each at the moment: one to retrieve all the data and one to
retrieve a specific record.


You will have a **view template**, and possibly **view fragments** for the header, footer
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
Alternately, you could assign workload according to component type.

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
