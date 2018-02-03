#Tutorial ci-fun02 - Add Menu Item CRUD to Our Diner
COMP4711 - BCIT - Fall 2016

##Tutorial Goals

This tutorial will walk you through setting up menu maintenance,
allowed only for a user with the "admin" role.
The menu maintenance page should show a list of
the existing menu items, with an "edit" link for each,
and then provide a button to add a new item to the menu.

There are several smaller steps to the tutorial. You could
alternate steps between team members, or you could group
them to divide the workload fairly (first few for first teammate, etc).

##Planning

This lab will use a data transfer object, stored in the session,
to hold the state of the menu item record currently being edited or added.

We also want to store the key of the menu item record in the session, 
so that we know if we are adding a new item (null key) or editing an existing one.
This will also let us change the key for a menu item if desired,
since we will have the original value as well as the one in the revised record, both
in our session.

We will add appropriate methods to the maintenance controller,
for each CRUD operation.

##The End Result

Our menu maintenance page, showing the list of menu items:

<img class="scale" src="/pix/tutorials/fun/11.png"/>

The edit page for a menu item:

<img class="scale" src="/pix/tutorials/fun/12.png"/>

##1. Handle the Bad Guys

I purposefully did not specify a controller name or the
text of suitable message last lab. My controller method ended up like this:

    public function index() {
         $userrole = $this->session->userdata('userrole');
         if ($userrole != 'admin')
                 $message = 'You are not authorized to access this page. Go away';
         else
                 $message = 'Get ready to fix stuff.';
         $this->data['content'] = $message;
         $this->render();
    }

This can be improved. I suggest simplifying it (if you haven't done so already), so
that "bad guys" are dealt with at the top of the method only,
eliminating the need for an if/else block. That could look like this:   

    public function index() {
         $userrole = $this->session->userdata('userrole');
         if ($userrole != 'admin') {
                 $message = 'You are not authorized to access this page. Go away';
                 $this->data['content'] = $message;
                 $this->render();
                 return;
         }

         $message = 'Get ready to fix stuff.';
         $this->data['content'] = $message;
         $this->render();
    }

There will be no visible difference in the menu maintenance page appearance yet.

##2. Show the Existing Menu Items

We have done something like this before. We can create a view,
<code>views/mtce</code>, which uses a [loop variable](http://www.codeigniter.com/user_guide/parser.html#variable-pairs) to show all the menu items.
We want to make sure that the field names inside the loop variables correspond
to column names in our <code>menu</code> table, and we don't need to show all
of the fields for a menu item here.

    <table class='table'>
            <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
            </tr>
            {items}
            <tr>
                    <td>{id}</td>
                    <td>{name}</td>
                    <td>{description}</td>
            </tr>
            {/items}
    </table>

Our <code>index()</code> code to respond to a user in the role of "admin"
would then retrieve the items from our <code>menu</code>
model, and set them as a view parameter before rendering.

    $this->data['pagebody' ] ='mtce';
    $this->data['items'] = $this->menu->all();
    $this->render();

**Note** - the above is *in place of* setting the 'content' view parameter.
If the 'content' parameter is set, then the base controller's <code>render()</code>
will not even look at the 'pagebody' parameter.

What we have, at this point:

<img class="scale" src="/pix/tutorials/fun/13.png"/>

We need to add a link on each menu item row, to the menu editing
method that we will add in the next step. I suggest making the
<code>id</code> table column into a link.

    <td><a href="/crud/edit/{id}">{id}</a></td>

**Note** - if you named your maintenance controller something other than "Crud",
then you would use your (lower-case) controller name in the above link, and not "crud".

The result looks like:

<img class="scale" src="/pix/tutorials/fun/14.png"/>

Hmmm - that doesn't have a lot of contrast with the default BootStrap styling.
Fortunately, Bootstrap provides for [rendering a link as a button](http://getbootstrap.com/css/#buttons-tags).

If we adjust our view:

    <td><a class="btn btn-default" role="button" href="/crud/edit/{id}">{id}</a></td>

we can make the links stand out more:

<img class="scale" src="/pix/tutorials/fun/15.png"/>

##3. Editing a Menu Item

Each item in our menu list links to "crud/edit/xx", where "xx" is the <code>id</code>
of that item. We will need to build an <code>edit($id)</code> method in our maintenance
controller to deal with this. It should display an HTML form for editing the
fields for the appropriate item.

We have three things to do for this:
- retrieve the correct record
- build the form field view parameters
- display the appropriate view

The record will be retrieved either from the data transfer object stored in the session,
or else from the <code>menu</code> table. If it comes from the database, then we
want to save it in the session before continuing.

Here's a start at the <code>edit()</code> method...

    function edit($id=null) {
        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');

        // if not there, get them from the database
        if (empty($key)) {
                $record = $this->menu->get($id);
                $key = $id;
                $this->session->set_userdata('key',$id);
                $this->session->set_userdata('record',$record);
        }

        $this->data['content'] = "Looking at " . $key . ': ' . $record->name;
        $this->render();
    }

Try it and clicking on an edit link should give something like:

<img class="scale" src="/pix/tutorials/fun/16.png"/>

There is no error checking, for instance to make sure that we have been given a valid
menu item id, or that the given menu id matches that of our DTO, but we will 
leave that as an exercise for the reader.

Setting the "content" view parameter is only for debugging. We should really be
building form fields. It's a good thing that the Caboose package incorporates
the <code>formfields</code> helper, as that can make our job easier.

**Warning**: at the moment, the session is not cleared - that will be done
in a later step. The impact of this is that once you select an item,
that item will show as the selected item even if you go back to the menu
and select another item.

Instead of setting the "content" view parameter, we can set view parameters
for each of the fields to edit, and then "pagebody" to the form view
that we will build next. Let's start this off by using text fields for everything;
we will come back and fix that shortly.

    // build the form fields
    $this->data['fid'] = makeTextField('Menu code', 'id', $record->id);
    $this->data['fname'] = makeTextField('Item name', 'name', $record->name);
    $this->data['fdescription'] = makeTextField('Description', 'description', $record->description);
    $this->data['fprice'] = makeTextField('Price, each', 'price', $record->price);
    $this->data['fpicture'] = makeTextField('Item image', 'picture', $record->picture);
    $this->data['fcategory'] = makeTextField('Category', 'category', $record->category);

    // show the editing form
    $this->data['pagebody'] = "mtce-edit";
    $this->render();

Oops - that didn't work so well ...  

    Error: Call to undefined function makeTextField()

Doh - we didn't load the <code>formfields</code> helper! It will be used all over the place here,
but not on every page in our webapp,
so let's add it to our controller's constructor:

    public function __construct() {
            parent::__construct();
            $this->load->helper('formfields');
    }

A reminder: the "formfields" helper was bundled with the <code>Caboose</code>
package that we integrated last lab. It will not be found inside CodeIgniter
or the CI User Guide! If you want to look at the source code, you will find it
at <code>third_party/caboose/helpers/formfields_helper.php</code>.

Now the webpage has a different error, but one we expect :)

    An Error Was Encountered
    Unable to load the requested file: mtce-edit.php

We need a <code>mtce-edit</code> view now, with the actual form in it. Here's a start:

    <h2>Menu Maintenance - Editing</h2>
    <form action="#" method="post">
	{fid}
	{fname}
	{fdescription}
	{fprice}
	{fpicture}
	{fcategory}
    </form>

and the result is spectacularly ugly, although the basics are sorta there :-/

<img class="scale" src="/pix/tutorials/fun/17.png"/>

Three things are wrong with this: 1) it's ugly, 2) we aren't using the proper
field types, and 3) the form doesn't have any buttons nor would it go
anywhere if it did. Let's tackle these things in that order.

##4. Improve Form Appearance

We're using Bootstrap, so the form should look better than this, shouldn't it?
In class, I suggested that the formfields helper could be tailored to a
CSS framework simply by changing the view fragments in <code>caboose/views/_fields/xxx</code>.
time to put that to the test!

We can't use the view fragments in <code>caboose/views/_bsfields</code>,
as it appears they are styled for an earlier version of Bootstrap :(

The Bootstrap docs have an entire section on [working with forms](http://getbootstrap.com/css/#forms) - 
let's get some guidance there, starting with their "Basic example".

Our current <code>caboose/views/_fields/textfield.php</code> is

    <div><label for="{name}">{label}</label>
        <input type="text" id="{name}" name="{name}" value="{value}" maxLength="{maxlen}" size="size"  title="{explain}" {disabled}/>
    </div>

The Bootstrap example (for an email field) is

    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>

Put those together, and ours should instead be 

    <div class="form-group">
        <label for="{name}">{label}</label>
        <input type="text" class="form-control" id="{name}" placeholder="{label}"
            value="{value}" maxLength="{maxlen}" size="size"  title="{explain}" {disabled}>
    </div>

This looks a bit more stylin', although we still need to worry about using
the proper form field types.

<img class="scale" src="/pix/tutorials/fun/18.png"/>

We will have to make similar changes to any other view fragments we wish to use,
and I will have to update my Caboose repo!

##5. Use the Proper Field Types

The "menu code" corresponds to an <code>int</code> table column, but the <code>formfields</code> helper doesn't
provide for a form input element of type "number". We can leave that for now, and deal with it
in our form validation. This is not a "proper" or long term solution!

The "item name" corresponds to a string, so its form field is fine.

The "item description" corresponds to a larger text field, so we should
use a <code>textarea</code> input form field for it.

Following the example from the last step, we need to update 
<code>caboose/views/_fields/textarea.php</code> for
the current Bootstrap styling:

    <div class="form-group">
        <label for="{name}">{label}</label>
        <textarea class="form-control" id="{name}" name="{name}" value="{value}" 
            rows="{rows}" cols="{size}"  title="{explain}" {disabled}>{value}</textarea>
    </div>

and we will also have to modify the field creation, in our <code>edit()</code>
method...

    $this->data['fdescription'] = makeTextArea('Description', 'description', $record->description);

That wasn't so hard, and the result is more appropriate:

<img class="scale" src="/pix/tutorials/fun/22.png"/>

The "price field" corresponds to a decimal, and we again do not have a
<code>formfields</code> helper for that, so we will leave it as text.

The "picture" field, at the moment, is just the name of the menu item's
image file. We will fix that, including uploading a new image, in a later step.

The "category" field is something we can fix now. It corresponds to
a text field in the database, but is meant to be one of the valid category
codes This sounds like a "combobox" to me :)

Inside our <code>edit()</code>, we can use the combobox function instead of the 
textfield one, after setting up the codes to be displayed:

    $cats = $this->categories->all(); // get an array of category objects
    foreach($cats as $code => $category) // make it into an associative array
        $codes[$code] = $category->name;
    $this->data['fcategory'] = makeCombobox('Category', 'category', $record->category,$codes);

Alright - getting better all the time:

<img class="scale" src="/pix/tutorials/fun/23.png"/>

If we update <code>caboose/views/_fields/combofield.php</code>
to match the styling of the other fields...

    <div class="form-group">
        <label for="{name}">{label}</label>
        <select class="form-control" id="{name}" name="{name}" title="{explain}" {disabled}>
            {options}
                <option value="{val}" {selected}>{display}</option>
            {/options}
        </select>
    </div>

... then our editing form will have the same style throughout :)

<img class="scale" src="/pix/tutorials/fun/24.png"/>

##6. Wire the Form to Our Maintenance Controller

The form looks pretty, but there is no way to submit changes,
or to back out of any changes. We need to add a couple of buttons.

There is a <code>formfields</code> function for that ... let's use it inside <code>edit()</code>,
adding another view parameter before calling <code>render()</code>.
Further, let's distinguish between field view parameters (starting with an "f")
by having the button parameter names start with a "z".

    $this->data['zsubmit'] = makeSubmitButton('Save', 'Submit changes');

... and we need to update our <code>mtce-edit</code> view to show
this:

	{fcategory}
	{zsubmit}
    </form>

We get a submit button, but still styled the "old" way.

<img class="scale" src="/pix/tutorials/fun/25.png"/>


We can update it's styling, <code>caboose/views/_fields/submit.php</code>:

    <button class="btn btn-primary" type="submit" title="{title}">{label}</button>

and get the "new, improved" button appearance, with color!

<img class="scale" src="/pix/tutorials/fun/26.png"/>

We need to bind this to the appropriate location inside our app - let's
provide for a <code>save()</code> method for that.
We can make the change in our <code>mtce-edit</code> view, and
flesh out the method shortly. 

    <form action="/crud/save" method="post">

Clicking "save" will give a 404 until we fix that :-/

<img class="scale" src="/pix/tutorials/fun/27.png"/>

We want a "Cancel" button on the form too, but I would like it
to link to a <code>cancel()</code> method inside our CRUD
controller, so we can clear the session data.

We don't have a <code>formfields</code> function for that, so will need
to add the code ourselves, like we did for the
editing link inside the menu items list...

	{zsubmit} <a class="btn btn-default" role="button" href="/crud/cancel">Cancel</a>

Our form now "looks" complete, and we are ready to add the code
to handle the "Save" and "Cancel" methods.

<img class="scale" src="/pix/tutorials/fun/28.png"/>

##7. Handle Canceling an Edit

Our <code>cancel()</code> method needs to remove the item key and data transfer
object from our session, and re-display the menu list. This results in no change to the database.

Easy:

    function cancel() {
        $this->session->unset_userdata('key');
        $this->session->unset_userdata('record');
        $this->index();
    }

##Continued...

The tutorial has been split into two.
The next part is ci-fun02b.