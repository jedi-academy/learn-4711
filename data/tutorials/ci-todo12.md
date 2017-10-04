#Building Out the TODO List
_Part of COMP4711 Lab 7, Winter 2017_

#Job 12 - Task Item Maintenance (Finally)

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

#12.1 Task validation rules

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

##12.2 Add `Mtce::add()`

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

##12.3 Add `Mtce::edit()`

	// initiate editing of a task
	public function edit($id = null)
	{
		if ($id == null)
			redirect('/mtce');
		$task = $this->tasks->get($id);
		$this->session->set_userdata('task', $task);
		$this->showit();
	}

That wasn't much harder.

##12.4 Show TODO item being worked with

Here things get a bit more complicated. Fortunately, we have the
Caboose to help us, handling the heavy-lifting of building
suitably styled form fields.

The convention that I use (not a CI one) is to have the form
fields named the same as the table columns, to have a view parameter
with the same name, but prefixed with an "f", for the form field;
and to have any buttons needed named after the button function
but with a "z" in front of the view parameter name.

The fields are constructed using formfield helper methods, from the
Caboose package.

Here's what that would look like:

	// Render the current DTO
	private function showit()
	{
		$task = $this->session->userdata('task');
		$this->data['id'] = $task->id;
		foreach ($this->priorities->all() as $record)
		{
			$priparms[$record->id] = $record->name;
		}
		$fields = array(
			'ftask' => makeTextField('Task description', 'task', $task->task, 'Work', "What needs to be done?"),
			'fpriority' => makeComboBox('Priority', 'priority', $task->priority, $priparms, "How important is this task?"),
			'zsubmit' => makeSubmitButton('Update the TODO task', "Click on home or <back> if you don't want to change anything!", 'btn-success'),
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
	
This isn't complete ... that is coming as Job 11b!

##12.5 Handle form submission

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

<div class="alert alert-info">
Oops - I forgot to fix the handling logic so that it would
either add or update a task, depending on the task id.
The correction is included above :-/
</div>

Try it :) Add a couple of todo tasks, and edit another couple :)


##12.6 Handle canceling

Cheesy, but we can add a couple of links to the bottom of `itemedit`, to use for requesting
an edit cancellation or deletion.

    <a href="/mtce/cancel"><input type="button" value="Cancel the current edit"/></a>
    <a href="/mtce/delete"><input type="button" value="Delete this todo item"/></a>

<img class="scale" src="/pix/tutorials/todo/79.png"/>

Handling a cancellation is straightforward:

	// Forget about this edit
	function cancel() {
		$this->session->unset_userdata('task');
		redirect('/mtce');
	}

Try it :)

##12.7 Handle deletion

Deletion is equally straightforward:

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
