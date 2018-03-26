#Tutorial tut-adv03 - Making Our RESTful Client
COMP4711 - BCIT - Fall 2017

<div class="alert alert-danger">
The original REST requests below referred to the endpoint <code>/job</code>.
The leading slash in the reference is unneeded, and may cause issues.
</div>


##1. Frontend "Database" Setup

Remove the CSV or XML file containing your todo items, in your `data` folder.

##2. Frontend Cruft?

There are no changes to the UI, or the controllers.

We will be modifying our <code>Tasks</code> model to make calls to the
backend instead of retrieving data locally.

##3. Frontend Package

Install the <code>package-restful</code> package from the Jedi Academy.

This is basically downloading it, copying/merging so that the 
<code>application/third_party/restful</code>
code is in the proper place.

Don't forget to autoload the package in your <code>config/autoload</code>.

<div class="alert alert-danger">
The restful package needed its Curl::put method updated, to properly
pass parameters between client and server. Make sure that your
local copy is up-to-date in your app! The <code>package-restful</code> repo was
updated 2017.12.01 at 11:00.
</div>

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

We need to load the REST support goodies; add them to your existing
`config/autoload`...

    $autoload['libraries'] = array(..., 'curl', 'format', 'rest');

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

The `load()` method looks like this to begin with:

    // load the $this->_data array
    ...

	// rebuild the keys table
	$this->reindex();

We just need to replace the "..." with the appropriate REST client code:

	// load our data from the REST backend
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            $this->_data =  $this->rest->get('job');

	// rebuild the field names from the first object
        $one = array_values((array) $this->_data);
	$this->_fields = array_keys((array)$one[0]);

<div class="alert alert-danger">
The original code snippet above was missing the three lines to rebuild
the field names.
</div>

Try it - After making this change, your CRUD page should still show a list of todo items,
except they are coming from the backend server.

##6. Tasks::store()

Oh no - we have a CRUD disconnect. Storing an entire collection is not one of the standard CRUD methods,
the way we have implemented our memory model. We have two choices -
add a "store" method to our backend, or dive a bit
deeper into our existing model to find code that should work
across the net.

The latter is a "better" approach. 

We should modify our store() method so that it doesn't do anything,
forcing us to do CRUD properly.

	protected function store()
	{
	}

Now we can translate each of the CRUD methods inherited from Memory_Model
to work with our backend.

##7. Tasks::get()

Our model's **get($key)** method is one of the CRUD functions that needs to be adapted.

It starts out, in Memory_Model, as

	// Retrieve an existing collection record as an object
	function get($key, $key2 = null)
	{
		return (isset($this->_data[$key])) ? $this->_data[$key] : null;
	}

Translating that into REST calls gives...

	// Retrieve an existing DB record as an object
	function get($key, $key2 = null)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            return $this->rest->get('job/' . $key);
	}

The URL we ask for has the todo item key added to it, but the rest looks the
same as our earlier plan.

Try it - After making this change, clicking on an item to edit it should
bring up the item fields, but coming from the backend server.

##8. Tasks::delete()

Our model's **delete($key)** method is a standard CRUD capability :)

It starts out as

	// Delete a record from the DB
	function delete($key, $key2 = null)
	{
		if (isset($this->_data[$key]))
		{
			unset($this->_data[$key]);
			$this->store();
		}
	}


That gets translated to the appropriate HTTP method.

	// Delete a record from the DB
	function delete($key, $key2 = null)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            $this->rest->delete('job/' . $key);
            $this->load(); // because the "database" might have changed
	}

##9. Tasks::update($record)

Our model's **update($record)** method is a standard CRUD capability as well.

It starts out as

	// Update a record in the collection
	function update($record)
	{
		// convert object from associative array, if needed
		$record = (is_array($record)) ? (object) $record : $record;
		// update the collection appropriately
		$key = $record->{$this->_keyfield};
		if (isset($this->_data[$key]))
		{
			$this->_data[$key] = $record;
			$this->store();
		}
	}

And the translation... 

	// Update a record in the DB
	function update($record)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            $key = $record->{$this->_keyfield};
            $retrieved = $this->rest->put('job/' . $key, $record);
            $this->load(); // because the "database" might have changed
	}


##10. Tasks::add($record)

Our model's **add($$record)** method is also a standard CRUD capability.

It starts out as

	// Add a record to the collection
	function add($record)
	{
		// convert object from associative array, if needed
		$record = (is_array($record)) ? (object) $record : $record;

		// update the DB table appropriately
		$key = $record->{$this->_keyfield};
		$this->_data[$key] = $record;
	}

And the translation...

	// Add a record to the DB
	function add($record)
	{
            $this->rest->initialize(array('server' => REST_SERVER));
            $this->rest->option(CURLOPT_PORT, REST_PORT);
            $key = $record->{$this->_keyfield};
            $retrieved = $this->rest->post('job/' . $key, $record);
            $this->load(); // because the "database" might have changed
 	}

##11. Are We There Yet?

Barring hiccups, yes we are there. Delete the tasks data in your front-end app!

This isn't the only way to split an app apart, but it works well for CRUD :)

Our implementation is shy on error handling, and would **not** be recommended
for any sort of production or heavy duty application, but it should serve
to illustrate REST.

In case you haven't gathered, there is a lot of flexibility, and a number of 
ways you can claim to be "RESTful"!!
