#Tutorial ci-fun02b - Add Menu Item CRUD to Our Diner
COMP4711 - BCIT - Fall 2016

##Part B

This is a continuation of ci-fun02.

It assumes you have done steps 1-7.

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


We have used the [form validation library]() before, and it could be used
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

<- view fragment

We are now primed to do the validation, which is going to be anti-climactic
after the setup steps above :-/

Back to our <code>save()</code> method, we can now flesh out the validation...

		// validate
		// save or not

If there were form validation errors, we just need to redisplay the page, having set the errors
view parameter.

We still need to do some database checking, making sure we would not create primary key
conflicts.

		// validate
		// save or not

If there were no errors, we can save

		// validate
		// save or not



##9. What About the Menu Picture?

We want to provide for providing a replacement picture for a menu item,
but without clobbering the existing one if no replacement is submitted.

We will need to build a "file" form field for this. We could add that
functionality to the formfields helper, or just hard-code it in our <code>mtce-edit</code> view.
We will take the easy approach for now, and I will meniton a better strategy at the end of this step.

The menu item picture should have some image constraints ... 
suitable format and size (256x256). The file upload helper
might come in handy.

The [file uploading library]() provides some of the functionality we need,
if properly configured. We need to save any uploaded file, but only
if it meets our constraints.


##10. What About Deletions?

Deleting a menu item is straightforward, except we should really prompt
for confirmation before doing so. That would be a client-side action,
though there are tricks to confirm to the webapp that the action was confirmed.

For our purposes, we can add a button to the <code>mtce-edit</view>...

and then a suitable method to our maintenance controller:



##11. What about Adding?

Adding a new menu item is basically the same as editing, except that
we start with a new record rather than an existing one. Additionally, we
need to ensure that the item code for a new item isn't in use already.

We can use almost all of what we have so far, with some tweaking to
the session data extraction in our constructor, and to the <code>save()</code>
method.

Of course, we need to add an "Add" button to the menu item list, to
trigger the addition process.


##12. Are We Safe?

The <code>formfields</code> helper built into <code>Caboose</code> uses the
<code>htmlentities</code> PHP function to encode fields values, which should
suffice for most webapps.

My original plan was to use safety as an excuse to integrate <code>Zend\Escaper</code>
using <code>composer</code>, but the tutorial is long enough already! I will find an excuse in 
a future lab/tutorial to do something like that.

So, yes, we are safe.
