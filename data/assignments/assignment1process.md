#Assignment #1 - Process
COMP4711 - BCIT - Winter 2018

#DRAFT DRAFT DRAFT 

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

##Repo setup

The CAPTAIN should setup the team repo, with an appropriate starter,
before team members fork it. Think of labs 3 & 4!

##Testing & Deployment

The team captain should send me an email, identifying their group number.
I will reply with a password for the deployment test server I have setup
for the course.

##Webhook
CAPTAIN: setup a webhook in your team repo settings on github,
linking to the [deployment handler](https://deployer.jlparry.com/please).
Each time you push/merge to the develop branch in your team repo, the
repo will be automatically pulled and deployed on my server. 
It will then be accessible for testing through the subdomain with
your team name, for instance https://chicken.jlparry.com.

Test the webhook, and your subdomain.

##Workflow

You are to use gitflow workflow, with proper forking and branching, and
with GPG-signed commits by team members. 

Contributions to the team repository should be by pull request only.

(Not required for this assignment, peer review and issue tracking may
come into play for assignment 2.)

All work should be done in your "develop" branch.
Before the deadline, the CAPTAIN should merge "develop" into "master",
and tag the master as a release, i.e. version 1.0.

If you create design or other documentation that would contribute to
the project, save those in a "docs" folder in your team repository.  
If you have text data that you wish to keep within your project,
put it in a "data" folder, which my script will ensure is writable
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

Deadline: the end of week 5, i.e. 23:30 Sunday Feb 11th.

##Assignment Marking Guideline

A marking rubric will be attached to the assignment dropbox, similar to 
those used for labs. The assignments will be weighted equally in the marks worksheet,
even if they have different raw scores because of their rubric.

