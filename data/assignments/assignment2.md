# Assignment #2 - Front-end App using RESTful Backend  
COMP4711 

## Assignments Overview

The purpose of the assignments, collectively, is to have you apply the techniques 
from the lessons and tutorials, in a context that will be helpful to you
when you build your project next term. 
In your option project teams (of three to five), you will be building a small 
but complete RESTful backend webapp. 

This was to be done in three stages, but you were not ready for stage two,
so stages two & three get bundled here.

You are free to use the programming language and framework of your choice to implement
these, bearing in mind that assistance for non-CodeIgniter projects will
be spotty, and you may have to explain how your project achieves the assignment goals.

## Goals for This Assignment

The purpose of this assignment #2 is to provide a RESTful resource and a RESTful
service, with a front-end suitable for exercising them. 

Per our discussion in class, my understanding is that each team wants to build
something useful for showing off their option project.

Each team will build a front-end and a back-end, i.e. apps that run in
separate instances on their systen, with different ports and possibly
different host aliases.

Your front-end will likely have some CRUD component(s), which use
the resource endpoint of your backend, and some usecase-focused
pages, which demonstrate/protype yourt option project, using
the backend API endpoints to request data processing and persistence.

## Recipe

Here is a checklist for completing the assignment:

- You have your team and repo
- You have a project, right? with one or two plausible resources, 
    and one or two plausible API usecases/groups
- You need real data for your resources (eg MySQL database), with non-trivial data 
    (4-8 fields per record, 6-12 records in all)
- For each resource, have a resource routing to a resource controller...
    - which uses the equivalent of the API response trait
    - implements all methods of the CI4's ResourceController
- For each API endpoint, a suitable controller implementing the API
- Make it testable - here's where the exercising front-end comes in.
    It should look like the kind of project you are building
    - could be Javascript & AJAX; could be forms submitted
    - doesn't have to be home or landing page, but could be
- Follow good gitflow workflow
- Cleanup
    - readme, commented code!, cruft gone, all synched


## Assignment submission

Your submission should be in the form of a readme, with links
to the repo(s) holding your project, and an explanation of
what I need to know to instal and run your apps.

The assignment will be graded out of 30, so weighted more than the first one.

We have a dropbox setup, and it will shortly have a rubric to guide you.

Due date: Thurs, Apr 11, 23:30
