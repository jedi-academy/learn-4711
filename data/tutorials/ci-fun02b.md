#Tutorial ci-fun02b - Add Menu Item CRUD to Our Diner
COMP4711 - BCIT - Fall 2016

##Part B

This is a continuation of ci-fun02.

It assumes you have done steps 1-7.

##7X. Corrections

In the earlier tutorial, the change to <code>third_party/caboose/views/_fields/textfield.php</code>
omitted the "name" attribute, required for PHP input handling.

The "input" element should read:

    <input type="text" class="form-control" id="{name}" name="{name}" placeholder="{label}"
		   value="{value}" maxLength="{maxlen}" size="size"  title="{explain}" {disabled}>

When building the form fields, inside <code>edit()</code>, I misdirected you
with the category codes index value (third line of code below). Oops.

    $cats = $this->categories->all(); // get an array of category objects
    foreach ($cats as $code => $category) // make it into an associative array
            $codes[$category->id] = $category->name;
    $this->data['fcategory'] = makeCombobox('Category', 'category', $record->category, $codes);

##Debugging Note

As you work through the tutorial, a common problem is the retention of a
previous data transfer object in the session. The symptom: when you click on X
in the menu item list, you get the edit page for the previously
selected menu item.

To fix this, click "Cancel" on the edit page. That will clear the DTO stored in the
session, and the "correct" menu item should then show up on the edit page
when selected from the list.

##8. Handle a Submitted Change

Handling a submitted change is more involved :-/

We need to update the data transfer object, validate it, and then
redisplay the form with error messages or else update the database if there were no errors.

Hmm - getting the session data is common to both the <code>edit()</code> and
<code>save()</code> methods, so why don't we move that up to the maintenance
controller's constructor? The answer is that we need the menu code before
retrieving the right database record, so we can't do everything in the constructor.
We will have to repeat some code :(

Here's our starting point:

    function save() {
            // try the session first
            $key = $this->session->userdata('key');
            $record = $this->session->userdata('record');

            // if not there, nothing is in progress
            if (empty($record)) {
                $this->index();
            	return;
            }
            // validate
            // save or not
    }

Note that the above pointed out a flaw in the <code>edit()</code> method,
namely that we should test for a 'record' property in the session
rather than a 'key' property. There will be a 'record' property if
a menu item is being edited or added, but a 'key' property only
for editing existing records. We need to make that change in the<code>edit()</code>
method too...

    function edit($id = null) {
        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');

        // if not there, get them from the database
        if (empty($record)) {
        ...


We have used the [form validation library](http://www.codeigniter.com/user_guide/libraries/form_validation.html) 
before, and it could be used
here to good effect too. A common practice is to have a method
in your model that builds the form validation configuration, because who knows better
what is correct. That assumes that you can predict the names of the fields,
which is true in our case by convention.

Let's add a <code>rules()</code> method to our <code>models/Menu</code>. We want
to insist on a few things:
- the item's id, name and description are required
- the id has to be numeric
- price is optional, but should be decimal if present
- an image is required
- the category is required and has to be valid  
  
So the model method could start out as:

    function rules() {
        $config = [
            ['field'=>'id', 'label'=>'Menu code', 'rules'=> 'required|integer'],
            ['field'=>'name', 'label'=>'Item name', 'rules'=> 'required'],
            ['field'=>'description', 'label'=>'Item description', 'rules'=> 'required|max_length[256]'],
            ['field'=>'price', 'label'=>'Item price', 'rules'=> 'required|decimal'],
            ['field'=>'picture', 'label'=>'Item picture', 'rules'=> 'required'],
            ['field'=>'category', 'label'=>'Menu category', 'rules'=> 'required']
        ];
        return $config;
    }

Note that the rules so far do not address image or category validity.
Those are coming :)

Planning ahead, we will need to provide for displaying errors.
I suggest we add a view fragment for that, tailored to the form validation
response. It would be passed as an "errors" view parameter to the <code>mtce-edit</code>
view. We would set it to blank if no errors, but parse the view fragment to
provide error messages if there were any.

Let's add <code>views/mtce-errors.php</code>:

    <div class="alert alert-danger" role="alert">
            {error_messages}
    </div>

Note that we are hedging on the error messages themselves, as they are returned
as an array of strings from the form validation.

If we make a controller property for error messages, then we just have to add to
it as we uncover problems with the submitted data, and the error messages will
be accessible to the <code>edit()</code> method if we use that to re-display
a maintenance form.

Establish the error messages as empty originally, by adding a line to the maintenance
controller's constructor:

    $this->error_messages = array();

Add a method to build any error message display needed:

	function show_any_errors() {
		$result = '';
		if (empty($this->error_messages)) {
			$this->data['error_messages'] = '';
			return;
		}
		// add the error messages to a single string with breaks
		foreach($this->error_messages as $onemessage)
			$result .= $onemessage . '<br/>';
		// and wrap these per our view fragment
		$this->data['error_messages'] = $this->parser->parse('mtce-errors',
				['error_messages' => $result], true);
	}

This may seem like overkill, but we have provided for styling the error
message display the way we like.

This can be triggered inside <code>edit()</code>, by calling the error
message formatting just before rendering:

        ...
        // show the editing form
        $this->data['pagebody'] = "mtce-edit";
        $this->show_any_errors();
        $this->render();
    }

We need to add a reference to the view parameter, inside <code>views/mtce-edit</code>:

    <h2>Menu Maintenance - Editing</h2>
    {error_messages}
    ...

Before doing any validation, we should update our data transfer object,
merging any fields provided as part of the form submission. This block of code
would go in the <code>save()</code> method, just before we validate.

    // update our data transfer object
    $incoming = $this->input->post();
    foreach(get_object_vars($record) as $index => $value)
        if (isset($incoming[$index]))
            $record->$index = $incoming[$index];
    $this->session->set_userdata('record',$record);
	
    // validate
	

We are now primed to do the validation, which is going to be anti-climactic
after the setup steps above :-/

Back to our <code>save()</code> method, we can now flesh out the validation...

    // validate
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->menu->rules());
    if ($this->form_validation->run() != TRUE)
            $this->error_messages = $this->form_validation->error_array();

    // save or not

That's not the whole picture, though - we need to check for duplicate menu codes
in the case of an addition. We also want to check the category code, even with
the combobox we created, because we should never trust user input implicitly!

    // check menu code for additions
    if ($key == null) 
            if ($this->menu->exists($record->id))
                    $this->error_messages[] = 'Duplicate key adding new menu item';
    if (! $this->categories->exists($record->category))
            $this->error_messages[] = 'Invalid category code: ' . $record->category;

    // save or not

If there were form validation errors, we just need to redisplay the page, having set the errors
view parameter. If there were no errors, we can save

        // save or not
        if (! empty($this->error_messages)) {
                $this->edit();
                return;
        }

        // update our table, finally!
        if ($key == null)
                $this->menu->add($record);
        else
                $this->menu->update($record);
        // and redisplay the list
        $this->index();	
    }

##8X. Reality Check?

Whew! At this point, you should have properly working editing of an existing
menu item, except that menu pictures are specified using only the filename.

If you don't you may want to check screenshots I captured of working code.
I did this purposefully as screenshots, to discourage simple copy-and-paste, 
as I see the benefit of the tutorial being understanding what is going on.

If your code isn't working correctly, compare it against these excerpts:
- [Crud constructor & default method](/pix/tutorials/fun/crud1.png)
- [Crud edit method](/pix/tutorials/fun/crud2.png)
- [Crud save method](/pix/tutorials/fun/crud3.png)
- [Crud show_any_errors method](/pix/tutorials/fun/crud4.png)

##9. What About the Menu Picture?

We want to provide for providing a replacement picture for a menu item,
but without clobbering the existing one if no replacement is submitted.

We will need to build a "file" form field for this. We could add that
functionality to the formfields helper, or just hard-code it in our <code>mtce-edit</code> view.
We will take the easy approach (hard-coded) for now, and I will mention a better strategy at the end of this step.

The HTML changes will be in <code>views/mtce-edit</code>.

I suggest we add an input field for a replacement image, giving
it a unique name so that we can process it separately.
The menu item picture should have some image constraints ... 
suitable format and size (256x256). The file upload helper
might come in handy.

    {fpicture}
    <div class="form-group">
            <label for="replacement">Replacement picture</label>
            <input type="file" id="replacement" name="replacement"/>
    </div>
    {fcategory}

We also need to modify the <code>form</code> element itself,
specifying an enclosure type of multipart, so that the file
contents are encoding and submitted too.

    <form action="/crud/save" method="post" enctype="multipart/form-data">

The [file uploading library]() provides some of the functionality we need,
if properly configured. We need to save any uploaded file, but only
if it meets our constraints.

Let's handle this in a separate method:

	// handle uploaded image, and use its name as the picture name
	function replace_picture() {
		$config = [
			'upload_path' => './images', // relative to front controller
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size' => 100, // 100KB should be enough for our graphical menu
			'max_width' => 256,
			'max_height' => 256, // actually, we want exactly 256x256
			'min_width' => 256,
			'min_height' => 256, // fixed it
			'remove_spaces' => TRUE, // eliminate any spaces in the name
			'overwrite' => TRUE, // overwrite existing image
		];
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('replacement')) {
			$this->error_messages[] = $this->upload->display_errors();
			return NULL;
		} else
			return $this->upload->data('file_name');
	}
	
And we would call this, if appropriate, before updating the DTO
stored in the session.

    // update our data transfer object
    $incoming = $this->input->post();
    foreach(get_object_vars($record) as $index => $value)
        if (isset($incoming[$index]))
            $record->$index = $incoming[$index];

    $newguy = $_FILES['replacement'];
    if (!empty($newguy['name'])) {
        $record->picture = $this->replace_picture ();
        if ($record->picture != null)
            $_POST['picture'] = $record->picture; // override picture name
    }
    $this->session->set_userdata('record',$record);

Note that the above will accept uploaded images, storing them on our
"server", even if there are other errors and even if the user
decides to cancel the edit.

Better strategy: provide a formfields helper function for this,
so that we can style the input element to match the others.

Best strategy: again, a formfields helper function, but incorporating
one of the many jquery file upload widgets. They provide for
image preview, potentially multiple images (though we don't provide
for that in our code), and so on.

My personal favorite is the [Jasny File input widget](http://www.jasny.net/bootstrap/javascript/#fileinput).

##10. What About Deletions?

Deleting a menu item is straightforward, except we should really prompt
for confirmation before doing so. That would be a client-side action,
though there are tricks to confirm to the webapp that the action was confirmed.

For our purposes, we can add a button to the <code>mtce-edit</code>...

	{zsubmit} <a class="btn btn-default" role="button" href="/crud/cancel">Cancel</a>
	 <a class="btn btn-default" role="button" href="/crud/delete">Delete</a>
    </form>

And we need a suitable method in our maintenance controller...

    function delete() {
            $key = $this->session->userdata('key');
            $record = $this->session->userdata('record');

            // only delete if editing an existing record
            if (! empty($record)) {
                    $this->menu->delete($key);
            }
            $this->index();
    }
	
Yes, it would be a better long-term solution to enhance the formfields
helper to generate different button types, but I view that as out-of-scope
for this lab.

##11. What about Adding?

Adding a new menu item is basically the same as editing, except that
we start with a new record rather than an existing one. Additionally, we
need to ensure that the item code for a new item isn't in use already.

We have already provided for adding in the <code>save()</code> method.

Of course, we need to add an "Add" button to the menu item list, to
trigger the addition process.

    <a class="btn btn-default" role="button" href="/crud/add">Add a new menu item</a>

And the corresponding method:

    function add() {
        $key = NULL;
        $record = $this->menu->create();

        $this->session->set_userdata('key', $key);
        $this->session->set_userdata('record', $record);	
        $this->edit();
    }

And we should update the maintenance form to reflect the action underway:

    <h2>Menu Maintenance - {action}</h2>

... after we set that in the <code>edit()</code> method:

        $this->data['action'] = (empty($key)) ? 'Adding' : 'Editing';

        // build the form fields


##12. Are We Safe?

The <code>formfields</code> helper built into <code>Caboose</code> uses the
<code>htmlentities</code> PHP function to encode fields values, which should
suffice for most webapps.

My original plan was to use safety as an excuse to integrate <code>Zend\Escaper</code>
using <code>composer</code>, but the tutorial is long enough already! I will find an excuse in 
a future lab/tutorial to do something like that.

So, yes, we are safe.
