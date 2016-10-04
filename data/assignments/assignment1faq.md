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

## Is there a repository that you fork from to start the project?  
I was looking at jedi-academy and saw CodeIgniter3.1-starter3 repository. Do we fork that?
or do we just download a template from CodeIgniter site?

I suggest you create an empty team repo, and *download* either the CI starter2 or starter3 to add to it, like you did for lab 3.

You only need starter2 for assignment 1, but you will find starter3 adds MY_Model, which I expect you will want in assignment 3.

The CodeIgniter site just provides the raw framework, not a template or suitable starter.
If you already started your project with that, you will need to refactor your project so that
its "public" folder is the document root, and you'll have to add the base controller
and view templates if you wish to use them.

You don't *have* to use the template parser. You could use a third party templating engine
or conventional views. Just remember that PHP script in your view files will cost you marks.
