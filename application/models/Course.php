<?php

/**
 * Class Course
 *
 * Model for a course, with data derived from data/course.xml
 */
class Course extends CI_Model
{

	protected $xml; // root element of our data structure

	/**
	 * Constructor.
	 */

	public function __construct()
	{
		parent::__construct();

		$this->xml = simplexml_load_file(DATAPATH.'course.xml');
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
		$result->outline = (string) $this->xml->outline;
		$result->session = (string) $this->xml->session;
		$result->license = (string) $this->xml->license;
		$result->school = (string) $this->xml->school;
		$result->site = (string) $this->xml->site;
		$result->ou = (string) $this->xml->ou;

		// Add the introduction, preserving nested elements
		$result->intro = (string) $this->xml->intro->asXML();

		// Return the sanitized and serializable object
		return $result;
	}

}
