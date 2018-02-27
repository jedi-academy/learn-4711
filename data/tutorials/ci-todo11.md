#Building Out the TODO List
_Part of COMP4711 Lab 6, Fall 2018_

#Job 11 - Polish the Task Item Maintenance

What more could there possibly be to do?


Add the task editing fields
that were not provided for earlier. 

Yes, this means thinking for yourself, and applying what you
have done so far in lab. 

The last job only added two form fields: one for the task description, and
one for the priority code.

Your job here: add three of the missing ones, for the `size`, `group` 
and `status` properties of a TODO task item.

Hint 1: these missing fields have associated control tables
in the database, and would be handled similarly to `priority`.

Hint 2: this should happen mostly in the `Mtce::showit()` method,
although you are welcome to refactor this into smaller methods if you find
it easier to manage.

Hint 3: don't forget to update `views/itemedit` to display the
form fields you build.

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
