#Assignment #1 - FAQ
COMP4711 - BCIT - Winter 2018

## Do we need a database?

**No**. In fact, it is expressly not allowed :-/

## Is there a repository that you fork to start the project?  

You *could* fork the [starter4](https://github.com/jedi-academy/CodeIgniter3.1-starter4) that I used for demo in class.
If you do so, PLEASE rename your team repo ... having 20 "starter4" repos isn't helpful
when we look at them.

Alternately, you could download the starter and copy it into your empty project folder.

Forking it has the advantage of being to take advantage of any updates to it, while
copying it had the advantage of not being bound to it.

##How do we synchronize with the starter if we forked it?

Two choices:

1) The captain could make a PR from the academy starter (forked by the team repo) into the develop branch of the team repo.
This would all be done on github.

2) Synch your team repo with the academy one.
 
You already have remote aliases `origin` and `upstream`.
Add one for the academy starter, for instance

    git add remote academy https://github.com/jedi-academy/CodeIgniter3.1-starter4.git

Then, the captain would ...

    git checkout develop
    git merge academy master
    git push upstream develop
    git push origin develop

And then the team members would resynch with the team repo.

##How do we use CSV_Model?

I have updated the readme in the starter4 repo, with a bit of an explanation.

If you have a `class Fruits` that `extends CSV_Model`...
- you never call its `load()` method ... that is done automatically
when the model is loaded
- you never call its `store()` method ... that is done automatically
any time the model is changed through one of its mutator methods
- what you do do is call the `DataMapper` methods that it implements,
to get stuff our of its collection or to modify or add stuff to the
collection
- yes, I am sorry it is so simple
- yes, the same works if your model extends RDB_Model and is backed by an RDB
- Seriously? seriously.

## How why do we set up a webhook? Why do we want to?

The captains are sending me an email with their team name, and I respond with
a password for the test deployment server.

Open the [test deployment server](https://bling.jlparry.com/) in your browser.
You will see a list of the potential teams, with github avatars for those
who have setup their account.

The top navbar has three links: 
- home (clicking on the site name), 
- help (the question mark icon), which may contain useful info at some point
- login (the "enter" icon), which is where you login using your team name
and the password I provided in my email response to the captain

Once logged in, your team name is shown to the left of the help icon in the
navbar. Clicking it brings you to your configuration settings.

Provide your "organization" and "repository" names. Leave the "branch to deploy" at "develop"
and don't worry about an "external website".

Note the [endpoint link](https://deployer.jlparry.com/please) at the top of this settings form.
You need to configure a webhook in your team repo for this.

- Open your team repo on github
- Choose the "Settings" tab in the repo navbar
- Choose the "Webhooks" link in the left sidebar
- Click the "Add webhook" button
- in the webhook settings, use the above endpoint link as the "Payload URL" for this webhook,
choose "application/json" as the content type, select individual events "push" and "pull request"
(for merges)
- save or update your settings

Open your webhook settings again, and scroll to the bottom - you will see "recent deliveries", most recent at the top.
There should be one, the "ping" sent when you updated your settings.
It will have a green checkmark to the left if your payload URL is valid.

Click on the "response" tab to see the result from the test server.
It should echo your org/repo name and then "Ok".
If it doesn't, the test server doesn't recognize you.

Fix things and you are good to go.

###Why do you want to do this?

Every time you push to your team repo, or merge a pull request, a notification
will be sent to the test server, which will then pull the current version
of your repo and deploy it as the URL xxx.jlparry.com, where "xxx" is your team name.

Bam!

Push or merge, and seconds later your site is deployed for testing :D
You may want to delegate someone from the team (or the captain, since they have so
little to do) to check all the possible pages and links on your site, to make sure
you don't have any case sensitivity or other unexpected issues.

Do you have to use this? Absolutely not!

Using it runs the risk of exposing what your site looks like to the rest of the world,
most specifically your classmates! They can't find out your repo from it,
but it wouldn't be hard to track it down if the naming is obvious and if it forks the academy starter.

This is just another tool you can use to test correct behavior of your app.

Note: if we run your site and get any 404s (eg wrong filename case), each of them could
cost you 20% of the assignment mark. Harsh, but these are preventable show-stoppers.

## Is there an easier way to visualize simple models?

Use [relational notation](http://databasemanagement.wikia.com/wiki/Relational_Notation).
In the examples below, I have added asterisks to "key fields", which would normally
be underlined following the convention.

For instance, the menu items described in the starter4 readme could be expressed as

    MENUITEMS(id*,name,category,price)

And a complete 3 model/table?

    CATEGORIES(catid*,catname)
    MENUITEMS(id*,name,category,price)
    ORDER(orderid*,item*,menucode)

And what would the data for that look like?

categories.csv:

    catid,catname
    M,entrees
    S,sides
    D,drinks

menuitems.csv:

    id,name,category,price
    BM,Big Mac,entree,5.25
    MF,Medium fried,side,2.00
    LF,Large fries,side,3.00

orders.csv:

    orderid,item,menucode
    1,1,BM
    1,2,MF
    2,1,LF

The above shows order #1 for a Big Mac & medium fries, and order #2 for a large fries.

What if we want order properties - can we use four collections?

Certainly, perhaps something like

    CATEGORIES(catid*,catname)
    MENUITEMS(id*,name,category,price)
    ORDER(id*,name)
    ORDERITEMS(orderid*,item*,menucode)

And the order data for something like this could be...

orders.csv:

    id,name
    1,Jim
    2,George

orderitems.csv:

    orderid,item,menucode
    1,1,BM
    1,2,MF
    2,1,LF

This would tell us that Jim ordered a Big Mac & fries, and that George ordered a large fries.

## Is it fine for me to be accepting PRs of incomplete features?

_The intent is that other contributors can see what is in progress, eg. how a controller is suppose to work with their view._

As long as in-progress changes do not "break" a running app, that is fine. 
Each set of changes should be a separate PR, however. 
It is not like you are building the ultimate PR, and can accept it in stages.

Real world (a): incomplete PRs would not be accepted. 
Instead, anyone interested in their impact would follow the command line instructions 
below the "merge" button, and clone the PR locally. 
They would then comment on the PR, or they could even makes changes locally, 
and "push" them to the PR - which would end up in the form of a PR itself, 
to the branch the originator is working on :-/

Real world (b): if something is going to take more than one PR, 
then create a feature branch for it in the team repo, 
and have members contribute PRs to that feature branch. 
Only when the team level feature branch is complete would you merge the 
feature branch into the main develop branch, all at the team level,
and you would then delete the feature branch.

## Is it mandatory to create "issues" for each problem in the team repo? 

_We've decided what we need to do; therefore, didn't see much of a need to create the issues on github._

Issues are not mandatory. It is a tool - it's up to the team whether to use it.

Real world (a): Bug reports would benefit from being reported as "issues".
If you are strict about that, then you can use "issues" as a
quality control  analytic ... frequency of reporting, time to resolve, etc.

Real world (b): if there are a bunch of work packages that have not been
assigned, then issues are a great way to let the team know what needs doing,
if they finish their current tasks early.

## Should I reject PRs from contributors who do not update the changelog?

_I've rejected PRs from contributor's because they keep forgetting to document 
the changes to the changelog (if I accept the PRs without documented changelogs 
I believe I lose marks as the captain?)_

The answer depends on the strategy you have chosen...

1) If you are using the changelog as a chronological record of work done,
then yes it makes sense to have changelog updates as part of a PR.
Hopefully, that would prevent trivial PRs (to boost ones commit count and apparent contribution).

2) If you are using the changelog to highlight, by area, what is different from
the previous "release", then it only needs updating if something is added
to the project, or if something is modified for the first time.

In both above cases, common sense should prevail. Fixing a typo in
a comment hardly warrants a changelog entry, but renaming a controller
definitely would.

Will it cost you marks as captain if you don't? We are looking for good
practices and consistency. If the changelog on submission looks good,
we are not likely to drill into its history to see if fractions of
a mark should be deducted. If the changelog is horrible, and all because
of one teeny commit at the end, out of hundreds, we will likely judge its
quality by its final state. Ouch! The good news - marks are shared by
all team members (unless there is uneven contribution), so you get to
share the "love" with your teammates :-/

## How is contribution measured?

The normal ways of measuring contribution:

1) looking at the "contributors" page, where verified or recognized-by-github
contributors are shown

2) checking the commit history, looking for excessive or absent members; this
is a good place to make sure commits are signed, too

3) diving deeper into PRs or commits or members who seem to have an excess of
small commits. Eg. 1: 200 lines added, 199 lines removed = net of 1 and not 399 units of work!
Eg. 2: we will call BS on a 10 line change that is submitted as 10 commits, each one for
a single line of code

4) we pay special attention to members whose sole or major contribution consists
of reformatting PRs; it is not "real work" if you hit a three-finger combination
(ctrl-alt-f) then commit, and expect your "contribution" of hundreds or thousands of lines
changed to be taken seriously.

## Are we allow to use pure php functions for example, fgetcsv() to read csv file?

You could.  
You would then not need to use `CSV_Model`, which reads the CSV automatically when instantiated.  
You might then need to extend `CI_Model` or `Memory_Model`, depending on your strategy.  
You would only use something like `fgetcsv` inside a model.

Bottom line: CI does not preclude the use of PHP functions, but **I** insist that
these only be used where appropriate according to MVC.
