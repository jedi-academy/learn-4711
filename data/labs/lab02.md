#Lab #2 - Collaborative Workflow
COMP4711 - BCIT - Winter 2018

##Lab Goals

Last week, you setup your development environment.
This week, building on that experience, you will be practicing collaborative workflow.

#Lab Starter

I have setup a **[starter repository](https://github.com/jedi-academy/starter-quotes)**
 for you to work from. This lab will walk you through
setting up a collaborative team and making a few changes to it.

The starter is a simple (& silly) one page app, showing a grid with mugshots
of some of the cast of <a href="http://www.imdb.com/title/tt0094012">Spaceballs</a>.
It provides a great excuse
to explain a little bit about the pieces in a CodeIgniter app and to enhance
it in a contrived but controlled fashion :)

<img src="/pix/labs/2/home.png"/>

##What's in the Starter Project?

The project started out as a vanilla CodeIgniter app, and has only a few pieces
tailored to its purpose.

You will notice three folders in the project:

-   `application` contains the webapp logic (models, views, controllers)
-   `public`  contains the client-accessible pieces (Javascript, CSS, images)
-   `system`  contains the CodeIgniter framework itself, which we would not change

The webapp itself consists of a few files:

- `public/index.php` - the front controller; it bootstraps the CodeIgniter framework,
which then routes and handles the incoming request
- `application/config/autoload.php` - tells CodeIgniter which components we
want pre-loaded, namely the `parser` library (for presentation), the `url`
helper (with some convenient functions), and our `Quotes` model (so that we don't have to explicitly 
load it in any of our other code)
- `application/core/MY_Controller.php` - our base controller, i.e. intended superclass
for most of our controllers
- `application/controllers/Welcome.php` - our default controller, effectively the
landing page for the app; all it does is extract some data from our model and pass it
on to the appropriate view(s); note no HTML or SQL in the controller
- `application/models/Quotes.php` - our quotes model, namely a container for
a number of "records", one per cast member; note no HTML or usecase handling in the model
- `application/views/template.php` - an HTML template for the pages in the app,
i.e. a shared layout, missing only the "content" for each page; note no PHP or SQL
in the view
- `application/views/homepage.php` - the content to be shown as the "meat" of 
the webapp homepage.

The code is commented, and should be straightforward to follow.

Go ahead, take a look - we'll wait.

##How do I "Run" the Starter Project?

Once you have your own copy of the project locally (later in the lab), and you are
ready to "run" it, you can do pretty much what we did last week with
your virtual domain:

- edit your Apache's `conf/extras/httpd-vhost.conf` so that the `comp4711.local`
virtual domain specifies the `public` folder of your project as its document
root, *or*
- add a new virtual domain to your `etc/hosts` file, and setup a new virtual
domain mapping for it, in `conf/extras/httpd-vhost.conf`, with the document
root matching the project's public folder

Once Apache is started/restarted, visit `comp4711.local` or the new virtual
domain, in your browser, and you should see the homepage shown above :)

#Lab Process

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

This is **not** meant to be a lab with steps that can be completed in parallel!

Next week's lab will be a team one as well, but with *different* team membership
and roles!

##Lab Submission

Your lab will result in a github repository for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 
If it is properly setup, I can find the team member repositories through it.

Due: I have set the deadline to this Sunday at 17:30, making allowance for hiccups,
although many of you will indeed complete it during the lab period.

##Lab Preview/Prep

There are three readings linked to in the organizer's "Reference" section, 
that you might find helpful. They are not exact copies of what we will do, but
similar.

The first, **[Gitflow Workflow Techniques](/show/lesson/dev02)**, 
is a pictorial walkthrough of a similar process. 

The second, **[Gitflow Setup Example](/show/lesson/dev02)**, 
specifically demonstrates the setup of a team and its repository.

The third, **[Gitting Good](/display/lesson/dev04)**, will help you with Git naming.

These are not part of the lab - they are provided for those who might be confused
about the collaborative process we are using, and who would appreciate
some more context.

###Lab Prep Notes

If you do the suggested prep readings, they are meant to be "read" and closed. They are intended
to give you a better feel for the lab, and are not meant to be
followed as part of the lab. Those steps follow below!

#Notes: Synching your repos 

This has proved to be problematic in previous terms, hence a special
discussion in this lab!

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

        git checkout develop
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

##1. Team Setup

-    Choose partners
-    Select one of you to be CAPTAIN
-    The CAPTAIN should join a D2L group
-    The MATE(s) should join the same group
-    If the group membership gets messed up, see us in lab to fix it

##2. Team Repository Setup (CAPTAIN)

-    Create a github organization for your team, with an organization name of your choice
-    Fork the lab starter repo into that organization, using a repository name of your choice
-    Create a new branch "develop", in your team repo 
-    Make "develop" the default branch

##3. Member Repository Setup (All)

-    Fork the team repository to your personal github account (including the CAPTAIN)
-   Make sure you have configured git locally, through your IDE or...

        git config --global user.name <name>
        git config --global user.email "your_email@example.com"

-    Clone your repository locally, using a name/location of your choice.
This could be done through your IDE or...

        git clone [your team repo's cloning URL] YOUR_PROJECT_FOLDER

-    Configure your git client to use signing
-    If supported by your IDE, "git ignore" the IDE's metadata folder, so you don't inflict it on your teammates.
-    Add a virtual domain, "quotes.local", if you want to keep this separate from last week's lab.
There is nothing wrong with reusing "comp4711.local", properly mapped, or even
with each team member choosing to handle this differently.
-    Map the virtual domain you will use to the "public" folder inside your local repo
-    Restart Apache
-    Make sure that your project serves correctly, eg. using http://quotes.local

_Reality check: Your app should display the original six cast pictures, without errors._

##4. Setup Changelog (CAPTAIN)

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
- Remember to use markdown formatting for a ".md" file. If unsure if you have done
it properly, look at your changelog in your repo, through a browser.

_Reality check: There should be NO visible difference in the app, when viewed
in your browser. It should display the original six cast pictures, without errors._

##5. Add New quote (FIRST MATE)
    
-    Synchronize your repo with the updated team repo
-    Create a feature branch based off "develop"
-    Add an avatar image for a new quotation, to /public/pix, using the same dimensions as the others
-    Add a new unique quote entry to the mock database in `/application/models/Quotes.php`; feel free to be creative, but not vulgar
-    Commit your changes...
-    Push your changes...
-    Create a pull request...
-    [CAPTAIN] On review, you will determine there is a missing changelog entry. Scold the contributor in a PR comment
-    Update the changelog appropriately
-    Commit this change
-    Push this change
-    Wait for it...
-    [CAPTAIN] if ok, you can merge the PR

_Reality check: Your webapp should now show seven cast member pictures, three per row, with no errors._

##6. Add a Tooltip (SECOND MATE if you have one, else CAPTAIN)

-    Synchronize your repo with the updated team repo
-    Create a feature branch based off "develop"
-    In views/homepage, you can see the `img` element that shows a cast member's
picture:

            <div class="span4"><img src="/pix/{who}.jpg"/></div>
- Create a "tooltip" for that image, using the "title" attribute, for
instance

            <div class="span4"><img src="/pix/{who}.jpg" title="{who} plays {role}"/></div>

Notice the substitution fields, that correspond to fields in a mock database
record.
-    Save & test. The grid of quotes should show the author's name and role, when moused over
-    Commit your changes...
-    Push your changes...
-    Create a pull request...
-    [CAPTAIN] Merge the PR, if it looks good
-    ... you did remember the changelog entry, right?

_Reality check: Your webapp should *look* the same as it did, but you should
now see a tooltip when you mouse over a cast member picture._

##7. Add Quote Display (next team member in rotation)

This one gets a bit more involved, because we are going to add
another entry point to the Welcome controller. To start, we
will just do that, and formatting the presentation will wait
until the next step.

-    Synchronzie your develop branch with upstream
-    Create another feature branch for this task
-   Modify `views/homepage/php` so that the image element
is contained inside an anchor element, with the target set
to the "show" method of the "Welcome" controller, and passing
the actor's record key as an additional parameter. This will result in:

        <div class="row">
            {authors}
                <div class="span4">
                        <a href="/welcome/show/{key}">
                                <img src="/pix/{who}.jpg" title="{who} plays {role}"/>
                        </a>
                </div>
            {/authors}
        </div>
-   Once this is done, mousing over an actor's picture will see the mouse
icon change to a link click icon. Clicking it will result in a 404, because
we haven't added the handling for it.
-    Add a show() method to controllers/Welcome. It will be similar to index(), but only
    needs to the one actor quote. Instead of using Quotes::all() we can use
Quotes::get(...) to retrieve the right record.

            /**
             * Show just one actor
             */
            public function show($key)
            {
                    // this is the view we want shown
                    $this->data['pagebody'] = 'homepage';

                    // build the list of authors, to pass on to our view
                    $source = $this->quotes->get($key);

                    // pass on the data to present, as the "authors" view parameter
                    $this->data['authors'] = $source;

                    $this->render();
            }

-    Save & test. Ohoh - it broke. We're not done yet, because the `homepage` view expects
an array of author records, and we have just the one. We need to add a new view for
an actor, and we need to fix the view parameters accordingly.
-   Our new view can start out as a copy of `homepage`, but without the {authors}
substitution parameter, leaving only the ones for an author record.
Why don't we call that `actor` ... make `views/actor.php`...

        <div class="row">
                <div class="span4">
                        <a href="/welcome/show/{key}">
                                <img src="/pix/{who}.jpg" title="{who} plays {role}"/>
                        </a>
                </div>
        </div>
-   And we need to modify the controller's show() method to just pass the
actor record fields as view parameters. We also need to cast the record
as an array, since we get an object back. This can be handled by the following change:

		// pass on the data to present, adding the author record's fields
		$this->data = array_merge($this->data, (array) $source);

- Don't forget to change the view file we want to use now.

        		$this->data['pagebody'] = 'actor';
- You should now see a page with just the one actor when you click on their picture
on the homepage. The result isn't perfect, as the picture still has a tooltip, and
links to the page being displayed, but we can fix that in the next step.
-    Add a suitable changelog entry
-    Commit these...
-    Push these...
-    Create the PR ... 
-    [CAPTAIN] you know the drill...
    
##8. Format the Quote Display (next team member in rotation)

-    Synchronzie your develop branch with upstream
-    Create another feature branch for this task
-    We have all of the actor's record fields available - it is up to use how to format them.
You can have a bit of fun with this, showing the actor, their role, their mugshots, and of
course the quote field. 
Or you could wimp out and replace `viewa/actor.php` with something like...

-    Either way, fix, save & test. Repeat as needed
-    Add a suitable changelog entry
-    Commit these...
-    Push these...
-    Create the PR ... 
-    [CAPTAIN] you know the drill...
    
##9. Team Synch

-    The team members should synch their develop branches with the team repo

##10. Lab Conclusion (CAPTAIN)

-    Tidy up any loose ends in the repo
-    Merge the develop branch into the master branch, in the team repo
-    You are ready to submit the repo link

#Lab Endnotes

##Lab Marking Guideline

A marking rubric has been attached to the lab 2 dropboxes, similar to our
first lab. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

We will be looking at the features in your submitted webapp, to see if you
succeeded at enhancing it per spec, in spite of the process; and we will
be looking at the repository, its forks, and commit history, to
determine how well you followed the collaboration process.

##Disclaimer

We will not necessarily be following "best practices" throughout this lab.

Our focus is on "baby steps", that will lead to best practices over the next few labs.

