#Assignment #1 - FAQ
COMP4711 - BCIT - Fall 2016

## How much do we have to build?

You do NOT need business logic to handle form validation or order processing!

Your controllers will present two levels of information: collection and entity.
The collection level will be a list of the appropriate model data,
with each "row" linking to a detail view, managed by a sub-controller,  
i.e. an additional method inside the same controller.

Your collection views present data only, data-driven, with links to the detail views.

The detail view for an entity should probably be an HTML form, but it doesn't 
have to link anywhere for this assignment.

Make sure you provide for presenting all your data,
and that your models provide for all the data you want to present.

## Do We need a database?

The data you work with will be 
"mock data" that you create.
There should be no relational database used for this assignment.
I want to defer that until we have addressed models and views
in class and lab.

