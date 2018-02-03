#Building Out the TODO List
_Part of COMP4711 Lab 6, Fall 2017_

#Job 10 - Task Item Maintenance (Finally)

Think back to the presentation on the data transfer object design pattern.

Adding and editing are very similar, with the former starting with an empty item
and the latter starting with an existing item. In both cases, we present the
item for editing, and then handle the submitted form, updating the todo tasks
table if there were no errors.

Let's use the `task` session variable to hold our DTO.

We will need the following methods in `Mtce`:
- `add` to create a new empty record and save it as our DTO, with an empty ID
- `edit` to retrieve an existing task & save it as our DTO
- `showit` to build an HTML form for the current DTO (a private internal method)
- `submit` to handle form submission, validation & DB updating
- `cancel` to throw away the current DTO
- `delete` to delete the current task

#10.0 Bug fix :(

Students working on this have uncovered another bug in my code - I am so fired!!

If you did the original 10.1 through 10.5, and added a new task, it
would be added without all the properties set, specifically the group,
priority and size. This would trigger an "undefined index" PHP error
when the list of maintenance items was redisplayed.

The fix is to beef up `models/App` so that it provides default values
for any missing properties.

To do this, replace the `App` work methods with

    public function flag($which = null) {
	return isset($which) ?
		(isset($this->flags[$which]) ? $this->flags[$which] : '') :
		$this->flags;
    }

    public function group($which = null) {
	return isset($which) ?
		(isset($this->groups[$which]) ? $this->groups[$which] : 'Unknown') :
		$this->groups;
    }

    public function priority($which = null) {
	return isset($which) ?
		(isset($this->priorities[$which]) ? $this->priorities[$which] : 'Unknown') :
		$this->priorities;
    }

    public function size($which = null) {
	return isset($which) ?
		(isset($this->sizes[$which]) ? $this->sizes[$which] : 'Unknown') :
		$this->sizes;
    }

    public function status($which = null) {
	return isset($which) ?
		(isset($this->statuses[$which]) ? $this->statuses[$which] : '') :
		$this->statuses;
    }

Sorry!


#10.1 Task validation rules

We need some rules for validating a task.

Let's add some, in `models/Tasks.php':

	// provide form validation rules
	public function rules()
	{
		$config = array(
			['field' => 'task', 'label' => 'TODO task', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
			['field' => 'priority', 'label' => 'Priority', 'rules' => 'integer|less_than[4]'],
			['field' => 'size', 'label' => 'Task size', 'rules' => 'integer|less_than[4]'],
			['field' => 'group', 'label' => 'Task group', 'rules' => 'integer|less_than[5]'],
		);
		return $config;
	}

These aren't exhaustive, but you get the idea.

##10.2 Add `Mtce::add()`

Our `add` needs to create an empty record, set it as the DTO, and proceed to
`showit`.

	// Initiate adding a new task
	public function add()
	{
		$task = $this->tasks->create();
		$this->session->set_userdata('task', $task);
		$this->showit();
	}

That looks too easy.

##10.3 Add `Mtce::edit()`

	// initiate editing of a task
	public function edit($id = null)
	{
		if ($id == null)
			redirect('/mtce');
		$task = $this->tasks->get($id);
		$this->session->set_userdata('task', $task);
		$this->showit();
	}

That wasn't much harder. Notice the difference: one creates a task
record with empty fields, while the other retrieves an existing
task record with fields set from the persistent data.
In both cases, the task record is saved as the "task" item
in our session.

##10.4 Show TODO item being worked with

Here things get a bit more complicated. Fortunately, we have CodeIgniter's
`form` helper to make things a bit easier.

The convention that I use (not a CI one) is to have the form
fields named the same as the table columns, to have a view parameter
with the same name, but prefixed with an "f", for the form field;
and to have any buttons needed named after the button function
but with a "z" in front of the view parameter name.

The fields are constructed using form helper functions.

Here's what that would look like:

	// Render the current DTO
	private function showit()
	{
 		$this->load->helper('form');
		$task = $this->session->userdata('task');
		$this->data['id'] = $task->id;

		// if no errors, pass an empty message
		if ( ! isset($this->data['error']))
			$this->data['error'] = '';

		$fields = array(
			'ftask'		 => form_label('Task description') . form_input('task', $task->task),
			'fpriority'	 => form_label('Priority') . form_dropdown('priority', $this->app->priority(), $task->priority),
			'zsubmit'	 => form_submit('submit', 'Update the TODO task'),
		);
		$this->data = array_merge($this->data, $fields);

		$this->data['pagebody'] = 'itemedit';
		$this->render();
	}


And the `views/itemedit.php` would be something like...

	<h1>Task # {id}</h1>
	<form role="form" action="/mtce/submit" method="post">
		{ftask}
		{fpriority}
		{zsubmit}
	</form>
        {error}

This isn't complete ... that is coming as Job 11!

##Oops - found another bug in core/Memory_Model

The `highest` method should look like:

	// Determine the highest key used
	function highest()
	{
		end($this->_data);
		return key($this->_data);
	}


##10.5 Handle form submission

	// handle form submission
	public function submit()
	{
		// setup for validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->tasks->rules());

		// retrieve & update data transfer buffer
		$task = (array) $this->session->userdata('task');
		$task = array_merge($task, $this->input->post());
		$task = (object) $task;  // convert back to object
		$this->session->set_userdata('task', (object) $task);

		// validate away
		if ($this->form_validation->run())
		{
			if (empty($task->id))
			{
                                $task->id = $this->tasks->highest() + 1;
				$this->tasks->add($task);
				$this->alert('Task ' . $task->id . ' added', 'success');
			} else
			{
				$this->tasks->update($task);
				$this->alert('Task ' . $task->id . ' updated', 'success');
			}
		} else
		{
			$this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
		}
		$this->showit();
	}

And we need an `alert` method (referenced above) to build an error or other message (ugly for now):


	// build a suitable error mesage
	private function alert($message) {
		$this->load->helper('html');		
		$this->data['error'] = heading($message,3);
	}


Try it :) Add a couple of todo tasks, and edit another couple :)


##10.6 Handle canceling

Cheesy, but we can add a couple of links to the bottom of `itemedit`, to use for requesting
an edit cancellation or deletion.

    <a href="/mtce/cancel"><input type="button" value="Cancel the current edit"/></a>

<img class="scale" src="/pix/tutorials/todo/79.png"/>

Handling a cancellation is straightforward:

	// Forget about this edit
	function cancel() {
		$this->session->unset_userdata('task');
		redirect('/mtce');
	}

Try it :)

##10.7 Handle deletion

Deletion is equally straightforward:

To the bottom of `itemedit`:

    <a href="/mtce/delete"><input type="button" value="Delete this todo item"/></a>

And to `Mtce`:

	// Delete this item altogether
	function delete()
	{
		$dto = $this->session->userdata('task');
		$task = $this->tasks->get($dto->id);
		$this->tasks->delete($task->id);
		$this->session->unset_userdata('task');
		redirect('/mtce');
	}

Try it :)

##Phew


<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
