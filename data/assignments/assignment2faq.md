#Assignment #2 - FAQ
COMP4711 - BCIT - Winter 2017

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
