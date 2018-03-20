#Assignment #2 - Completed Accessorize Webapp 
COMP4711 - BCIT - Winter 2018

##Assignment Overview & Goals - Accessorize

The purpose of the assignments, collectively, is to let you apply the techniques 
from the lessons and tutorials.
As previously decribed, you are building a small but complete webapp, 
in our case to accessorize the gear for a person or vehicle.
Refer to assignment one for business logic descriptions.

The purpose of this assignment (#2) is to add functionality to the "mockup" pieces
from assignment #1, using real (not mock) data persistance and 
fleshing out the usecases.

The tasks for this assignment are to build:
- proper entity models for your categories, accessories, and sets of gear
- unit testing for these, invoked through continuous integration
- role-based maintenance for these
- role-bases customization of a set of gear

#Process

###Assignment Teams

You have project teams already, and should stick with them.
If any team membership changes are desired, see me.

Team members do not have to receive the same grade.
Under-contributing members will will receive a lower mark.

###Workflow

Continue to use gitflow workflow, with proper branching and GPG-signed commits.

###Testing & Deployment

The [test & deployment server](/display/lesson/webhooks) is available to test your 
code in a "production" environment, as you did for assignment 1.

###Assignment Submission

Your assignment will result in a team repository on Github.
Your dropbox submission should be or include a link to your team's repository
(not its cloning URL).

Due date: Sunday Apr 8, 23:30.

###Assignment Marking Guideline

A marking rubric will be attached to the assignment dropbox, similar to 
those used for labs. 

###Changelog

Do provide a changelog, showing the components that are different for this
assignment compared to the previous one. Group the components by component
type (controllers, models, etc).

#Features

From assignment 1, you have a target theme, layout and planned MVC components.
You could stick with those, if they make sense for the usecases.
If in doubt, ask your lab instructor.

The subsections here address your data, and then each of your usecases (pages).

##Your Data

Stuff gets "real" now. You need models for categories, not hard-coded categories.
You need accessories that belong to each category.
You need sets of gear, namely a group of accessories, at most one from each category.
Some might be pre-built, for testing convenience, but they need to be customizable.

Each accessory will need its own image, the name of which is a property of an accessory,
so that you can re-construct the appearance of any set, not through pre-rendered
images.

Your data must be in a folder inside your project but outside of `public`.
Your images should be in a subfolder inside `public`, though it is possible to
hide them outside it for security.

If you want to have a known set of data for testing, it might be an idea
to keep a copy of that separate from the "real data". The "real data" folder would be git ignored,
while the "test data" folder would be explicitly part of your git-managed
repo.



##Models

You previously had models for your fleet and flight schedule, and possibly
one to retrieve shared data from the WACKY server.

Add entity models for a single plane and for a flight, and make sure that
you have a model to retrieve shared data from the WACKY server.

The entity models will be similar to what you build for lab 7.

Business rules to enforce, for entities, are the same as for assignment 1, with the clarification
that **recognized airplanes** are ones in the data from the WACKY server.



##User Roles

I suggest a menu dropdown to switch between user roles, as with labs 5-6.
You do not need authentication for this assignment.

Note: I may provide some tutorial material during week 10, so that
you can add simple authentication if desired. This would block
other students from changing your data :) 
This may not be an issue, if your test data is redeployed automatically.  
Let me know if you would like this.

Add the current user role selection/display to the navbar, like we did in lab.

##Unit Testing

As you did in lab 7, provide for unit testing of your models.

In the case of the entity classes, this will ensure that your
classes accept good data and reject bad data.

In the case of the collection classes, things get a bit trickier.
You want to test that your collection data is acceptable:
- all planes conform to the rules (kinds of planes, value of fleet)
- all flights conform to the rules (home to meet curfew, travelling
only to places you are allowed to)


##Sessions

You will need sessions enabled, to store your data transfer buffers
for maintenance and for flight booking data.

Use file-based sessions, and configure yours to use `/tmp` as the writeable
folder. You may have to create this on your system, and you will
need to ensure that its permissions are appropriate. 

#Usecases

##Homepage (dashboard)

Your homepage contains a dashboard of sorts.

The displayed data should now be provided or calculated from your database.

This page is accessible to any user role (a.k.a. "Guest").

##Flight bookings

Add flight bookings, either to your homepage, or as a separate page.

This should have a dropdown to select departure and destination airports, with yours
being the choices to choose from.

Given a selection, build & display a list of applicable bookings to select from,
in the general style of flightcentre.ca (but simpler, to suit your data).
A flight may have up to three legs, eg Vancouver - Prince George, or Vancouver -
Kamloops + Kamloops - Fort St John + Fort St John - Prince George.
The flights should be supported by your data.

##Fleet page

In assignment 1, the **fleet** page showed all the airplanes in your fleet, ordered
reasonably, presented as a grid or table.

Make sure the plane identifiers link to a plane data page.

If the user role is "Admin", then the plane data page should show editable
fields, and there should be an "Add..." button or link on the fleet page.

You are welcome to use Javascript widgets to improve the user experience
or validate the data, but that is not expected.

You MUST provide server-side validation for submitted data.

##Flights page

In assignment 1, the **flights** page showed all the flights in your schedule, ordered
reasonably, presented as a grid or table.

Make sure the flight identifiers link to a plane data page.

If the user role is "Admin", then the plane data page should show editable
fields, and there should be an "Add..." button or link on the fleet page.

You are welcome to use Javascript widgets to improve the user experience
or validate the data, but that is not expected.

You MUST provide server-side validation for submitted data.


#Webapp Constraints

Same as before...

- There shall be no PHP in your view source files.
- You are welcome to use a third party templating engine, but without PHP in your view.
- Remember the golden rules, especially case sensitivity!

Just a reminder: code like professionals :)

