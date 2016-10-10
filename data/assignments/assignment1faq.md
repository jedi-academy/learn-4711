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

## I am overwhelmed. This is too much for an assignment. Where do I start?

Hmmm 
- 3 models (plus provision for logging)
- 3 main controllers, each with a subcontroller
- homepage controller & dashboard view
- 3 main views, each showing a list of stuff in a model
- 3 subordinate views, each showing one item from a model

Split across four team members, that does not strike me as excessive.

Where to start?
- get your team repo together, *copying* one of the CodeIgniter starters into it
- agree on your models and mock data - this will help you visualize what you are making
- put your homepage in place
- build your three controllers; they will be similar at this point
- build or tailor your view template
- build your 7 view fragmentss (including homepage)
- make sure the result looks like it belongs together

Follow proper gitflow workflow all the while.

## Rubric complete?

You may notice that the assignment rubric does not address the administration
usecase, or the logging. They will be needed as part of assignment 2, but
I don't see them adding value to assignment 1.

## Any words of wisdom regarding our changelog? (It is the biggest source of merge conflicts)

Practically, you could always work towards a comprehensive changelog for the assignmen, a.k.a. a "release".
See https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst for an example.

## Since we are no longer required to use logs for the assignment, my group was wondering what information the dashboard on the homepage should display.

Provide a summary of the "state" of your data, as can be determined by the mock models.
This would include a valuation ($$$ worth of materials on hand, $$$ worth of stock for sale), and
could have some counts (# of different products stocked, # of recipes known, for instance).

We'll beef this up for assignment 2 :)

## I know that the comp4711 assignment 1 submission is due at 5:30pm Sunday (today) but can it still be updated afterwards? Some of the set would appreciate some extra time to tidy up the code.

There will be time to clean up the code for assignment 2 :-/

I am expecting the repo links to be up for 5:30 Sunday, and that the "master" branch (which I will be marking) will be unmodified from that point on.

You are welcome to continue working on the "develop" branch.