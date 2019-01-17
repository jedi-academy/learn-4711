#Lab #2 - FAQ
COMP4711 - BCIT - Winter 2019

## Anything we should have noticed about our team repo?

Take a look...
<img class="scale" src="/pix/labs/2/synch_needed.png"/>

See how your team repo is "behind" mine?  
There was an update to mine, that needs to be incorporated into your team repo.

To fix this, the CAPTAIN should synch the team repo with the one upstream to it, i.e. mine.
The commands to do so are shown below, with the commented lines there for explanation only.

    # add an alias for the original original repo
    git remote add comp4711 https://github.com/jim-parry/comp4711lab02.git
    # make sure you are in your develop branch
    git checkout develop
    # make sure you are synched with your team's develop
    git merge upstream develop
    # merge in the changes from the original original repo
    git merge comp4711 master
    # update the team repo
    git push upstream develop
    # update your repo too
    git push origin develop

You may have a couple of merge commit messages that the system wants to inject.
That is fine.

You are pushing to your repo rather than going through a PR.
This is common practice for this kind of an update, since
"you" aren't contributing - the changes have already been attributed
in the original repo. 

After incorporating the above, the change will show up for each team member
the next time they synch. The changes add the random pet generation to
the web page shown when your "app" is accessed.

## Team repo branches

Your team repo should only ever have the two branches, develop and master.

All your contribution PRs should be for the team develop branch.

Team members can synch their develop branch with the team's as often as they
like, without breaking anything.

