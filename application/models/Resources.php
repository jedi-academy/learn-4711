<?php

/**
 * Model for the resources useful for a course
 */
class Resources extends CI_Model
{

	protected $xml; // root element of our data structure

	/**
	 * Constructor.
	 */

	public function __construct()
	{
		parent::__construct();

		$this->xml = simplexml_load_file(DATAPATH.'resources.xml');
	}

	/**
	 * Load & return the materials provided, converted to standard types.
	 */
	public function all()
	{
		$result = array ();

		// Build the resource groups
		foreach ($this->xml->group as $group)
		{
			$bundle = array ();
			$name = (string) $group['name'];

			foreach ($group->resource as $item)
			{
				$resource = new stdClass();
				$resource->name = (string) $item->name;
				$resource->link = (string) $item->link;
				$resource->desc = (string) $item->desc;
				$bundle[] = $resource;
			}
			$result[$name] = $bundle;
		}

		// All done
		return $result;
	}

}
