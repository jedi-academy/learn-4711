#Tutorial tut-adv02 - Decoupling Our Diner
COMP4711 - BCIT - Fall 2016

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

We need to implement four methods, one for each of the main HTTP types. Each of these will
call the local model to perform relevant CRUD activity with your local database.

Incoming calls are automatically mapped to the correct method.

Remember "RESTful" ... one of the conventions used by the package we are using
is to have parameter names as part of the request URL. For instance, <code>/maintenance</code>
is a GET with no parameters, while <code>/maintenance/code/123</code> is a GET request
with the "code" parameter set to "123". We will use this as needed.

##5. Maintenance::index_get()

This is the "read" aspect of CRUD.

We can check for the existence of a "code" parameter, and return just that one item
if the parameter is provided, or else all of them.

    // Handle an incoming GET ... return a menu item or all of them
    function index_get()
    {
        $key = $this->get('code');
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
all of the menu items. "backend/maintenance/code/6" should show you donut data 
(for example).

This works because browser requests are sent as HTTP GETs.

In <code>application/third_party_restful/config/rest.php</code>, you
can change the default response format. Experiement with the different
choices, and pick the one you are most comfortable with. This may end
up being handy later, for debugging.

Now, all we have to do is call this properly, from our client. That's coming.


##6. Adding a new menu item

This will be, you guessed it, the <code>index_post()</code> method.

We have to retrieve the menu item identifier form the URL, but that isn't hard...

    // Handle an incoming POST - add a new menu item
    function index_post()
    {
        $key = $this->get('code');
        $record = array_merge(array('code' => $key), $_POST);
        $this->menu->add($record);
        $this->response(array('ok'), 200);
    }

We can't test this yet, but we can be ready.

##7. And the other CRUD parts?

    // Handle an incoming PUT - update a menu item
    function index_put()
    {
        $key = $this->get('code');
        $record = array_merge(array('code' => $key), $this->_put_args);
        $this->menu->update($record);
        $this->response(array('ok'), 200);
    }

    // Handle an incoming DELETE - delete a menu item
    function index_delete()
    {
        $key = $this->get('code');
        $this->menu->delete($key);
        $this->response(array('ok'), 200);
    }

You'll notice that we are just mapping requests to the appropriate "real"
code. Our model doesn't change, and our REST controller
doesn't get more complicated than this!

There is a hiccup, though. Some of what we want to do on the front-end
isn't just CRUD, for instance getting validation rules.
That would suit an RPC call instead of a RESTful call, and that is a job
for another day. We could perhaps somehow leave them in the frontend, hmmm.

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

This is basically downloading it, copying/merging so that the <code>application/third_party/restful</code>
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

The trick is to use the correct HTTP method, and pass any
appropriate parameters.

We will have an issue with <code>Menu</code> extending <code>MY_Model</code>,
since the superclass is so tightly bound with our database. 
We have two choices: hace it instead "implement Data_Mapper", or have
it just "extends CI_Model", and we can provide only the
methods we will need.

The latter approach is not as robust or expandable, but it is much simpler,
and appropriate to our purposes.

We will need to implement the all, get, create, delete, exists, update, and add methods.
These are the ones used in our Crud controller.

So, have your <code>Menu</code> extend CI_Model, and we wil get down to work.

##11. CRUD Retrieve

Let's copy/paste the needed methods from <code>MY_Model</code>,
so that we have a base point to work from. We just then need to "fix" each one.

CRUD retrieving will be the all() and get() methods from our list.

They start out as

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

	// Return all records as an array of objects
	function all()
	{
		$this->db->order_by($this->_keyField, 'asc');
		$query = $this->db->get($this->_tableName);
		return $query->result();
	}

Translating that into REST calls gives...

	// Retrieve an existing DB record as an object
	function get($key, $key2 = null)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/maintenance/code/' . $which);
	}

	// Return all records as an array of objects
	function all()
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('/maintenance/' . $which);
	}

Try it - After making this change, your CRUD oage should still show a list of menu items,
except they are coming from the backend server.

##12. 