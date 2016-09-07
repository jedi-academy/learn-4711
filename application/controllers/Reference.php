<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Reference.php
 *
 * Present the course reference, i.e. learning activites according to activity type
 * 
 * Learn CodeIgniter website, template driven
 *
 */
//FIXME - not sure this belongs any more
class Reference extends Application
{

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Default entry point
	 */
	function index()
	{
		$course = $this->course->metadata();
		$this->data = array_merge($this->data, (array) $course);

		$this->data['reference'] = $this->format_reference(
			$this->course->materials(), $this->course->organizer());

		$this->data['pagetitle'] = $course->title;
		$this->data['pagebody'] = 'reference';
		$this->render();
	}

	/**
	 * Extract & format the materials & resorces by activity type
	 */
	private function format_reference($materials, $stuff)
	{
		// Recognized activity types
		$valid = array ('lesson', 'video', 'tutorial', 'lab',
			'assignment', 'example', 'github');

		$num = 1;
		$result = '';
		foreach ($materials as $activity_name => $group)
		{
			$partial = '';
			foreach ($group as $type => $item)
			{
				// Make a pass through the organizer for this kind of activity
				foreach ($stuff as $week)
				{
					foreach ($week->children() as $activity)
					{
						$activity_type = $activity->getName();
						if ($activity_type != $type) continue;

						$mytype = (string) isset($activity['type']) ?
							$activity['type'] : $activity->getName();
						if (in_array($type, $valid))
						{
							$item = (string) $activity;
							$name = (string) $activity['name'];
							$duedate = (string) isset($activity['duedate']) ?
								' (due '.$activity['duedate'].')' : '';
							$parms = array ('type'		 => $mytype, 'item'		 => $item,
								'name'		 => $name, 'typed'		 => ucfirst($type),
								'duedate'	 => $duedate);
							$site = (string) isset($activity['domain']) ?
								'http://'.$activity['domain'] : '';
							$parms['site'] = $site;
							$partial .= $this->parser->parse('theme/_activity', $parms, true);
						}
					}
				}
			}
			$parms = array ('name' => $activity_name, 'items' => $partial, 'num' => $num ++);
			$result .= $this->parser->parse('theme/_group', $parms, true);
		}
		return $result;
	}

}

/* End of file Reference.php */
