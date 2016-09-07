<?php

/**
 * Model for a course syllabus, with data derived from data/syllabus.xml
 */
class Syllabus extends CI_Model
{

	protected $xml; // root element of our data structure

	/**
	 * Constructor.
	 */

	public function __construct()
	{
		parent::__construct();

		$this->xml = simplexml_load_file(DATAPATH.'syllabus.xml');
	}

	/**
	 * Accessor for course metadata structure.
	 * Convert everything to standard types.
	 */
	public function metadata()
	{
		$result = new stdClass();

		// Add all the basic metadata fields
		$result->code = (string) $this->xml->code;
		$result->title = (string) $this->xml->title;
		$result->subtitle = (string) $this->xml->subtitle;
		$result->author = (string) $this->xml->author;
		$result->email = (string) $this->xml->email;
		$result->school = (string) $this->xml->school;
		$result->site = (string) $this->xml->site;
		$result->summary = (string) $this->xml->summary;

		// Return the sanitized and serializable object
		return $result;
	}

	/**
	 * Extract the outcomes as a deep array
	 */
	public function outcomes()
	{
		$result = array ();
		foreach ($this->xml->outcomes->ol as $outcome)
		{
			$one = new stdClass();
			$one->desc = (string) $outcome;

			$suboutcomes = array ();
			foreach ($outcome->li as $sub)
			{
				$suboutcomes[] = (string) $sub;
			}
			$result[] = $one;
		}
		return $result;
	}

}
