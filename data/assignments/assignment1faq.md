#Assignment #1 - FAQ
COMP4711 - BCIT - Winter 2018

## Do we need a database?

**No**. In fact, it is expressly not allowed :-/

## Is there a repository that you fork to start the project?  

You *could* fork the [starter4](https://github.com/jedi-academy/CodeIgniter3.1-starter4) that I used for demo in class.
If you do so, PLEASE rename your team repo ... having 20 "starter4" repos isn't helpful
when we look at them.

Alternately, you could download the starter and copy it into your empty project folder.

Forking it has the advantage of being to take advantage of any updates to it, while
copying it had the advantage of not being bound to it.

##How do we synchronize with the starter if we forked it?

Two choices:

1) The captain could make a PR from the academy starter (forked by the team repo) into the develop branch of the team repo.
This would all be done on github.

2) Synch your team repo with the academy one.
 
You already have remote aliases `origin` and `upstream`.
Add one for the academy starter, for instance

    git add remote academy https://github.com/jedi-academy/CodeIgniter3.1-starter4.git

Then, the captain would ...

    git checkout develop
    git merge academy master
    git push upstream develop
    git push origin develop

And then the team members would resynch with the team repo.

##How do we use CSV_Model?

I have updated the readme in the starter4 repo, with a bit of an explanation.

If you have a `class Fruits` that `extends CSV_Model`...
- you never call its `load()` method ... that is done automatically
when the model is loaded
- you never call its `store()` method ... that is done automatically
any time the model is changed through one of its mutator methods
- what you do do is call the `DataMapper` methods that it implements,
to get stuff our of its collection or to modify or add stuff to the
collection
- yes, I am sorry it is so simple
- yes, the same works if your model extends RDB_Model and is backed by an RDB
- Seriously? seriously.