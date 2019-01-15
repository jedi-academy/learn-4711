# Lab #2 - Collaborative Workflow
COMP4711 - BCIT - Winter 2019

## Lab Goals

This week, you will be practicing collaborative workflow.


## Lab Process

This is a team lab, sharing a single team repository, but with each team member using 
their own repository forked from it.

Team members will each one of two roles to play:
- One member will be the creator and maintainer of the team repo - he/she will be designated the CAPTAIN
- The other members of the team will be contributors
- If a team has fewer than four members, then the captain will also be a contributor

Some of the subsequent labs  will be team ones as well, with the captain role
passing to another team mate.

## Lab Submission

Your lab will result in a github repository for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 
I can find the team member repositories through it.

Due: this Sunday at 17:30

Many of you will complete it during the lab period - this gives you some wriggle room.

## Lab Marking Guideline

A marking rubric will be attached to the lab 2 dropboxes.


## Notes: Synching your repos 

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

# Lab Prep

## Member Prep (ALL)

-   Make sure you have configured git locally, through your IDE or...

        git config --global user.name <name>
        git config --global user.email "your_email@example.com"

-   You will need the [gnupg](https://www.gnupg.org/) tool, ti digitally sign your commits
-   Setup your GPG signing key, and register it with your github account.

        # generate a new pgp key: (better to use gpg2 instead of gpg)
        gpg --gen-key
        # maybe you need some random work in your OS to generate a key. so run this command: `find ./* /home/username -type d | xargs grep some_random_string > /dev/null`

        # check current keys:
        gpg --list-secret-keys --keyid-format LONG

        # export private key in gpg:
        gpg --export-secret-key -a "your_username"

        # export public key in gpg:
        gpg --armor --export your_key_id
        # your_key_id is the HASH id in front of `sec` in previous command.

        # set a pgp key for git:
        git config --global user.signingkey your_key_id


## Team Repository Setup (CAPTAIN)

-    Create a github organization for your team, with an organization name of your choice
-    Fork the [lab starter repo](https://github.com/jim-parry/comp4711lab02) into that organization, using a repository name of your choice
-    Create a new branch "develop", in your team repo 
-    Make "develop" the default branch

## Member Repository Setup (All)

-   Fork the team repository to your personal github account (including the CAPTAIN)
-    Clone your repository locally, using a name/location of your choice.
This could be done through your IDE or...

        git clone [YOUR repo's cloning URL] YOUR_PROJECT_FOLDER

-    If supported by your IDE, "git ignore" your IDE's metadata folder, so you don't inflict it on your teammates.
-    Add a virtual domain, "quotes.local", if you want to keep this separate from last week's lab.
There is nothing wrong with reusing "comp4711.local", properly mapped, or even
with each team member choosing to handle this differently.
-    Map the virtual domain you will use to the folder you cloned your local repo in

## The starter project

The project includes three lists, each stored as a simple text file,
with one word or phrase per line.

- `adjectives` is a list of emotional adjectives, like happy or sad
- `colours` is a list of colours, like blue or tonka yellow
- `nouns` contains a list of animal types, real or imagined

The `index.php` will pick a word from each list, in order
to propose a pet that someone should consider getting,
eg. a "happy blue iguana"


# Round 1

## Contribute to Each List (Contributors)

- Create & checkout a feature branch, based on develop, for one small contribution
- Add three words to one of the lists, keeping the list ordered
- Add & commit this change

        git add .
        git commit -S -m "??"

- Push you branch to your repo
- Open a pull request for it to the team repo

Repeat the above for each of the other lists

## Consider PRs (CAPTAIN)

Review the PRs, one at a time, in submission sequence:

- If they are not properly signed, close them with a suitable comment
- If they are mergeable and acceptable, merge them
- If they are mergeable but not acceptable, explain why in a comment 
(could be out-of-order, inappropriate language)
- If they are not mergeable, ignore them

Repeat

## Fix Your PRs

For each PR that is rejected or not mergable:

- Synch your develop branch & fix your feature branch

        git checkout develop
        git pull upstream develop
        // resolve any conflicts
        git checkout [feature branch]
        git merge develop
        // resolve any conflicts
        // fix anything else that needs fixing
        git add .
        git push origin [feature branch]

Repeat until your feature branches have been merged or abandoned.

## Release (CAPTAIN)

-    Tidy up any loose ends in the repo
-    Merge the develop branch into the master branch, in the team repo

        git pull upstream
        git checkout master
        git merge develop
        git push upstream

- Create a v1.0 release on github, from master

## Synchronize with team (ALL)

- Synchronize your repos with the team repo

        git checkout master
        git pull upstream master
        git push origin master
        git checkout develop
        git pull upstream develop
        git push origin develop

- Remove dead branches

# Round 2

Same as round 1, except each team member's three PRs will
each be for two lists.

The release for this will be v2.0

# Round 3 (if needed)

Same as round 2, except each contributor should prepare
two PRs, each of them changing all three lists

The release for this will be v3.0

# Conclusion

That's all, folks!