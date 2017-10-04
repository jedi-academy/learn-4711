#Tutorial tut-adv02 - Decoupling Our Diner
COMP4711 - BCIT - Fall 2016/Winter 2017

##Planning

Let's plan a few things before we start modifying code.

Your starting app(s) have a menu maintenance page, accessible
to the "admin" role. This is managed by the <code>Crud</code>
controller. It uses a <code>Menu</code> model to access the database table
where data is kept.

We are going to split the webapp functionality, so that all menu table maintenance
is performed on our "backend" app, which will have the menu items table,
and so that the "frontend" app sends requests to the "backend" one,
instead of attempting to access a menu items table in its database.

You will need to configure separate hostnames and virtual hosts for each of the apps.
let's use "backend.local" for the "backend" app, so that I don't have to mess
with configuration when I check your submissions. You can name the databases whatever
you want, as they will be handled by <code>config/development/database.php</code>
locally.

When the dust settles, there will be no visible difference when running the
"frontend" webapp. The magic happens behind the scenes.

The front-end webapp will have the following changes from the starter:

- <code>models/Menu</code> will be changed to make REST calls to the "backend"
- its database will have the <code>Menu</code> table eliminated
- you will incorporate the RESTful package from the Jedi Academy

The back-end webapp will have the following changes from the starter:

- the <code>Welcome</code> controller will exist, but only to show
a "go away" message
- you will add a <code>Maintenance</code> controller, which acts as a
REST server
- all other controllers are removed
- the only model you will have will be the <code>Menu</code> one; the others will be gone
- you will incorporate the RESTful package from the Jedi Academy

The above is effectively "splitting" the original app, through the <code>Menu</code> model.
Each of the apps will have a <code>Menu</code> model, but the "frontend" one
will only make REST requests to the "backend", and the "backend" <code>Menu</code>
model will work with the real database for menu items.

One thing that will make life easier: let's keep any menu item pictures in the
"frontend" app. We can rationalize this by saying that there could be different
front-ends, each with a potentially different user experience, which needs
UI/UX specific pictures. Yeah.

##1. Backend Database Setup

In the backend database, drop all but the <code>Menu</code> table.

Regenerate your SQL starter.

Make sure your local database configuration is setup.

##2. Backend Cruft Removal

Delete all controllers except <code>Welcome</code>.

Delete all models except <code>Menu</code>.

You will want to modify <code>config/autoload</code> so that CI does not attempt
to autoload the removed items, but we will need the <code>Database</code> and
<code>Parser</code> libraries, as well as the <code>Menu</code> model.

Simplify the base controller and <code>views/template</code> appropriately.

We can leave any other cruft for a future refactoring (right).

##3. Backend UI

Modify the <code>Welcome</code> controller to spit out a suitable
message, in case anyone asks for the app directly. Use the <code>example-ferries-server</code> 
as a guide.

##4. Backend Package

Install the <code>package-restful</code> package from the Jedi Academy.

This is basically downloading it, copying/merging so that the <code>application/third_party/restful</code>
code is in the proper place.

Don't forget to autoload the package in your <code>config/autoload</code>.

##5. Setup Your RESTful controller

Create a new controller, <code>Maintenance</code>, starting with the example server's <code>Ports</code>
controller.

Yours will load the <code>Menu</code> model, not the ferryschedules, of course.

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

OR ...

For individual entities, have the entity ID one of the named parameters
inside the payload. Eg. a request to "product/" with "id=123" inside the
payload.

Each of your methods  will
call the local model to perform relevant CRUD activity with your local database.

This will happen in the next few steps.

A good starting point (though not necessary) would be

	// Handle an incoming GET - cRud
	function index_get()
	{
		$this->response('ok', 200);
	}

	// Handle an incoming PUT - crUd
	function index_put()
	{
		$this->response('ok', 200);
	}

	// Handle an incoming POST - Crud
	function index_post()
	{
		$this->response('ok', 200);
	}

	// Handle an incoming DELETE - cruD
	function index_delete()
	{
		$this->response('ok', 200);
	}

Incoming calls are automatically mapped to the correct method, as specified 
above. The package readme has more explanation.

The parameter explanation suggests that we should use a parameter name
of "id", rather than "code", which I had planned originally. This is reflected in
the rest of the tutorial following.


##5. Maintenance::index_get()

This is the "read" aspect of CRUD.

We can check for the existence of a "code" parameter, and return just that one item
if the parameter is provided, or else all of them.

    // Handle an incoming GET ... return a menu item or all of them
    function index_get()
    {
        $key = $this->get('id');
        if (!$key)
        {
            $this->response($this->menu->all(), 200);
        } else
        {
            $result = $this->menu->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Menu item not found!'), 404);
        }
    }

Try it ... in your browser, open "backend.local/maintenance" and you should see
all of the menu items. "backend/maintenance?id=6" should show you donut data 
(for example).

This works because browser requests are sent as HTTP GETs.

##5b. Getting a single item

If you want to have the menu item ID in the URI itself, you will
need an additional method ... let's use "item"...

    // Handle an incoming GET ... return 1 menu item
    function item_get()
    {
        $key = $this->get('id');
        $result = $this->menu->get($key);
        if ($result != null)
            $this->response($result, 200);
        else
            $this->response(array('error' => 'Menu item not found!'), 404);        
    }

And you would reference that with "backend/maintenance/item/id/6".

Your call. I suggest both approaches for the GET and DELETE verbs,
to accommodate alternate parameter passing, and just the "index"
approach for POST and PUT, if you can make sure that the item
ID is part of the payload.

##5c. Specifying response format

In <code>application/third_party_restful/config/rest.php</code>, you
can change the default response format. Experiement with the different
choices, and pick the one you are most comfortable with. This may end
up being handy later, for debugging.

The package readme explains more alternatives :)

Now, all we have to do is call this properly, from our client. That's coming.


##6. Adding a new menu item

This will be, you guessed it, the <code>index_post()</code> method.

If the item ID is passed in the payload, eg POST to "/maintenance" ...

    // Handle an incoming POST - add a new menu item
    function index_post()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $_POST);
        $this->menu->add($record);
        $this->response(array('ok'), 200);
    }

If the item ID is passed as part of the URI,
eg POST to "/maintenance/item/id/123" ...

    // Handle an incoming POST - add a new menu item
    function item_post()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $_POST);
        $this->menu->add($record);
        $this->response(array('ok'), 200);
    }

Choose one, or both. Your choice here will dictate
how this gets called client-side.

We can't test this directly, but we can be ready.

##7. And the other CRUD parts?

Again, you have choices ... either one or the other technique,
or both, for instance handling a PUT to "/maintenance" with the
id passed in the payload, or a PUT to "/maintenance?id=123"

    // Handle an incoming PUT - update a menu item
    function index_put()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $this->_put_args);
        $this->menu->update($record);
        $this->response(array('ok'), 200);
    }

And the same for incoming DELETE requests, for instance handling
a DELETE to "/maintenance/item/id/123" with

    // Handle an incoming DELETE - delete a menu item
    function item_delete()
    {
        $key = $this->get('id');
        $this->menu->delete($key);
        $this->response(array('ok'), 200);
    }

You'll notice that we are just mapping requests to the appropriate "real"
code. Our <code>Menu</code> model doesn't change, and our REST controller
doesn't get more complicated than this!

There is a hiccup, though. Some of what we want to do on the front-end
isn't just CRUD, for instance getting validation rules.
That would suit an RPC call instead of a RESTful call, if we wanted that
to come from the backend model, and that is a job
for another day. We could always leave them in the frontend "model", hmmm.

##8. Frontend Database Setup

In the frontend database, drop just the <code>Menu</code> table.

Regenerate your SQL starter.

Make sure your local database configuration is setup.

##9. Frontend Cruft?

There are no changes to the UI, or the controllers.

We will be modifying our <code>Menu</code> model to make calls to the
backend instead of the CI database driver.

##9. Frontend Package

Install the <code>package-restful</code> package from the Jedi Academy.

This is basically downloading it, copying/merging so that the 
<code>application/third_party/restful</code>
code is in the proper place.

Don't forget to autoload the package in your <code>config/autoload</code>.

##10. Down to Work

Our front-end changes are all going to be in <code>models/Menu</code>.

We need to over-ride any methods inherited from <code>MY_Model</code> that use 
CI database code

Let's start by adding some standard configuration settings, so that your projects
will work on your system as well as mine :)

    /**
     * Modified to use REST client to get port data from our server.
     */
    define('REST_SERVER', 'http://backend.local');	// the REST server host
    define('REST_PORT', $_SERVER['SERVER_PORT']);				// the port you are running the server on


ps - use the <code>Ferryschedule</code> model from the example-ferries-server repo
as a guide.

We need to load the REST support goodies, in our constructor...

    //*** Explicitly load the REST libraries. 
    $this->load->library(['curl', 'format', 'rest']);


You will notice a common pattern: instead of making a database call, like

		$this->db->where($this->_keyField, $key);
		$query = $this->db->get($this->_tableName);
		if ($query->num_rows() < 1)
			return null;
		return $query->row();

we will instead be making a REST call, like

		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		$result = $this->rest->get('maintenance');
		return $result;

**Note** The above treats the backend webapp as the REST endpoint.
You could also treat the REST controller as the endpoint, in
which case you would make the REST call like this...

		$this->rest->initialize(array('server' => REST_SERVER . '/maintenance'));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		$result = $this->rest->get('');
		return $result;

The trick is to use the correct HTTP method, and pass any
appropriate parameters.

We will have an issue with <code>Menu</code> extending <code>MY_Model</code>,
since the superclass is so tightly bound with our database. 
We have two choices: hace it instead "implement Data_Mapper", or have
it just "extends CI_Model", and we can provide only the
methods we will need.

The latter approach is not as robust or expandable, but it is much simpler,
and appropriate to our purposes.

We will need to implement the **all, get, create, delete, exists, update, and add** methods.
These are the model methods used in our Crud controller. 
There is a bit of a problem: exists & create, as used in our model, are not HTTP methods;
we will have to handle them specially.

So, have your <code>Menu</code> extend CI_Model, and we will get down to work.

##11. Menu::all()

Let's copy/paste the needed methods from <code>MY_Model</code>,
so that we have a base point to work from. We just then need to "fix" each one.

Our model's **all()** method is one aspect of CRUD retrieving.

It starts out as

	// Return all records as an array of objects
	function all()
	{
		$this->db->order_by($this->_keyField, 'asc');
		$query = $this->db->get($this->_tableName);
		return $query->result();
	}

Translating that into a REST call gives...

	// Return all records as an array of objects
	function all()
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/maintenance');
	}

Try it - After making this change, your CRUD page should still show a list of menu items,
except they are coming from the backend server.

##12. Menu::get($key)

Our model's **get($key)** method is another aspect of CRUD retrieving,
for a single record.

It starts out as

	// Retrieve an existing DB record as an object
	function get($key, $key2 = null)
	{
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		$result = $this->rest->get('maintenance');
		return $result;
		$this->db->where($this->_keyField, $key);
		$query = $this->db->get($this->_tableName);
		if ($query->num_rows() < 1)
			return null;
		return $query->row();
	}

Translating that into REST calls gives...

	// Retrieve an existing DB record as an object
	function get($key, $key2 = null)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/maintenance/item/id/' . $key);
	}

The URL we ask for has the menu item key added to it, but the rest looks the
same.

Try it - After making this change, clicking on an item to edit it should
bring up the item fields, but coming from the backend server.

##13. Menu::create()

Our model's **create()** method is not part of CRUD, but instead a convenience
method intended to return an empty record, with properties per the database
table.

It starts out as

	// Create a new data object.
	// Only use this method if intending to create an empty record and then
	// populate it.
	function create()
	{
		$names = $this->db->list_fields($this->_tableName);
		$object = new StdClass;
		foreach ($names as $name)
			$object->$name = "";
		return $object;
	}

There is no translation possible.
We will have to fake it for now, by hacing an array of properties to inject
as fields :(

	// Create a new data object.
	// Only use this method if intending to create an empty record and then
	// populate it.
	function create()
	{
		$names = ['id','name','description','price','picture','category'];
		$object = new StdClass;
		foreach ($names as $name)
			$object->$name = "";
		return $object;
	}

##14. Menu::delete()

Our model's **delete($key)** method is a standard CRUD capability :)

It starts out as

	// Delete a record from the DB
	function delete($key, $key2 = null)
	{
		$this->db->where($this->_keyField, $key);
		$object = $this->db->delete($this->_tableName);
	}


That gets translated to the appropriate HTTP method.

	// Delete a record from the DB
	function delete($key, $key2 = null)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->delete('/maintenance/item/id/' . $key);
	}

##15. Menu::exists($key)

Our model's **exists($key)** method is not a standard CRUD capability,
but we can fake it.

It starts out as

	// Determine if a key exists
	function exists($key, $key2 = null)
	{
		$this->db->where($this->_keyField, $key);
		$query = $this->db->get($this->_tableName);
		if ($query->num_rows() < 1)
			return false;
		return true;
	}

Here is one (expensive) way to possibly handle this:

	// Determine if a key exists
	function exists($key, $key2 = null)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            $result = $this->rest->get('/maintenance/item/id/' . $key);
            return ! empty($result);
	}

##16. Menu::update($record)

Our model's **update($record)** method is a standard CRUD capability,
but we can fake it :)

It starts out as

	// Update a record in the DB
	function update($record)
	{
		// convert object to associative array, if needed
		if (is_object($record))
		{
			$data = get_object_vars($record);
		} else
		{
			$data = $record;
		}
		// update the DB table appropriately
		$key = $data[$this->_keyField];
		$this->db->where($this->_keyField, $key);
		$object = $this->db->update($this->_tableName, $data);
	}

And the translation... 

	// Update a record in the DB
	function update($record)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            $retrieved = $this->rest->put('/maintenance/item/id/' . $record['code'], $record);
 	}


##17. Menu::add($record)

Our model's **add($$record)** method is also a standard CRUD capability,
but we can fake it :)

It starts out as

	// Add a record to the DB
	function add($record)
	{
		// convert object to associative array, if needed
		if (is_object($record))
		{
			$data = get_object_vars($record);
		} else
		{
			$data = $record;
		}
		// update the DB table appropriately
		$key = $data[$this->_keyField];
		$object = $this->db->insert($this->_tableName, $data);
	}

And the translation...

	// Add a record to the DB
	function add($record)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            $retrieved = $this->rest->post('/maintenance/item/id/' . $record['code'], $record);
 	}

##18. Are We There Yet?

Barring hiccups, yes we are there.

This isn't the only way to split an app apart, but it works well for CRUD :)

In case you haven't gathered, there is a lot of flexibility, and a number of 
ways you can claim to be "RESTful"!!
