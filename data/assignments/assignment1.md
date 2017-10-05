#Assignment #1 - WACKY Webapp
COMP4711 - BCIT - Fall 2017

##Assignments Overview

<img src="/pix/assignments/wacky-logo.png" class="pull-right"/>
The purpose of the assignments, collectively, is to have you apply the techniques 
from the lessons and tutorials.
In teams of three to five, you will be building a small but complete webapp, 
in our case to manage flight schedules for a regional airline. 

This will be done in three stages, with specific expectations for each stage. 
Each stage will be a separate assignment, building on top of the
earlier ones.
The framework and a number of supporting technologies have been pre-decided. 
The techniques for applying these will be the subject of upcoming lessons and tutorials.

##Goals for This Assignment

The purpose of this assignment #1 is to get the basic pieces of your webapp 
in the correct places expected for a CodeIgniter webapp.
It is to use a mock database, and present
mock views (no business logic expected), just like in lab 3.

The important thing here is to get the right pieces in the right places.
You will add proper functionality "behind" the components in the next two assignments.

#Backstory

<img src="/pix/assignments/cartoon-airplane.jpeg" class="pull-left"/>
The Western Airlines Consortium (WAC) has initiated a Knowledge Yielder (KY) project,
to make it easy for consumers to find flights within B.C., from one or more
of the consortium's member airlines.

WAC has 26 member airlines, operating out of 57 airports in B.C.
See the [WACKY server](https://wacky.jlparry.com) help page for directions
to see these.

WAC wants to make it easier for consumers to book flights between any two
of their airports, and for member airlines to collaborate to do so.

The three implementation phases for this project:

###Planning & Mock Database (Assignment 1)

Each member will select their fleet of airplanes, and come up with
an initial set of scheduled flights. Their webapp will simply
present their data.

###Own Flight Booking (Assignment 2)

Member airlines will build an online booking ability, for their
flights. The app will be made more robust through unit and
functional testing.

###Consortium Flight Booking (Assignment #3)

Each airline app will be able to pull data from the other
airlines, to offer consumers an end-to-end booking
ability. Apps will need to implement services to inter-operate.

##Business Rules

Your fleet can consist of any number and kind of recognized
airplanes, subject to a budget limit of $10M.
Your app will not be load-tested as part of assignment 1,
and you can change your fleet for later assignments.

Your flight schedule is the same regardless of the day of the week.
You want to make sure that each airport in your "network" is
visited at least twice a day. This could be one plane making a
complete circuit twice a day, or each of three planes making a
two return trips to one your "network" destinations, or any combination.

There are some restrictions on your schedule:

- no departures before 08:00
- no landings after 22:00
- minimum 30 minutes between a plane's landing and any subsequent
departure
- all of your fleet must be back at your airline base by the end
of the day
- flight times need to be reasonable, based on distance between
airports, airplane cruising speed, and a 10 minute buffer added
to each flight in order to reach cruising/landing speed and altitude

#Process

##Assignment Teams

Choose teammates and sign up for one of the available project teams
on D2L.

Select a CAPTAIN. They will create a Github organization
for the team, and they will maintain the team repository stored therein.
Team size should be between 3 and 5. Teams of one or two are **not acceptable**. 
This is partly about collaboration, after all.

If a team ends up dysfunctional, a dissenting member may be relegated or
transferred (depending on your perspective) to a team of my choice.

Team members do not have to be in the same set. It is your responsibility to coordinate
and collaborate appropriately if such is the case.

Team members do not have to receive the same grade.
Under-contributing members will will receive a lower mark.

##Testing & Deployment

The team captain should send me an email, identifying their team group.
I will reply with a password for
 the WAC's [Flight Center](https://wacky.jlparry.com/vault) website,
where you can configure your webapp's settings for automated deployment for testing.

You will then need to setup a webhook in your team repo settings,
linking to the WAC [deployment handler](https://deployer.jlparry.com/please).
Each time you push/merge to the configured branch in your team repo, the
repo will be automatically pulled and deployed on my server. 
It will then be accessible for testing through the subdomain with
your team name, for instance https://chicken.jlparry.com.

##Workflow

You are to use gitflow workflow, with proper forking and branching, and
with GPG-signed commits by team members. 

Contributions to the team repository should be by pull request only.

(Not required for this assignment, peer review and issue tracking may
come into play for upcoming assignments.)

All work should be done in your "develop" branch.
Before the deadline, the CAPTAIN should merge "develop" into "master",
and tag the master as a release, i.e. version 1.0.

If you create design or other documentation that would contribute to
the project, save it in a "docs" folder of your team repository.  
If you have text data that you wish to keep within your project,
put it in a "data" dolfer, which my script will ensure is writable
when deployed.

My marking assistant script will pull your repository's **master** branch,
and only it, for grading. 
You may then continue to work towards assignment 2, using your "develop" branch.

##Assignment Submission

Your assignment will result in a github repository for your team, separate from those for each team
member.

Submit a readme *text* file, or a submission comment, to the assignment 1 dropbox. 
It should contain a link to your **team**'s github repository only. 
I don't need links to the member repositories, as they can be determined
from the team one. No screenshots are needed, either, as functionality
will be determined by deploying the webapp on my test system.

Deadline: the end of week 5, i.e. 17:30 Sunday Oct 8th.

_This gives you ample time to enjoy Thanksgiving dinner and/or the Blade Runner 2049
opening, if you manage your time properly!_

##Assignment Marking Guideline

A marking rubric will be attached to the assignment dropboxes, similar to 
those used for labs. The assignments will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

#Features

Your webapp doesn't have to be "world-class" or even necessarily "real", 
but it needs sufficient complexity to be dynamic, personalized and scaleable/integrated.

The theme this term is "air travel bookings", as outlined in the Backstory earlier. 
Each of the teams will have their own webapp,
keeping track of the fleet of planes and the scheduled flights for an airline.

You are free to name your airline (not offensively), incorporating your team
name in it.

##Your Data

There are two kinds of data to keep track of at this point:

- **Fleet** - the planes that make up your airline's fleet.  
You will need a unique identifier for each airplane, and the kind of
plane it is. Any other information is up to you.

- **Flights** - the list of scheduled flights, each of which has
a unique alphanumeric identifier (again, starting with the first letter of your team name).
Minimum data for a flight? Departure airport and time, arrival airport & time.

At this point, we are trusting you to come up with reasonable flight times.
The next assignment will see some rigor added, for correctness :)

Your unique identifiers should be alphanumeric, starting with the same first letter
as your team name, to minimize confusion. Airplane and airport codes come
from WAC itself, which provides relevant properties for each type of airplane.

You might choose to model the above as one "table", or many "tables". You might decide to eliminate
duplicate fields, or to add redundant fields. You might ultimately decide to use a flat file to store these, instead
of a database table - if you are given the choice :-/ For this assignment, "storage" is a moot point, 
as you are to provide **mock data** in your model classes.

You are welcome to create models for the data from the WACKY server, but not required to.
If you don't, you will need to incorporate some of the data from there into your own models.

Do NOT use a relational database for this assignment. Instead, build mock
data, the same as was done in the starter-quotes repository you used earlier in lab.

You *could* satisfy the business requirements with a single plane in
your fleet, making two circle trips a day. I suspect you might be better
served by planning 2 or 3 planes, each of which was kept
relatively busy. Upcoming assignments will have ways for your airline to earn "money",
and the more flights you have, the more earning opportunities there will be. 
Don't stress over this - try to get things off on the right foot.

##Your Usecases

This is an "all show - no go" kind of webapp, and the term "usecase" feels
horribly overkill.

Your webapp will have three mandatory visible pages: home, fleet, and schedule;
and one service controller, `Info`.

###Homepage

Your webapp **homepage** is meant to be a dashboard of sorts, and eventually
the only page that a guest would able to see.  

Data to show: # of planes in your fleet, # flights scheduled on any day,
and the names of your base airport and those that you fly to.  

The next assignment will add the # of bookings, and $ spent/earned.
You don't have any data for that, but are welcome to provide for these in your page
layout.

Have a menu/navbar/links to reach the other two pages.

You are welcome to change your default controller (instead of Welcome),
but make sure that any links back to your homepage are of the form `/`, without
mentioning the name of your home controller.

###Fleet page

The **fleet** page should show all the airplanes in your fleet, ordered
reasonably, presented as a grid or table.

You don't need to show all data for a plane on this page ... 
clicking on a plane's identifier should trigger a separate page with everything
you can determine or show for that plane. This would suit a subcontoller and
secondary view for just the one plane.

###Flights page

The **flights** page should show all your flights in a table.

Have this include at least the aircraft code and the departure and arrival community names.

Add a tooltip or mouse over showing details for each of these in a mouse-over pop.

Need inspiration? http://www.yvr.ca/en/passengers/flights/departing-flights


###About page?

If you want to add an "about" page, feel free to do so. 

If you do have one, I suggest clear wording to inform the user that this
is an academic project, and not related to, or endorsed by, any similar
business from the real world.

###Info

This is to be a "RESTish" service controller, returning your model data in JSON format, 
on demand.

The "fleet" subcontroller, accessible as "/info/fleet", shall return the data content
of your "fleet" model. The "flights" subcontroller shall do the same for your flights model.


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

You will have **three or four controllers**, with any subcontrollers implemented as
methods. You can split these further in assignment 2 refactoring, if that
makes sense then.
You can use the base controller from the CI starter, just like in lab 3.

You will probably have **two models**, with your mock data. These will probably only have a couple
of methods each at the moment: one to retrieve all the data and one to
retrieve a specific record. 

You might want a model to hold data that comes from WAC. That could be manually extracted
right now, or ...?


You will have a **view template**, and probably **view fragments** for the header, footer
and navbar (if not part of the header). Yes, this implies a consistent
layout for the whole app, at this point.
You will have view fragments, to support the pages above.

This could mean one of the team members piloting a controller, view
or model, and then the others doing the same thing for the others.
Alternately, you could assign workload according to component type.


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
