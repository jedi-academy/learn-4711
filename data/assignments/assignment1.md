# Assignment #1 - RESTish Backend
COMP4711 - BCIT - Winter 2019

## Assignments Overview

The purpose of the assignments, collectively, is to have you apply the techniques 
from the lessons and tutorials, in a context that will be helpful to you
when you build your project next term.

In your option project teams (of three to five), you will be building a small 
but complete RESTful backend webapp. 

This will be done in three stages, with specific expectations for each stage. 
Each assignment will build on the previous one.

You are free to use the programming language and framework of your choice to implement
these, bearing in mind that assistance for non-CodeIgniter projects will
be spotty, and you may have to explain how your project achieves the assignment goals.

## Goals for This Assignment

The purpose of this assignment #1 is to get the basic pieces of your backend
webapp in place, properly routed. 


## Recipe

Here is a checklist for completing the assignment:

- Setup your team
    - captain, mates, D2L group, team repo, readme with team agreement
- Plan your project
    - one or two plausible resources, one or two plausible API usecases/groups
- Build mock models for your resources, with non-trivial data 
    (4-8 fields per record, 6-12 records in all)
- For each resource, have a resource routing to a resource controller...
    - which uses the equivalent of the API response trait
    - only has to handle the index() and show() methods properly
    - data to come from your model(s)
    - other resource methods to return suitable failures
- For each API endpoint, identify and implement several plausible methods
    - make sure to cover GET and POST between them
    - the controllers should use the equivalent of the API response trait
    - you can provide plausible but bogus responses
- Make it testable
    - a way to invoke each endpoint & behaviour, and see the response
    - could be Javascript & AJAX; could be forms submitted
    - doesn't have to be home or landing page, but could be
- Follow good gitflow workflow
- Cleanup
    - readme, changelog?, commented code!, cruft gone, all synched

## Assignment submission

Submit a link to your team repo for this project, to the dropbox.

It will have a rubric attached.

Due date: Sunday, Feb 10, 23:30
