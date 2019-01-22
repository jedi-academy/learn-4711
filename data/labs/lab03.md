# Lab #3 - Framework Introduction
COMP4711 - BCIT - Winter 2019

## Lab Goals

This week, you will meet CodeIgniter4.

## Lab Process

This is a team lab, sharing a single team repository, but with each team member using 
their own repository forked from it.

Team members will each one of two roles to play:
- One member will be the creator and maintainer of the team repo - he/she will be designated the CAPTAIN
- The other members of the team will be contributors
- If a team has fewer than four members, then the captain will also be a contributor

The CAPTAIN role should be held by someone other than the team member who
had the role last week.

## Lab Submission

Your lab will result in a github repository for your team, as well as one for each team
member.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 
I can find the team member repositories through it.

Due: this Sunday at 17:30

## Lab Marking Guideline

A marking rubric will be attached to the lab 3 dropboxes.


# Lab Prep

## Member Prep (ALL)

-   You have xAMP in place
-   You have virtual hosts in place
-   You have git installed
-   You have GPG signing configured


## Team Repository Setup (CAPTAIN)

-   Create a github organization for your team, with an organization name of your choice
-   Create a new team repo inside that organization, for this lab; don't worry about a readme
-   Create your starter project locally

        composer create-project codeigniter4/devstarter -s dev

-   Configure the project so that the git remote "origin" refers to your team repo
-   Update the readme appropriately
-   Change the `$baseURL` setting in app/Config/App.php to reflect your team choice
-   Push the repo

        git push origin master

-   On github.com, create a develop branch from master, and make it the default

## Member Repository Setup (All)

-   Fork the team repository to your personal github account (including the CAPTAIN)
-   Clone your repository locally, using a name/location of your choice.

        git clone [YOUR repo's cloning URL] YOUR_PROJECT_FOLDER

-    If supported by your IDE, "git ignore" your IDE's metadata folder, so you don't inflict it on your teammates.
-    Make sure you have a virtual domain mapped to the project
-   Make sure you can run the project

## The Captain's Job

Apart from moderating PRs, you should modify the default view so that
it presents an unordered list of links to contributor's contributions

        <a href="/welcome/matex">Mate X</a>

## Contributors' Job

- Add a method, `matex()`, to the Home controller. It should render the `matex` view
    (or whatever you choose to call it)
-   Add a `matex` view, with a (tasteful) body of your choice

## Gitflow!

When done, your "app" will show a list of member links, each of which results
in a different view.

# Conclusion

That's all, folks!