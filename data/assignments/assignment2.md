#Assignment #2 - Functional Bot Factory Webapp
COMP4711 - BCIT - Winter 2017

##Assignment Overview & Goals

The purpose of the assignments, collectively, is to let you apply the techniques 
from the lessons and tutorials.
As previously decribed, you are building a small but complete webapp, 
to manage a simple robot factory. 
Refer to assignment one for business logic descriptions.

The purpose of this assignment (#2) is to add functionality to the mockup pieces
from assignment #1, using a real (not mock) database and connecting to the
[Panda Research Center](https://umbrella.jlparry.com/) (PRC) for live data.

#Process

##Assignment Teams

You have project teams already, and should stick with them.
If any team membership changes are desired, see me.

Team members do not have to receive the same grade.
Under-contributing members will will receive a lower mark.

##Workflow

Continue to use gitflow workflow, with proper branching and GPG-signed commits.

##Testing & Deployment

The [test & deployment server](/display/lesson/webhooks) is available for those groups
who wish to test their code in a "production" environment.
This is optional, for your benefit, and does not contribute to marks.

If you do use it, your running (or not) webapp will be visible to everyone.
You can see what other teams are doing, and vice-versa.

<div class="alert alert-danger">
Avoid the test deployment server for now, until I confirm
that the database setup has been tested.
</div>

##Assignment Submission

Your assignment will result in a team repository on Github.
Your dropbox submission should be or include a link to your team's repository
(not its cloning URL).

Due date: Sunday Mar 26, 17:30.

##Assignment Marking Guideline

A marking rubric will be attached to the assignment dropboxes, similar to 
those used for labs. 

##Changelog

Do provide a changelog, showing the components that are different for this
assignment compared to the previous one. Group the components by component
type (controllers, models, etc).

#Features

From assignment 1, you have a target theme, layout and planned MVC components.
You should stick with those, unless otherwise suggested by me in the assignment 1 feedback.

The subsections here address your data, and then each of your usecases (pages).

##Your Data

You have provided mock data for assignment 1. 
Put this into appropriate tables in a MySQL database for assignment 2.

It is up to you how you wish to track "history" - that could be one table,
or it could be separate history tables for each kind of activity.

The "live" data to use will be retrieved from the [Umbrella server](https://umbrella.jlparry.com), 
per directions that follow.

The SQL dump in your repository should be a known starting point, suitable for test data.
The mock data from assignment 1 could be good for this.

##User Roles

I suggest a menu dropdown to switch between user roles, as with labs 5-7.

You do not need authentication for this assignment.

##Homepage (dashboard)

Your homepage contains a dashboard of sorts.

The page data should now be provided or calculated from your database.

This page is accessible to any user role (a.k.a. "Guest").

##Parts page

Previous: The **parts** page (for the "Worker" role) should show all the parts currently on hand, ordered
reasonably (piece type?) in a grid with images.
Show the model & line as either a tooltip for the image, or underneath each.

Clicking on a part should show the complete data you have for that part, including
CA, date made or acquired, etc. This would suit a subcontoller and
secondary page for just one piece.

Add a "Build more parts" button or link to the page, which would be handled by:

- request any newly built parts for this factory, from the Panda Resarch
center's `/api/build` endpoint. That service will return an array
of parts certificates, in JSON format
- add each of these to your parts table
- Update the appropriate history table(s)

<div class="alert alert-warning">
Service being tested.
</div>

Add a "Buy parts" button or link to the page, which would be handled by:

- request a box of random parts for you to use, from the Panda Resarch
center's `/api/box` endpoint. That service will return an array
of parts certificates, in JSON format
- PRC will deduct the purchase price from your cash balance
- add each of these to your parts table
- Update the appropriate history table(s)

<div class="alert alert-warning">
Service being tested.
</div>

##Assembly page

Previous: The **assembly** page (for the "Supervisor" role) lets a user select the pieces that 
they would like combined to make a complete bot, the pieces that they
consider unwanted and would like to return, or the assembled bot(s) that they
would like to ship to head office.

Provide a way to select the set of parts needed to construct a complete bot.

Add an "Assemble it" button or link, which would be handled by:

- validate the selected parts, to make sure there is one of each needed for a complete bot
- add a record to your "robots" table, with the chosen parts
- remove the parts from the "parts" table
- update the history table(s)

Optional: For added fun & excitement, you are welcome to add some "AI" to this page,
for instance suggesting a combination of parts that would result in the
highest selling price.

##History page

Previous: The **history** page (for bosses) should show a list of your plant's history
transactions. 

This list should now be paginated. You can use 20/25 records per page,
or provide for that being something the "Boss" can configure.

The history list should provide for flexible ordering, by date/time or by robot model.
I suggest a dropdown for this, although links could work just as well.

The list should be filterable, by robot series or robot model.
You could use a dropdown for these, or provide radio buttons or checkboxes 
to select the output. A dropdown would result in a "cleaner" UI.

##Manage page

This is for the "Boss" role :)

There are several features appropriate for this page, handled by tabs or perhaps
by separate panels:

- Provide a button or link to "Reboot" your plant. It should send a message to the
Panda Research Center's `/rebootme`, and get an `Ok` response or a self-explanatory error message.
On successful "reboot", empty your inventory & history - you are starting from scratch
again, with the appropriate starting balance for a new plant.

- Provide a mini-form for registering with the PRC. You will need your plant name, which
can be saved as a configuration setting inside your app, and your secret token, which
should not be stored anywhere inside your app or repo. Send a message to  PRC's
`/registerme/team/token` endpoint; it will return an appropriate message.
Substitute your team name and token, of course.  
This will establish a session on PRC. If yours closes, you will need to re-register.

- If you use a control table to save key/value pairs for configuring or managing
your app, provide a way to display/edit these. For instance, 
this could include settings that influence any AI
you have for suggesting bots to build, or it could include the base URL
for the PRC, to avoid hard-coding it.

- Finally, here is where you can sell assembled bot to the PRC. Present a list
of the ones you have built, with suitable links to sell them to the PRC one at a time,
namely `/buyme/part1/part2/part3`, where parts 1 through 3 are the tokens
for the three parts that make up your bot. The server will respond with `Ok` or `Nak`
with a self-explanatory error message. If "Ok", you can remove the bot from your database.
The PRC will automatically credit your account balance.

<div class="alert alert-warning">
Services being tested.
</div>

##Debugging

How do you determine if your app's view of the world matches reality?

There are a few PRC server endpoints that you might find helpful:

- `/whoami` will return who the PRC thinks you are

- `/verify/token` will return the data known about a part, identified
by its token

- `/scoop/plant` will return the data known about a plant, identified by
its name; if the plant is not
specified, it default to the one associated with your PRC session

- `/myjob/plant` will return the part a plant is building; if the plant is not
specified, it default to the one associated with your PRC session

- `/goodbye` will destroy your session on the PRC server, and your plant will then need
to "register" again (through the "Manage" page)

<div class="alert alert-warning">
Services being tested.
</div>

The first two of these endpoints will work from anywhere, while the last two
may have to run on the same machine as your server.

You could make testing easier by building these into your "Boss" page,
possibly with a textfield to prompt for a token or plant.

##Webapp Navigation

Your frontend webapp would suit having a primary navbar with now five/six items: 
one for the
homepage and one for each of the usecases, including the new "Manage" page.

Optional: If you want a bit more of a challenge, change the navbar to show only
the pages accessible to the current user role.

##Webapp Constraints

Same as before...

- There shall be no PHP in your view source files.
- You are welcome to use a third party templating engine, but without PHP in your view.
- Remember the golden rules, especially case sensitivity!

##Your Code

Just a reminder: code like professionals :)

##Parting Notes

I will maintain an FAQ on the course hub, as needed.
