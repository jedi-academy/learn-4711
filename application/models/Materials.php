<?php

/**
 * Model for the materials used in a course
 */
class Materials extends CI_Model
{

	protected $xml; // root element of our data structure

	/**
	 * Constructor.
	 */

	public function __construct()
	{
		parent::__construct();

		$this->xml = simplexml_load_file(DATAPATH.'materials.xml');
	}

	/**
	 * Load & return the materials provided, converted to standard types.
	 */
	public function all()
	{
		$result = array ();

		// Build the material groups
		foreach ($this->xml->group as $group)
		{
			$bundle = array ();
			$name = (string) $group['name'];

			foreach ($group->item as $item)
			{
				$bundle[(string) $item['type']] = (string) $item;
			}
			$result[$name] = $bundle;
		}

		// All done
		return $result;
	}

}
