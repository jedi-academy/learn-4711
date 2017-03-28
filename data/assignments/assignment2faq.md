#Assignment #2 - FAQ
COMP4711 - BCIT - Winter 2017

##History list clarification

Question... the writeup says 
>The history list should provide for flexible ordering, by date/time or by robot model. I suggest a dropdown for this, although links could work just as well.
>The list should be filterable, by robot series or robot model. You could use a dropdown for these, or provide radio buttons or checkboxes to select the output. A dropdown would result in a "cleaner" UI.
>
>Is robot model and robot line supposed to be stored in the history table? Or something else similar?
>We currently have your history model you gave us which is : ...

The history list in my umbrella server is only to support the "recent transactions" panel on my dashboard, which is cost/income oriented.  
The history filterable by robot series or model is parts-oriented.

I think you would be better served by using your parts table as a starter, or a combination.  
If you have modified your parts table to include an "available" flag, then it should be usable for this. If not, I suggest a separate table for all parts, past & present.

## Class naming

A number of teams have asked for guidance regarding class names, and I have seen
some strange practices, so here goes ...

- A controller for "work" does not have to be named `Work_controller`. It is legal,
but you would then provide a routing along the lines of `work => work_controller`.
Better would be to name it `Work`, but you need to make sure (with CI3) that
there are no class name collisions between controllers, models & libraries.
- You do not need a routing for every controller, which is a normal practice
with some other frameworks.
- The CI convention is UCfirst, meaning that the first letter of a class name
(and its source file) is capitalized, and the rest are lowercase. If a class name
is meant to contain several words, they would be separated by underscores. An
example would be `Work_my_butt_off`, instead of `WorkMyButtOff` (Java style).
- In spite of the above, it **is** possible to get away with mixed case controller
names, such as `WorkMyButtOff`, if you provide a routing for it, eg
`workmybuttoff => WorkMyButtOff/index`. This doesn't conform to the CI style
guide, but it does work.
- Usecase realization suggests that controller classes be named after their
usecase, i.e. using a verb, and that model classes be named after their entity,
eg `Parts` for a collection of `Part` objects.  
I am guilty of breaking this rule, with the URL naming I specified in the assignment
writeup, and will try to fix this.
- REST principles suggest that a model be named after an entity collection, eg
`Parts`, and that the service endpoint (controller) related to CRUD for such entities be
named after the singular of the entity, eg `Part`, with methods implied by
the HTTP verb used in an HTTP message to the service.
- Yes, there are conflicts in the above, and no way to have your naming keep
"everyone" happy, but that's life!

##Bot factory transactions

The "transactions" that would be part of your app's history, because they have
financial implications:

- buying a box of parts (10), from PRC ... cost to you
- returning/recycling parts (1 or more), surrendering them to PRC ... income for you
- building your factory's pieces, from PRC ... no cost, but increases your income potential
- selling/shipping an assembled bot, to PRC ... income for you
- buying/selling a part from/to another factory ... coming in assignment 3

Showing a bot assembly as a transaction is ok too.

It's up to you if you want to show details, eg specific parts, but they would be identified
by the parts' CA codes, not your internal "key". If showing them in a transaction,
showing the part type is ok too.

##Parts treatment

You have an inventory of parts, which you can use to assemble robots, or which you can
return/recycle to PRC for some small consideration.

When a part is "consumed" as part of building a robot, it is no longer available
for building other bots or for recycling. This can be handled by removing
it from your inventory table, or by leaving it in the inventory table
but flagging it is unavailable. If you choose the latter strategy, you will
need to reflect the status in your parts list, and not include any such
parts in the candidate list on your assembly page.

##Bot assembly

A common mistake I have noticed is identifying the parts that make up a bot
by their part type, eg this bot has an A1, a B3, and a Z2. This is not helpful, because
you need to provide the CA codes for any pieces used in a bot, when you
sell/ship that bot to PRC.

The CA code is a unique identifier for a part, recognized and managed by PRC.

##Token confusion

You have a login for the [PRC server](http://umbrella.jlparry.com/).
This is effectively a username (your team name) and password (your super
secret access token).

The API for your app to request service from the PRC also mentions a token,
currently passed as a query parameter (`build?token=xxx`). This is an API
key, and I will modify the API guide to reflect this.

Sending an API key as a query parameter is not the "correct" way to do this,
but it is expedient for assignment 2. In assignment 3, we will use a better
technique, so that the API key is not as exposed.

##Results from PRC?

What exactly do you get back from a PRC request, that you can work with?

The easiest way to see this is to "try it".

I have setup a "server-test" app, in the bot factory tables on PRC, for me
to test PRC functionality. It is still a work in progress, but has a [browser
interface](http://server-test.jlparry.com/) that you can use to see what 
comes back from each PRC endpoint.

You can also check out its [repo ](https://github.com/jim-parry/server-test),
to see how the code works.

NOTE: I cannot update my repo at the moment (getting an error when I try)
and my app deployment is flaky as a result.
I am aware of this, and working on it.

<div class="alert alert-info">
Endpoints simplified :)
See [API guide](http://umbrella.jlparry.com/help)!!
</div>

## Case sensitivity?

Yes, you need to worry about case sensitivity!

## Better way to synch?

I am seeing lots of commit histories with more merges than commits, and the
merges are from develop, to develop, into team member repos, etc.

This should be your workflow:

- A team member creates feature branches locally, off develop, eg. `feature/better-menu`.  
- When ready, they synch ... checkout *their* develop branch, then `git pull upstream develop`
and `git push origin develop`. No commits, no drama.
- They then checkout their feature branch. If the synch caused conflicts, they need
to resolve them.
- Now they can push their feature branch to their repo, and submit a pull request
from their repo feature branch to the team develop branch.
- If they forgot to synch before pushing their feature branch to their repo and making
a PR for it, they will have to synch their develop branch after creating the PR, resolve the conflicts
once they checkout their feature branch again, and then add/commit/push their feature
branch again; the associated PR will be automatically updated.
- If/once their PR is merged, they can delete their feature branch in their repo and locally.
- Their develop branch locally and in their repo is now behind the team develop, and they need to synch again.

There will be a bunch of pushes & pulls, but ONLY ONE MERGE.

If you follow the above, you will have a much cleaner commit history, and the project progress will
be infinitely more transparent to anyone looking at the repo.

## Do merges need to be GPG-signed?

No. A merge does not add any code. It can only be done by a team member with "write"
rights for the team repo, so there should be no question of provenance.

Of course, if the captain's credentials get known to someone unapproved, they
could theoretically merge bogus code and poison the repo.
If that code is GPG-signed, you know who did it.
If not, and you end up with unverified commits in the repo, then the
captain should change their password, and/or upgrade to two factor authentication,
and they may have to rummage through the commit history, starting with a known
good "head" in the repo, and cherry pick the commits after that that they really want.

This would be done in a new branch, and you might then have to delete the original develop,
create a new develop from the newly fixed branch, git rebase or flatten the commits (messing
up the commit history), and then recreate the develop branch. Ew.

You can always create a protected branch, in your repo settings, but that would not prevent
damage if someone has admin rights or access to the admin's account.

Morals of this long, sad story: 
- be careful who you add as collabotors to a repo, 
- make sure that collaborators only have "read" rights, not "write" or "admin",
- be ruthless rejecting PRs that are not GPG-signed, 
- be ruthless rejecting PRs which involve a sad sequence of merges
- be extra careful that a PR is against the team repo's develop branch, and not
the master (which could royally muck up the repo if you merge it and don't notice
until several PRs later)
- be anal about coding standards - if team members agreed to follow a given style
and or documentation/comment level, comment on their PRs that they will not be considered
seriously unless they conform to what they agreed to
- only grant "read" rights to collaborators, until you know you can trust them
to not mess things up

If you are worried about not having enough hours in a day to do all this,
set up a continuous integration task, with style checking, or signup
for one of the webhook-driven code sniffers, to have them try to fix the easy
stuff so you don't have to. If such a tool can fix stuff, it will probably need a "deploy key" 
in your repo settings, and you had better make sure they are trustworthy.

Oh my - I wrote a book, or should I say a rant? Back to the question, merges don't need to be
GPG-signed, but any commits should be, to give you a fighting chance of
salvaging a messed up repo :-/
