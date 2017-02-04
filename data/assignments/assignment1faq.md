#Assignment #1 - FAQ
COMP4711 - BCIT - Winter 2017

## Do we need a database?

**No**. The data you work with will be 
"mock data" that you create.
There should be **no relational database** used for this assignment.
I want to defer that until we have addressed models and views
in class and lab.

## Is there a repository that you fork from to start the project?  
No.

I suggest you create an empty team repo, and *download* either the CI starter2 or starter3 to add to it, like you did for lab 3.

I do not recommend forking any of the CI starters, but *if* you do, remember to rename them!

You only need starter2 for assignment 1, but you will find starter3 adds MY_Model, which I expect you will want in assignment 2.

The CodeIgniter site just provides the raw framework, not a template or suitable starter.
If you already started your project with that, you will need to refactor your project so that
its "public" folder is the document root, and you'll have to add the base controller
and view templates if you wish to use them.

You don't *have* to use the template parser. You could use a third party templating engine
or conventional views. Just remember that PHP script in your view files will cost you marks.

