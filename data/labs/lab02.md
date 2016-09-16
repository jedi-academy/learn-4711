
#Lab #2 - Collaborative Workflow
COMP4711 - BCIT - Fall 2016

**Edit: I added a new section, explaining the synching
of repos in more detail.**

##Lab Goals

Last week, you setup your development environment.
This week, building on that experience, you will be practicing collaborative workflow.

I have setup a starter repository for you to work from, and this lab will walk you through
setting up a collaborative team and getting underway.

##Lab Teams

This is a pair lab, sharing a single team repository, but with each team member using 
their own github account and computer.

Teams of one are *not* acceptable. This is about collaboration, after all.
If a set has an odd number of students, see me during lab and I will override
the team membership, adding a third member.

If you miss the lab, you will end up being a defacto team of one, completing
the tasks yourself before the submission deadline.
This will let you earn some of the lab marks, but none of those for collaboration.

Team members will each have a role to play:
- One member will be the creator and maintainer of the team repo - he/she will be designated the CAPTAIN
- The second member of the team will be a contributor - designated the FIRST MATE
- If a team has a third member, they will also be a contributor - designated the SECOND MATE

Most of the lab tasks are meant to be done using pair programming, i.e. with 
one person "driving", and the other(s) "navigating". 
Team members should use their own computer when "driving", to ensure that
you do not work with the same local repository.

Next week's lab will be a team one as well, but with *different* team membership
and roles!

##Lab Submission

Your lab will result in a github repository for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 

Due: in theory, this should be completed during the lab period,
which means that the due date should be able to be Friday afternoon,
to accommodate all sets.  
I have set the deadline to this Sunday at 17:30, making allowance for hiccups,
and will adjust future deadlines based on our experiences with this lab.

##Lab Preview

There are two readings linked to in the organizer, that will help orient you
to what we will be doing in lab. They are not exact copies of what we will do, but
similar.

The first, [Gitflow Workflow Techniques](/show/lesson/dev02), 
is a pictorial walkthrough of a similar process. 

The second, [Gitflow Setup Example](/show/lesson/dev02), 
specifically demonstrates the setup of a team and its repository.

##Notes:Synching your repos

This has proved to be problematic.

Consider:

	[Team repo] --- [Your repo] --- [Local repo]

If you make changes to your [local repo], they only get saved to [your repo] after you `commit` 
and then `push` them to it. At that point, [your repo] is "ahead" of the [team repo].
This will be resolved when you submit a `pull request (PR)` that is accepted and merged
into the [team repo].

More problematic is the case that other contributions have been accepted to the
[team repo], where those changes conflict with changes you have made or are working on.
You will not be able to submit a succesful PR for them until **you** resolve the
conflicts, in your work.

If you are working in a feature branch, based on `develop`, and the [team repo]'s
`develop` has been updated, it is "ahead" of yours, and you need to synch repos.

Locally, checkout your `develop` branch, and then merge the changes from
the [team repo]:

	git pull upstream develop

If you do not have `upstream` already defined as an alias for your [team repo], 
**you will
need to do so**, for instance from the git bash shell:

	git remote add upstream [team repo cloning url]

You will then have two remote repository aliases: `origin` and `upstream`.
You can use whatever name you want for you [team repo] alias, so long as you use the 
same name in subsequent pull requests to synchronize your repos.

If updating [your repo] from [team repo] causes conflicts, you need to resolve
them locally, using a merge conflict resolution tool, or that capability in 
your IDE.

Once conflicts have been resolved, you can save your updated `develop` branch
in [your repo] by pushing the changes to it ...

	git add .
	git commit -s -m "Synch with team repo"
	git push

Those changes are in your `develop` branch, but not yet visible in your feature branch.
Make them appear by

	git checkout WhateverYouCalledYourFeatureBranch
	git merge develop

If this was needed so that a PR of yours could potentially be merged, update the
PR for your feature branch by

	git add .
	git commit -s -m "Synch changes merged"
	git push

If you or your CAPTAIN revisit the PR on github.com, it should show as having
been updated, and it hopefully will be mergeable.

#The Lab:

##Team Setup

-    Choose partners
-    Select one of you to be CAPTAIN
-    The CAPTAIN should join a D2L group
-    The MATE(s) should join the same group
-    If the group membership gets messed up, see me to fix it

##Team Repository Setup (CAPTAIN)

-    Create a github organization for your team
-    Fork the lab starter repo into that organization, using a name of your choice
-    Create a new branch "develop"
-    Make "develop" the default branch

##Member Repository Setup (All)

-    Configure your git client to use signing
-    Fork the team repository to your personal github account (including the CAPTAIN)
-    Clone your repository locally, using a name/location of your choice
-    If using an IDE, "git ignore" the IDE's metadata folder, so you don't inflict it on your teammates.
-    Add a virtual domain, "quotes.local", if you want to keep this separate from last week's lab
-    Map the virtual domain you will use to the "public" folder inside your local repo
-    Restart Apache
-    Make sure that your project serves correctly, eg. using http://quotes.local

##Setup Changelog (CAPTAIN)

-    Working locally...
-    Add a new file, "changelog.md", in the project root
-    Edit it to reflect the team membership, using initials or first names only if needed for privacy
-    Add to it any style conventions you wish to use, eg Allman notation
-    Start a change log, at the bottom, that contributors will add to
-    Decide if additions will be newest first, or newest last
-    Add a changelog entry for this task
-    Commit your changes, with a suitable comment
-    Push your changes to your repo, with a suitable comment
-    On your github repo page, create a pull request to the team repo
-    On the team repo page, review the PR, and merge it if it looks good
-    Note: Do not synch your local repo yet!

##Add New quote (FIRST MATE)
    
-    Synchronize your repo with the updated team repo
-    Create a feature branch based off "develop"
-    Add an avatar image for a new quotation, to /public/pix, using the same dimensions as the others
-    Add a new unique quote entry to the mock database in /application/models/Quotes.php; feel to be creative, but not vulgar
-    Commit your changes...
-    Push your changes...
-    Create a pull request...
-    [CAPTAIN] On review, you will determine there is a missing changelog entry. Scold the contributor in a PR comment
-    Update the changelog appropriately
-    Commit this change
-    Push this change
-    Wait for it...
-    [CAPTAIN] if ok, you can merge the PR

##Enhance the Tooltip (CAPTAIN)

-   Don't synchronize yet - we want to introduce a merge conflict!
-    In controllers/Welcome,you see an associative array of authors created, to be 
    passed on to views/homepage. The fields for each author are not all of the 
    ones defined in models/Quotes, although those are returned by `quotes->all()`.
-    Add an additional field, *what*, to the list in Welcome
-    Add that to the "tooltip" in views/homepage ... "{who}" becomes "{what} ({who})"
-    Save & test. The grid of quotes should show the author's quote
    and name in brackets, when moused over
-    Commit these...
-    Push these...
-    Create the PR ... Oh no, it can't be merged!
-	**Edit: if you did not get an error message, it is likely because your push did not include a changelog item!**
-    Checkout your local develop branch
-    Synch it to upstream
-    Checkout your feature branch
-    Merge your develop branch
-    Resolve the merge conflicts
-    Commit the resolved & updated changes
-    Push your feature branch again
-    Now the PR can be successfully created
-    ... and merged, if you agree with the changes
-    ... you did remember the changelog entry, right?

##Add Random Quote Display (SECOND MATE, FIRST MATE if none)

-    Synchronzie your develop branch with upstream
-    Create a feature branch for this task
-    Add a random() method to controllers/Welcome. It will be similar to index(), but only
    needs to choose one of the quote entries, at random. If you build an array of
    author parameters, the same as index(), but only include the one randomly
    selected author, you can then reuse the same view fragment.
-    Save & test. Fix as needed
-    Add a suitable changelog entry
-    Commit these...
-    Push these...
-    Create the PR ... 
-    [CAPTAIN] you know the drill...
    
##Team Synch

-    The team members should synch their develop branches with the team repo

##Lab Conclusion (CAPTAIN)

-    Tidy up any loose ends in the repo
-    Merge the develop branch into the master branch, in the team repo
-    You are ready to submit the repo link

#Lab Endnotes

##Lab Marking Guideline

A marking rubric has been attached to the lab 2 dropboxes, similar to our
first lab. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

I will be looking at the features in your submitted webapp, to see if you
succeeded at enhancing it per spec, in spite of the process; and I will
be looking at the repository, its forks, and commit history, to
determine how well you followed the collaboration process.

##Disclaimer

We will not necessarily be following "best practices" throughout this lab.

Our focus is on "baby steps", that will lead to best practices over the next few labs.

