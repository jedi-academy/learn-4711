# Some Good Git Practices

Many of the words of wisdom here have been excerpted from the GitHub help pages,
and the Git manual. Others come from my experience with GitHub.

This document is a work in progress.

## Good Repository Naming

If you fork a team repository, that you plan to contribute to, it makes sense
to have your fork named the same as the original, shared one.

On the other hand, if you plan to use a repository fork as just a starting point
for your own project, then it is reasonable to name it differently.

Some poor repo names:

    starter-quotes
    CodeIgniter3-starter2
    mystuff

Some better repo names:

    comp4711-lab02
    Simple-TODO-List
    

## Good Branch Naming

Part of keeping things maintainable is making sure your branches and names are clear and organized. 
A branch name should clearly describe the feature or fix you are working on.

The following are good examples of branch names:

    file-attachment
    ui-rewrite
    search-api

And the following are bad:

    my-work
    enhancements
    bugfix

An even better practice is to use "namespaces", such as:

    feature/better-ui
    fix/parsing-regression-bug

And you should avoid problematic names:

    fix-#34
    master2
    Development

You would normally have a **naster** and a **develop** branch. Any other branches
should only be kept around as long as you need them.

## Good Commit Message

A Git commit should be clear and concise, not cryptic. 
Choose a name that would be helpful for teammates searching for that
commit, to see what all was modified as part of it.

It should be unique, and should not reference an issue number (save that for the PR description).

Some good commit messages:

    Fix incorrect tax formula
    Add sales tax calculation to Order

Some poor commit messages:

    Fix #34
    Update
    my stuff

## Signing Your Commits

Signing your commits is a good idea, for proper attribution. Unfortunately,
the attribution isn't counted as a contribution unless your user name
for signing matches your github user name. Beware!

The best practice is [GPG signing](https://bcit-ci.github.io/CodeIgniter4/contributing/signing.html) your commits,
though not all IDEs support that. If yours doesn't, then
you might have to do commits inside your git bash shell, though
you can still submit PRs through your IDE.

## Good PR Descriptions

Anyone looking at your PR history should be able to easily determine what a PR accomplished and why it was made. 
To ensure this, make sure every PR title is clear and readable.

A good PR has a multi-line description

A PR's title should be brief but should clearly summarize what the PR is for. An example may be "Implement the API for file attachments."

The PR's description should be detailed, describing what changes you made and how they work. 
While it shouldn’t be massively long, it should cover the high points of the change, 
and perhaps why you did what you did (if you think it could be confusing).

If your PR fixes one or more issues, it is appropriate to say that in the body, eg "Closes #123".

## Good Issue Writeups

Issues are how you communicate bugs or feature requests to your team.

A good issue writeup can make this a great tool, while improper writeups
can make the process painful.

There are any number of guides to writing good issues, but the one from 
[Wiredcraft](https://wiredcraft.com/blog/how-we-write-our-github-issues/)
seems particularly helpful.
