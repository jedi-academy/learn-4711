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
- `showit` to build an HTML form for the current DTO
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
			['field' => 'task', 'label' => 'TODO task', 'rules' => 'alpha_dash|max_length[64]'],
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

that wasn't much harder.

# Work in progress from here down

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
		foreach($this->priorities->all() as $key=>$value) {
			$priparms[$key]=$value;
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

This isn't complete ... I will update it as I can :-/

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
		$this->session->set_userdata('task', (object) $task);

		// validate away
		if ($this->form_validation->run())
		{
			$factory->updated = date();
			$this->tasks->update($task);
			$this->alert('Task ' . $task->id . ' updated', 'success');
		} else
		{
			$this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
		}
		$this->settings();
	}

##12.6 Handle canceling

##12.7 Handle deletion

##Phew


<div class="alert alert-info">
Synch, commit, push, merge, synch ... you know the drill.
</div>
