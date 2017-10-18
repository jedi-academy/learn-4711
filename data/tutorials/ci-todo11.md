#Building Out the TODO List
_Part of COMP4711 Lab 6, Fall 2017_

#Job 11 - Polish the Task Item Maintenance

Job 11 was too brief, right? It wasn't comparable to the
other jobs in complexity or effort needed.

Fortunately, we have a solution - adding the task editing fields
that were not provided for in Job 12. This should be done by the same
team member who got the easy job 11 :-/

Yes, this means thinking for ourself, and applying what you
have done so far in lab. 

Job 12.4 only added two form fields: one for the task description, and
one for the priority code.

Your job here: add three of the missing ones, for the `size`, `group` 
and `status` properties of a TODO task item.

Hint 1: these missing fields have associated control tables
in the database, and would be handled similarly to `priority`.

Hint 2: this should happen mostly in the `Mtce::showit()` method,
although you are welcome to refactor this into smaller methods if you find
it easier to manage.

Hint 3: the `status` property does not have a validation rule; add
one to the `Tasks::rules()` method.

Hint 4: don't forget to update `views/itemedit` to display the
form fields you build.

Yes, this is evil and nasty, but it should be straightforward
if you worked as a pair on Job 12!

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
