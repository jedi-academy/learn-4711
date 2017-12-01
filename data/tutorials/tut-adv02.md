#Tutorial tut-adv02 - Making Our RESTful Resource Controller
COMP4711 - BCIT - Fall 2017

Don't forget to setup a virtual host mapping "backend.local" to this app.

##1. Backend Cruft Removal

Delete all controllers except <code>Welcome</code>.

We need all our models, and the base for them (`application/core`).

Simplify the base controller - it just needs its constructor; we don't need to render anything.
We _could_ get rid of it, but it is safer to keep it in case it proves useful later.

We need to keep `views/errors`, as that is part of CodeIgniter, but we can remove all
the other PHP files in the `views` folder, except `homepage.php`.

##2. Backend UI

Replace the contents of `views/homepage.php` with a message to the effect that
this is a server webapp.

Modify `controllers/Welcome` to display the modified homepage view.

##3. Backend Package

Install the <code>package-restful</code> package from the Jedi Academy.

This is basically downloading it, copying/merging so that the <code>application/third_party/restful</code>
code is in the proper place.

Don't forget to autoload the package in your <code>config/autoload</code>.

<div class="alert alert-danger">
The restful package needed its Curl::put method updated, to properly
pass parameters between client and server. Make sure that your
local copy is up-to-date in your app! The <code>package-restful</code> repo was
updated 2017.12.01 at 11:00.
</div>


##4. Setup Your RESTful controller

Create a new controller, <code>Job</code>, starting with the example server's <code>Ports</code>
controller.

Yours will load the <code>Tasks</code> model, not the ferryschedules, of course.
You can actually safely omit explicitly loading the model, since it is already
specified in `config/autoload`.

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

We need to add a routing rule to pass any segment after "job" as a
parameter to the `index()` method, which would not normally take a parameter.

    $route['job/(:any)'] = 'job/index/$1';

##5. Add CRUD method stubs

`Job` is intended to be a resource controller, with the intended
action handled by a suitable HTTP message. The `Rest_Controller`
in the "restful" package does this by mapping incoming
requests to same-named methods with the HTTP verb appended,
separated by an underscore.

A good starting point for the CRUD methods for `Job`  would be

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


##6. Job::index_get()

This is the "read" aspect of CRUD.

We can check for the existence of a "code" parameter, and return just that one item
if the parameter is provided, or else all of them.

Note that we are just routing the incoming request to an existing model method!

    // Handle an incoming GET ... return a menu item or all of them
    function index_get($key=null)
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


##6b. Specifying response format

In <code>application/third_party_restful/config/rest.php</code>, you
can change the default response format. Experiment with the different
choices, and pick the one you are most comfortable with. This may end
up being handy later, for debugging.

The package readme explains more alternatives :)

Now, all we have to do is call this properly, from our client. That's coming.


##7. Adding a new todo item

This will be, you guessed it, the <code>index_post()</code> method.

The item ID is passed as part of the URL, i.e. a POST to "job/77" would contain
the state of item #77 in the HTTP message payload.

    // Handle an incoming POST - add a new todo item
    function index_post($key=null)
    {
        $record = array_merge(array('id' => $key), $_POST);
        $this->tasks->add($record);
        $this->response(array('ok'), 200);
    }

We can't test this directly, but we can be ready.

##8. And the other CRUD parts?

Do the same thing for updates...

    // Handle an incoming PUT - update a todo item
    function index_put($key=null)
    {
        $record = array_merge(array('id' => $key), $this->_put_args);
        $this->tasks->update($record);
        $this->response(array('ok'), 200);
    }

Note that we need to get at the PUT arguments a bit differently,
as they are not put into a PHP superglobal for us.

And similarly for incoming DELETE requests ...

    // Handle an incoming DELETE - delete a todo item
    function index_delete($key=null)
    {
        $this->tasks->delete($key);
        $this->response(array('ok'), 200);
    }

You'll notice that we are just mapping requests to the appropriate "real"
code. Our <code>Tasks</code> model doesn't change, and our REST controller
doesn't get more complicated than this!

<div class="alert alert-danger">
The original code snippet above incorrectly referred to the method <code>item_delete</code>.
</div>

##9. Are We There Yet?

Barring hiccups, the backend should be ready for business - CRUD business,
in any case.
