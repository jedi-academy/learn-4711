
#Lab #4 - Working With Controllers & Routing
COMP4711 - BCIT - Fall 2017

##Lab Goals

The purpose of this lab is to help you explore and practice some of the controller 
strategies and routing techniques for CodeIgniter. 
The lab will result in fixing some unimplemented links in a starter webapp, using 
the routing techniques discussed in class.

We will continue to use gitflow workflow, with the new twists of 
GPG signing and simple issue tracking.

##Starting Repository

I have setup a [starter repository](https://github.com/jedi-academy/starter-route66) 
for you to work from. Once your team and member repos are setup,
the controller tasks can be worked on independently and concurrently
(of course, each in a separate feature branch).

This starter is essentially what your lab 2 would have ended up like, with three
differences:

- The view template has a menu bar, with a number of entries that do nothing
(for now). The menu is configured in `config/config.php`,
and the menubar is built in `Application::render()` in `core/MY_Controller.php`,
using a new view fragment, `views/_menubar.php`.
- The `show($key)` method that was originally in `controllers/Welcome.php`
has been moved to `Application`, making that method inherently available
to any controller extending the core controller.
- The `views/actor.php` view fragment now shows the URI that triggered
the actor's page; the view parameter is constructed inside `Application::render()`.

##Lab Teams

This week, we want teams of three (two in a pinch, if appropriate for the
number if students in lab). Each team will share a single team repository, 
but with each team member using 
their own fork of that. 

Teams of one are *not* acceptable. This is partly about collaboration, after all.

If you miss the lab, you will end up being a defacto team of one, completing
the tasks yourself before the submission deadline.
This will let you earn some of the lab marks, but none of those for collaboration.

Team members will each have a role to play. The controller tasks need to be split 
evenly amongst the contributing members.
- One member will be the creator and maintainer of the team repo - 
he/she will be designated the CAPTAIN; if a team of three, they will not
be controller contributors
- The other members of the team will be contributors - designated as MATES.
If a team has only two members, both will be controller contributors, i.e.
the CAPTAIN will also have to sometimes act the role of a MATE

The controller lab tasks are meant to be done individually.

##Lab Submission

Your lab will result in a github repository for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository
(not its cloning URL). 

Due: in theory, this should be completed during the lab period,
but some teams will need a bit more time.  
I have set the deadline to this Sunday at 17:30.

##Lab Marking Guideline

A marking rubric has been attached to the lab 4 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

I will be looking at the features in your submitted webapp, to see if you
succeeded at fixing it per spec, in spite of the process; and I will
be looking at the repository, its forks, commit history, and issue
history; to determine how well you followed the collaboration process.

#The Lab:

##Team Setup

-    Choose partners
-    Select one of you to be CAPTAIN - the one who hasn't performed this role yet,
or negotiated if everyone has been CAPTAIN before
-    The CAPTAIN should join an empty D2L group for lab 4
-    The MATE(s) should join the same group
-    If the group membership gets messed up, see me to fix it

##Team Repository Setup (CAPTAIN)

-    Create a github organization for your team
-    Fork the lab starter repo into that organization, using a name of your choice,
which is **not** the same as the starter
-	Add your team mates as collaborators, but **not** with admin rights for the repository
-	 It is up to you if you wish to use a changelog

##Preparation (All)

-	Without making any changes in the team repository, and before the team mates
fork it, read what Github has to say about 
[Managing your work with issues](https://help.github.com/articles/managing-your-work-with-issues/)

##Setup Project Tasks (CAPTAIN)

-	Make sure that "issues" are enabled for your team repository, on the repository settings page
-	Add issues to your team repository, one for each controller task in the lab
-	Do not assign these to anyone

##Member Repository Setup (All)

-    Fork the team repository to your personal github account (including the CAPTAIN)
-    Clone your repository locally, using a name/location of your choice
-    If using an IDE (other than NetBeans), "git ignore" the IDE's metadata folder, so you don't inflict it on your teammates.
-    If you want to keep this separate from last week's, add a new local domain, eg "routes.local"
-    Map the virtual domain you will use to the "public" subfolder inside your local project folder for this lab
-    Restart Apache
-    Make sure that your project serves correctly, eg. using "routes.local" or the local domain that you setup.

##CAPTAIN Responsibilities

- You are responsible for the integrity of your team repo.
- Commits in any PR **must** be GPG-signed. Reject the PR if not (close with a comment)
- PRs must conform to your team style conventions (whatever they are), at a minimum
reasonable source code formatting. 
[Check out each PR](https://help.github.com/articles/checking-out-pull-requests-locally/) before merging, using the
command line directions when you look at a PR on github. Comment on any that
don't conform, and insist the team member fix things before considering the PR again.
- Make sure that the PR doesn't break anything, and in fact works as intended.
Comment on deficiencies in the PR, and don't be afraid to close the PR if
it is really broken.

##Contributor responsibilities

- You have to resolve merge conflicts (extremely likely to occur).
Fix what needs fixing, at synch time, and push again to your
feature branch - the PR will be automatically updated.


##Undertake a task (MATES or controller contributors)

-	In the team repository, select the "issues" page.
-	Choose the next unassigned issue, and assign it to yourself.
If you don't have rights to do this, ask the CAPTAIN to do so,
or make sure your fellow contributors know that you are working on it.
-	Complete that task locally, using a new properly named feature branch.
-	When convinced you have it right, **synchronize your local develop branch** with
the team repo 
-   Commit the changes in your feature branch.
Add the wordage "closes #123" in your commit message if this one
commit totally addresses the issue (123 would be the appropriate issue #).
-	Push your feature branch to your repo
-	Create a pull request to the team repo for this, making sure you include 
"closes #123" in the PR title or description (where "123" is the issues # you completed)
if the PR includes several commits that were needed to resolve the issue.
The issue will be automatically closed if/when the PR is merged
-   If your PR has problems, fix them in your local branch for it, and re-commit
and re-push to your repo. The PR will be automatically updated.
- Whenever a PR is accepted/merged, that will probably necessitate resynching
for any open branches. You may have to synch your develop branch, and then
"git pull develop" to merge those same changes into your feature branch.
-   Note: you can work on multiple lab tasks at the same time, even if earlier
work hasn't been merged. This is one of the intended aspects of branching
workflow.
-	Repeat until you have completed the requisite number of tasks or until there
are no remaining issues open
    
##Lab Conclusion (CAPTAIN)

-    Make sure there are no open issues
-	Tidy up any loose ends in the repo
-    Merge the develop branch into the master branch, in the team repo
-    You are ready to submit the repo link to your dropbox for the lab

##Lab conclusion (MATES)

- Make sure that your master and develop branches are synched with the team repo
- Cleanup your repo, eliminating all the merged branches

#Controller Tasks (finally)

Finally, the "feature" meat of the lab. 
You will be making 
- five controllers intended to be invoked by CodeIgniter's segment routing conventions
- three controllers intended to be invoked through routing rules
- a utility controller
- a service controller (for "AJAX" requests)
- a clever remapping trick

For each of these, you will need to tailor the appropriate menu `link` value
in `config/config.php`, and then create an appropriately named controller
or new method inside an existing controller, to meet the requirements.

Be careful that you remember correct case (first letter of class names and source files capitalized),
and that you start any target link values with a forward slash.

##Alpha - regular controller

- This will be a controller found by convention
- Make the target link `/able`
- This would then be handled by the `index` method of `controllers/Able`.
- The body of that method should invoke the inherited show method, with the key "1"

        public function index() {
            $this->show(1);
            }

##Bravo - default controller in a subfolder

- This will be a controller found by convention
- Make the target link `/bravo`
- We want this handled by a controller inside `controllers/bravo`. 
In this case, we want that to be the default controller, and its index method,
i.e. `controllers/bravo/Welcome::index()`
- The body of that method should invoke the inherited show method, with the key "2"

##Charlie - subcontroller 

- This will be a controller found by convention
- Make the target link `/charlie/brown`
- We want this handled by a subcontroller, i.e. `controllers/Charlie::brown()`
- The body of that method should invoke the inherited show method, with the key "3"

##Delta - controller in a subfolder 

- This will be a controller found by convention
- Make the target link `/delta/force`
- We want this handled by a conventional controller, i.e. `controllers/delta/Force::index()`
- The body of that method should invoke the inherited show method, with the key "4"

##Echo - subcontroller in a subfolder 

- This will be a controller found by convention
- Make the target link `/echo/must/wehave`
- We want this handled by a conventional controller, i.e. `controllers/echo/Must::wehave()`
- The body of that method should invoke the inherited show method, with the key "5"

##Foxtrot - remapped

- This will be a routing managed with a rule
- Make the target link `/foxtrot`
- Add a routing rule to `config/routes.php`, which remaps this request to the `Tango` controller

        $route['foxtrot'] = 'tango';

-   This will be handled by `controllers/Tango::index()`
- The body of that method should invoke the inherited show method, with the key "5"

##Golf - remapped with regular expression

- This will be a routing managed with a rule
- Make the target link `/i/need/a/hobby`
- Add a routing rule to `config/routes.php`, which remaps any request with the first
segment "i" to the `Golf` controller

        $route['i/(:any)'] = 'golf';

-   This will be handled by `controllers/Golf::index()`
- The body of that method should invoke the inherited show method, with the key "6"

##Hotel - remapped with callback routing

- This will be a routing managed with a rule
- Make the target link `/bananas/rule`
- Add a routing rule to `config/routes.php`, which remaps any request with the 
word "banana" in it, to the `Golf` controller, but using our own code

        $route['bananas/rule] = function($fruit,$verb) {
            return 'golf';
        };

- Yes, this is lame, but my mind is not coming up with a good example
that can be easily implemented
-   This will be handled by `controllers/Golf::index()`, already existing

##India - a utility controller

- This will be a controller found by convention, but with an unexpected result
- Make the target link `/india`
-   We want to return an image, instead of an HTML page
-   The controller should extend CI_Controller, and not Application
-   The handling should explicitly set the returned content type,
and then copy the contents of an image file

        // what will this reference?
        $source = '../../public/data/logo.png'; 
        // note that we could have referenced an image anywhere on our system
            
        // set the mime type for that image (jpeg, png, etc)
        header("Content-type: image/png"); 
        header('Content-Disposition: inline');
        readfile($source); // dish it

##Juliet - a service controller

- This will be a controller found by convention, but with an unexpected result
- Make the target link `/juliet`
-   We want to return JSON data, instead of an HTML page
-   The controller should extend CI_Controller, and not Application
-   The handling should retrieve data from a model, and then encode it appropriately

        $record = $this->quotes->get(1);
        header("Content-type: application/json");
        echo json_encode($record);

##Kilo - Remapping to a controller

- This will be routing rule, using an existing controller
- Make the target link `/show/2`
-   There is no `Show` controller, but we have a `show` method
in our base controller. We want to remap these requests to
`Welcome::show()`, so they work as intended

        $route['show/(:any)'] = 'welcome/show/$1';


