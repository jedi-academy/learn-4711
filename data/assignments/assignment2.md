#Assignment #2 - Completed Accessorize Webapp 
COMP4711 

#D R A F T ... questions to me, please!

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
- role-based maintenance for these, with form validation
- role-based customization of a set of gear

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
Use of this server is optional, and up to each team.

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

For those groups with extensive Javascript, you don't want to hard-code
stuff inappropriately, i.e. stuff that would normally come from your
"database". This means that you should generate JSON or a script including
generated values, to be part of the client-side functionality.
See me if unclear on this.

##Accessory Attributes

You have attributes for your accessories (eg hue, saturation & luminence; or 
strength, armor, cost). Each of those probably has a valid value range.

It would be appropriate to define these as "data", to avoid hard-coding.
A good place to do that would be in an `App` model, like we
have used in the last few labs.

##Models

You already should have models for the collections of things (categories, accesssories, and sets).
You might even have two set models - one for set names and one for the stuff inside a set.

Add an entity model for accessories, similar to what you built for lab 7.

Business rules to enforce would be similar to form validation - valid attribute ranges, 
valid image name.

Not required, but a good and easy way to apply these would be inside your accessories collection
model - taking whatever data is to be added or updated for a specific accessory, 
and making an instance of this accessory model (with validation enforced)
to add to the collection. This makes sure that only "clean" data is added.

You could add an entity model for a set of gear - that is up to you. It would make it easy 
to ensure that you have at most one accessory for a given category -
that could be a "sanity check" as part of your `add()` or `update()` methods.
If you follow this route, make sure that you have unit testing for it!

Feel free to add other models as needed, to encapsulate or enforce
business rules.

Note that your categories model defines the names you use for the kinds of pieces
in a set of gear. Those should not be hard-coded. Instead of a category "Left hand",
use a category code of "L" or "3" (for instance), which has a value or description
of "Left hand". This is a normal kind of refactoring!

##User Roles

I suggest a menu dropdown to switch between user roles, as with labs 5-6.
You do not need authentication for this assignment.

Add the current user role selection/display to the navbar, like we did in lab.

You need three roles: "guest", "user" and "admin". "Guest" should be the default
if there is no user role stored in your session.

##Unit Testing

As you did in lab 7, provide for unit testing of your models.

In the case of the entity classes, this will ensure that your
classes accept good data and reject bad data.

In the case of the collection classes, things get a bit trickier.
You want to test that your collection data is acceptable, which I alluded
to above with the notion of a "set of gear" model.

##Sessions

You will need sessions enabled, to store your data transfer buffers
for maintenance and for flight booking data.

Use file-based sessions, and configure yours to use `/tmp` as the writeable
folder. You may have to create this on your system, and you will
need to ensure that its permissions are appropriate. 

#Usecases

##Homepage 

In assignment 1, your homepage allowed the user to select
one of the defined sets of gear and render it.

The rendering should be based on the data in a set, and not just a
pre-rendered or hard-coded image!

The displayed data should now be provided or calculated from your "database".
The set of data must come from the server (your app), even if
you use some Javascript to make the page more interactive.

The above functionality applies to the "guest" role.

If the viewer of your site is in the "user" role, then
you can allow them to create their own set of gear here (in
addition to viewing the existing sets), **or** provide a
link to a separate customization page, which might make
for better segregation of your functionality.


##Gear Customization

Available only to the "user" or "admin" roles, this refers
to the ability to create or customize a set of gear, using
only accessories which are in the "database".

Some of the projects already have this, having gotten carried away 
in assignment 1. If so, they need to make sure the role is enforced,
and that this functionality is separate from the "catalog" page.

There are several ways you could build this, for instance a two pane
layout with options grouped together in one pane, and the thing
(person, car, living room, etc) being customized in the other pane.

You would have two interactivity choices: 
- make selections, and then submit your selection for validation and rendering
- make selections, validating them as you go and updating the 
rendered image pane automatically

If you are choosing to handle selections through Javascript, then the
"proper" way to validate/choose/whatever a choice would be through an AJAX
call to `checkChoice($category,$selection)`, and not to a hard-coded
`checkLefthandChoice($selection)`! Avoid hard-coded references!!

##Catalog

In assignment 1, the "catalog" page showed all the accessories on file.

Some of the presentations were grouped by category (good), while
others presented a single list of accessories, with categories
unclear or inferred by the user (bad).

Make sure the groupings are clear, and that the attributes of each
accessory are clear too (tooltip or popup is ok).


##Maintenance

If the user role is "Admin", then provide for customizing
the accessories and categories.

This could be done by adding appropriate links or buttons
on the catalog page, similar to what we did in labs,
or you could provide a page dedicated to maintenance.

Category maintenance might be a separate link, where the user can change the category names.

You are welcome to use Javascript widgets to improve the user experience
or validate the data, but that is not expected.

You MUST provide server-side validation for submitted data.


#Webapp Constraints

Same as before...

- There shall be no PHP in your view source files.
- You are welcome to use a third party templating engine, but without PHP in your view.
- Remember the golden rules, especially case sensitivity!

Just a reminder: code like professionals :)

