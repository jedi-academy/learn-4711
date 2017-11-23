#Tutorial tut-adv02 - Making Our RESTful Server
COMP4711 - BCIT - Fall 2017

Don't forget to setup a virtual host mapping "backend.local" to this app.

##1. Backend Cruft Removal

Delete all controllers except <code>Welcome</code>.

We need all our models.

Simplify the base controller and <code>views/template</code> appropriately.
We don't need to render anything.

##2. Backend UI

Modify the <code>Welcome</code> controller to spit out a suitable
message, in case anyone asks for the app directly. Use the <code>example-ferries-server</code> 
as a guide.

##3. Backend Package

Install the <code>package-restful</code> package from the Jedi Academy.

This is basically downloading it, copying/merging so that the <code>application/third_party/restful</code>
code is in the proper place.

Don't forget to autoload the package in your <code>config/autoload</code>.

##4. Setup Your RESTful controller

Create a new controller, <code>Job</code>, starting with the example server's <code>Ports</code>
controller.

Yours will load the <code>Tasks</code> model, not the ferryschedules, of course.

We will need to implement methods for each of the main HTTP types expected
for each of your controller's "apparent" methods.
As an example, if your "foo" method is expected to handle either a POST or
a PUT request, then you would provide <code>foo_post()</code> and
<code>foo_put()</code> methods inside your REST controller.

The request remapping is based on apparent method names, so that a
"REST" request "product/123" would be interpreted as a request for the "123"
method of the "product" controller. Oops!
The "RESTful" way to handle that with this package is to have the method-free
requests (eg. "product/") deal with the aggregate, and to use a real method 
(eg. "product/item/123")
for individual entities.

We need to add a routing rule for this

    $route['job/$1'] = 'job/index/$1';
OR ...



A good starting point (though not necessary) would be

	// Handle an incoming GET - cRud
	function index_get($key=null)
	{
		$this->response('ok', 200);
	}

	// Handle an incoming PUT - crUd
	function index_put($key=null)
	{
		$this->response('ok', 200);
	}

	// Handle an incoming POST - Crud
	function index_post($key=null)
	{
		$this->response('ok', 200);
	}

	// Handle an incoming DELETE - cruD
	function index_delete($key=null)
	{
		$this->response('ok', 200);
	}

Incoming calls are automatically mapped to the correct method, as specified 
above. The package readme has more explanation.


##5. Job::index_get()

This is the "read" aspect of CRUD.

We can check for the existence of a "code" parameter, and return just that one item
if the parameter is provided, or else all of them.

    // Handle an incoming GET ... return a menu item or all of them
    function index_get($id=null)
    {
        if (!$key)
        {
            $this->response($this->tasks->all(), 200);
        } else
        {
            $result = $this->tasks->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Todo item not found!'), 404);
        }
    }

Try it ... in your browser, open "backend.local/job" and you should see
all of the menu items. "backend/job/6" should show you donut data 
(for example).

This works because browser requests are sent as HTTP GETs.


##5b. Specifying response format

In <code>application/third_party_restful/config/rest.php</code>, you
can change the default response format. Experiement with the different
choices, and pick the one you are most comfortable with. This may end
up being handy later, for debugging.

The package readme explains more alternatives :)

Now, all we have to do is call this properly, from our client. That's coming.


##6. Adding a new todo item

This will be, you guessed it, the <code>index_post()</code> method.

If the item ID is passed in the payload, eg POST to "/job" ...

    // Handle an incoming POST - add a new todo item
    function index_post($key=null)
    {
        $record = array_merge(array('id' => $key), $_POST);
        $this->tasks->add($record);
        $this->response(array('ok'), 200);
    }

We can't test this directly, but we can be ready.

##7. And the other CRUD parts?

Do the same thing for updates...

    // Handle an incoming PUT - update a menu item
    function index_put($key=null)
    {
        $record = array_merge(array('id' => $key), $this->_put_args);
        $this->tasks->update($record);
        $this->response(array('ok'), 200);
    }

And the same for incoming DELETE requests ...

    // Handle an incoming DELETE - delete a todo item
    function item_delete($key=null)
    {
        $this->tasks->delete($key);
        $this->response(array('ok'), 200);
    }

You'll notice that we are just mapping requests to the appropriate "real"
code. Our <code>Tasks</code> model doesn't change, and our REST controller
doesn't get more complicated than this!

There is a hiccup, though. Some of what we want to do on the front-end
isn't just CRUD, for instance getting validation rules.
That would suit an RPC call instead of a RESTful call, if we wanted that
to come from the backend model, and that is a job
for another day. We will leave those in the frontend for now.


##8. Are We There Yet?

Barring hiccups, the backend should be ready for business.
