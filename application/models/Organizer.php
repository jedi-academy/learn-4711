<?php

/**
 * Model for a course organizer
 */
class Organizer extends CI_Model
{

	protected $xml; // root element of our data structure

	/**
	 * Constructor.
	 */

	public function __construct()
	{
		parent::__construct();
		$this->xml = simplexml_load_file(DATAPATH.'organizer.xml');
		$this->extract();
	}

	/**
	 * Return the course organizer, in its SimpleXML form
	 */
	public function raw()
	{
		return $this->xml;
	}

	/**
	 * Extract the organizer data for later convenience
	 */
	private function extract()
	{
		$this->weeks = array ();
		foreach ($this->xml->week as $plan)
		{
			$week = new stdClass();
			$week->num = (string) $plan['num'];
			$week->topic = (string) $plan->topic;
			$week->outcomes = (string) $plan->outcomes;
			$week->inlab = (string) $plan->inlab;

			$week->activities = array ();
			foreach ($plan->children() as $candidate)
			{
				$whatzit = $candidate->getName();
				if ( ! in_array($whatzit, ['topic', 'outcomes', 'inlab']))
				{
					$week->activities[] = $candidate;
				}
			}

			$this->weeks[$week->num] = $week;
		}
	}

	/**
	 * Find & return an activity in the organizer
	 */
	public function activity($category, $name)
	{
		$activity = new stdClass();
		$activity->category = $category;
		$activity->name = $name;

		foreach ($this->xml->week as $week)
		{
			foreach ($week->children() as $one)
			{
				if ($one->getName() == $category)
				{
					if ($name == (string) $one['name'])
					{

						// this is the one
						$activity->type = (string) $one['type'];
						if (empty($activity->type)) $activity->type = $activity->category;
						$activity->title = (string) $one;
						$activity->duedate = (string) $one['duedate'];
						$activity->link = (string) $one['link'];
						$activity->domain = (string) $one['domain'];
						$activity->icon = (string) $one['icon'];
						$activity->survey = (string) $one['survey'];
						$activity->active = (string) $one['active'];					
						return $activity;
					}
				}
			}
		}
		return null;
	}

	/**
	 * Find the followup activity for another, according to the organizer
	 */
	public function followup($activity)
	{
		$target = $activity->name;  // what we are looking for
		$thereyet = false;  // have we found it?
		// iterate through the organizer
		foreach ($this->xml->week as $week)
		{
			foreach ($week->children() as $one)
			{
				if (isset($one['name']))
				{
					// this is *an* activity
					if ($thereyet)
					{
						// this *is* the next activity
						$follower = new stdClass();
						$follower->category = $one->getName();
						$follower->name = (string) $one['name'];
						$follower->type = (string) $one['type'];
						$follower->title = (string) $one;
						$follower->duedate = (string) $one['duedate'];
						$follower->link = (string) $one['link'];
						$follower->domain = (string) $one['domain'];
						return $follower;
					}
					elseif ($target == (string) $one['name'])
					{
						// we have found our target. now look for the next activity
						$thereyet = true;
					}
				}
			}
		}

		// we either didn't find our target, or there is nothing after it
		return null;
	}

	/**
	 * Build the internal tags for an activity.
	 * Return them as an associative array of tag=>slide# pairs
	 */
	public function tags($activity)
	{
		$number = 0; // slide # we are at
		$tags = array ();

		$filename = DATAPATH.$activity->category.'s/'.$activity->name.'.xml';
		if (file_exists($filename))
		{
			$xml = simplexml_load_file($filename);
			foreach ($xml->slide as $slide)
			{
				$number ++;
				if (isset($slide['tag']))
				{
					$tags[(string) $slide['tag']] = 'slide'.$number;
				}
			}
		}

		return $tags;
	}

		/**
	 * Find an activity, and determine what kind of thing it is
	 */
	public function kind($category,$name)
	{
		$filetype = "";
		
		// is it an S5 slideshow, in XML?
		$filename = DATAPATH.$category.'s/'.$name.'.xml';
		if (file_exists($filename)) $filetype = "xml";

		// is it a Markdown file?
		$filename = DATAPATH.$category.'s/'.$name.'.md';
		if (file_exists($filename)) $filetype = "md";
	
		// is it a restructured text file?
		$filename = DATAPATH.$category.'s/'.$name.'.rst';
		if (file_exists($filename)) $filetype = "rst";
		
			// is it a PDF, ready to roll?
		$filename = DATAPATH.$category.'s/'.$name.'.pdf';
		if (file_exists($filename)) $filetype = "pdf";
	
		return $filetype;
	}


}
