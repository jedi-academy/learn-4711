#Building Out the TODO List
_Part of COMP4711 Lab 7, Winter 2017_

#Job 10 - Provide for completing work

The TODO app "work" page is interesting, in that it shows
some of the important outstanding todo items, by priority and by
category. We are going to add the ability to "complete" these.

We will add checkboxes in front of each task description,
and a button on the bottom of the page to trigger
updating the status of any checked tasks to "complete".

We will accomplish this job without using Caboose for the new fields,
and we will do the next job using Caboose, so you can better see
some of the differences.

##10.1 Make the task list into a form

We will do this for the "by priority" list.
You can do the same for the "by category" list if
you choose.

In `application/views/_by_priority.php` add an opening `form`
element before the `table`:

    <form method='POST' action='{completer}'>

and add a `submit` button and closing `form` tag after the
end of the `table`:

	<input type='submit' value='Complete checked tasks'/>
    </form>

Note that I provided for the "action" associated with the form to be
passed as a substitution parameter. It would be better if the
checkboxes and submit button only show for a user with the
"Owner" role, but we will use that strategy in the next job.

We can set this parameter inside `Views::makePrioritizedPanel()`,
just before returning the rendered view fragment...

		$role = $this->session->userdata('userrole');
		$parms['completer'] = ($role == ROLE_OWNER) ? '/views/complete' : '#';
		return $this->parser->parse('by_priority', $parms, true);

It defaults to a hash sign (no action) unless the user is "logged in"
as an owner.
Right now, this will blow up because we need to add the handling method :-/

Testing this uncovered a defect in last week's work: the `_menubar` view
linked to the `Roles` controller with lowercase role names, which
don't match the role name constants we had defined. Oops.

Fix this by changing the relevant `_menubar` lines:

		  <li><a href="/roles/actor/Guest">Guest</a></li>
		  <li><a href="/roles/actor/Owner">Owner</a></li>


##10.2 Start completion handling

The `Views` controller produces the two ordered tasks lists.
We will have checkboxes beside each todo item, and we want to give
them unique names, for instance `taskxx`, where `xx` is the task ID.

If these are incorporated into an HTML form, then the handling method
will need to check for any such fields in the post parameters,
and change the status of the associated task items to "complete".

We could do this with a suitable method inside the `Views` controller,
per the substitution parameter in the previous step ...

	// complete flagged items
	function complete() {
		// loop over the post fields, looking for flagged tasks
		foreach($this->input->post() as $key=>$value) {
			if (substr($key,0,4) == 'task') {
				// find the associated task
			}
		}
		$this->index();
	}

##10.3 Add checkboxes

We need to give the completion handler something to do.
Specifically, we need to add checkboxes to the task list.

Let's add a column for them, in the `by_priority` view.

We can provide an empty column for this in the table headings...

			<th>Id</th>
			<th></th>
			<th>Task</th>

and then we can add a checkbox control, using "raw HTML",
with provision to name it appropriately.

			<td>{id}</td>
			<td><input type='checkbox' name='task{id}'/></td>
			<td>{task}</td>

Our task list now shows completion checkboxes, as well as the link
to the completion handling method (which is only enabled
for the owner).

<img class="scale" src="/pix/tutorials/todo/76.png"/>

##10.4 Complete the tasks

Inside our completion handler,we can flesh out the `complete()` method...

				// find the associated task
				$taskid = substr($key,4);
				$task = $this->tasks->get($taskid);
				$task->status = 2; // complete
				$this->tasks->update($task);

We can now complete tasks, if we are the owner :)
Non-owner requests are ignored.

Hmm - remember I said we need to be paranoid, server-side?
What if a guest entered the completion URL manually?

Let's add a couple of lines of code, at the beginning of
`complete()`, to block that kind of hack ...

		$role = $this->session->userdata('userrole');
		if ($role != ROLE_OWNER) redirect('/work');

If you want to make sure you have ended up at the same point as the above directions, here is
the complete `complete` method :-/

	// complete flagged items
	function complete() {
		$role = $this->session->userdata('userrole');
		if ($role != ROLE_OWNER) redirect('/work');
		
		// loop over the post fields, looking for flagged tasks
		foreach($this->input->post() as $key=>$value) {
			if (substr($key,0,4) == 'task') {
				// find the associated task
				$taskid = substr($key,4);
				$task = $this->tasks->get($taskid);
				$task->status = 2; // complete
				$this->tasks->update($task);
			}
		}
		$this->index();
	}

Try it - switch between guest & owner, & try to complete a couple of items.

<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
