#Lab #6 - Building Out Our TODO List Manager
COMP4711 - BCIT - Fall 2017

##Lab Goals

The purpose of this lab is to "build out" our TODO list webapp
from last lab,
by adding some useful functionality pieces, culminating in role-based CRUD.
The CRUD maintenance will be implemented by generating suitable HTML
forms for TODO tasks, and handling the input from them.

The lab will build on the last one (lab 5). If your lab 5 has issues,
they should be fixed before starting this lab.

We will continue to use gitflow workflow. That means proper branching (master/develop), 
completing new work in feature branches, and good commit comments.
Generally speaking, I am happy with the gitflow practices I have seen.
We will continue to award marks for them to help you remember
these practices :)

##Lab Teams & Repo

Use the same "Lab 5" team as for the last lab.

##Lab Submission

Your lab will result in an updated github repository for your team.

Submit a readme *text* file, or a submission comment, to the lab dropbox. 
It should contain a link to your **team**'s github repository. 

Note: this is not a cloning URL, and I do not need links to the individual
team member repos.

Due: Sunday Oct22 by 17:30.

##Lab Marking Guideline

A marking rubric will be attached to the lab 6 dropboxes, similar to our
earlier labs. The labs will be weighted equally in the marks worksheet,
even if some of them have different raw scores because of their rubric.

##Github repository

In your github repo, make sure that everything has been merged into your
*master* branch before starting this lab, so that your *develop* branch
is "clean". 

At the end of the lab, you will merge *develop* into *master* again, to
reflect the new deployable webapp state.

##Chore - fix my Bootstrap mistake from lab 5

Before diving in to this lab, there is one chore we need to take care of.

In the secondary template used for lab 5, I asked you to use Bootstrap3
attributes to style the categorized and prioritized lists into
two columns. That didn't work very well, did it?

The workaround for this is to use the proper Bootstrap2 attributes
in our template:

       <div class="span6">
            {leftside}
        </div>
        <div class="span6">
            {rightside}
        </div>


You *could* change the templates to use Bootstrap3, by pulling
in the Bootstrap3 CSS and Javascript files from their CDN,
and then adjusting the styling to suit that. The workaround above
is easier for now!

##Your jobs

There are seven small jobs to do to complete the lab. I suggest that you switch
team members for each.

- [Job 4 - Maintenance list](/display/tutorial/ci-todo04)
- [Job 6 - Pagination](/display/tutorial/ci-todo06)
- [Job 7 - User roles](/display/tutorial/ci-todo07)
- [Job 8 - Add "completion" to the Homepage](/display/tutorial/ci-todo08)
- [Job 9 - Beef up the maintenance page](/display/tutorial/ci-todo09)
- [Job 10 - Add item maintenance (finally)](/display/tutorial/ci-todo10)
- [Job 11 - Polish the item maintenance](/display/tutorial/ci-todo11)

Some of the jobs can be done in parallel, but you would end up
with some team members familiar with some of the techniques but
not all of them.

Note: Job 5 was purposefully left out of the above list, since you completed
it last week :)

Note 2: a working version of this is deployed at https://todo.jlparry.com :-/

Note 3: The UX/UI for our item maintenance is pretty tragic,
but our focus is on functionality.

#Wrapup

<div class="alert alert-info">
Captain: assuming that everyone on the team agrees that
you have completed the lab, prepare for submission.

It is now time
to merge the *develop* branch into the *master* branch,
and submit your repo link to the dropbox!!
</div>

