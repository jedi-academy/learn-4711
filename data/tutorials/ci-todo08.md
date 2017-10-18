#Building Out the TODO List
_Part of COMP4711 Lab 6, Fall 2017_

#Job 8 - Provide for completing work

The TODO app "work" page is interesting, in that it shows
some of the important outstanding todo items, by priority and by
category. We are going to add the ability to "complete" these.

We will add checkboxes in front of each task description,
and a button on the bottom of the page to trigger
updating the status of any checked tasks to "complete".

We will accomplish this job without using Caboose for the new fields,
and we will do the next job using Caboose, so you can better see
some of the differences.

##8.1 Make the task list into a form

We will do this for the "by priority" list.
You can do the same for the "by category" list if
you choose.

In `application/views/by_priority.php` ADD an opening `form`
element before the `table`:

    <form method='POST' action='{completer}'>

and ADD a `submit` button and closing `form` tag after the
end of the `table`:

	<input type='submit' value='Complete checked tasks'/>
    </form>

Note that I provided for the "action" associated with the form to be
passed as a substitution parameter. It would be better if the
checkboxes and submit button only show for a user with the
"Owner" role, but we will use that strategy in the next job.

We can set this parameter inside `Views::makePrioritizedPanel()`,
just before returning the rendered view fragment...

    // INSERT the next two lines
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

        <!-- MODIFY these lines in your _menubar fragment -->
        <li><a href="/roles/actor/Guest">Guest</a></li>
        <li><a href="/roles/actor/Owner">Owner</a></li>


##8.4 Complete the tasks

Inside our completion handler,we can flesh out the `complete()` method...

    // find the associated task
    // THIS is the "more coming" mentioned above
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
    if ($role != ROLE_OWNER) redirect('/views');

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
