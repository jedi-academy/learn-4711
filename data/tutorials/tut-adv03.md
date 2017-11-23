#Tutorial tut-adv03 - Making Our RESTful Client
COMP4711 - BCIT - Fall 2017


##1. Frontend "Database" Setup

Remove the CSV or XML file containing your todo items, in your `data` folder.

##2. Frontend Cruft?

There are no changes to the UI, or the controllers.

We will be modifying our <code>Tasks</code> model to make calls to the
backend instead retrieving data locally.

##3. Frontend Package

Install the <code>package-restful</code> package from the Jedi Academy.

This is basically downloading it, copying/merging so that the 
<code>application/third_party/restful</code>
code is in the proper place.

Don't forget to autoload the package in your <code>config/autoload</code>.

##4. Down to Work

Our front-end changes are all going to be in <code>models/Tasks</code>.

We need to over-ride any methods inherited from <code>XXX_Model</code> that refer
to the local file system.

Let's start by adding some standard configuration settings, so that your projects
will work on your system as well as mine :)

    /**
     * Modified to use REST client to get port data from our server.
     */
    define('REST_SERVER', 'http://backend.local');	// the REST server host
    define('REST_PORT', $_SERVER['SERVER_PORT']);	// the port you are running the server on


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

or instead of making a local file system reference like

    $xml = simplexml_load_file($this->_origin);

or

    fputcsv($handle, array_values((array) $record));

we will instead be making a REST call, like

		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		$result = $this->rest->get('job');
		return $result;

**Note** The above treats the backend webapp as the REST endpoint.
You could also treat the REST controller as the endpoint, in
which case you would make the REST call like this...

		$this->rest->initialize(array('server' => REST_SERVER . '/job'));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		$result = $this->rest->get('');
		return $result;

The trick is to use the correct HTTP method, and pass any
appropriate parameters.


We will need to override the `load` and `store` methods,
to work "across the net".


##5. Tasks::load()

Let's copy/paste the needed methods from <code>Memory_Model</code>,
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
