<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Welcome.php
 *
 * Present the course homepage.
 * 
 * Learn CodeIgniter website, template driven
 *
 */
//FIXME - maybe this should generate the sidebar?
class Welcome extends Application
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

		$this->data['organizer'] = $this->format_organizer($this->organizer->raw());

		$this->data['pagetitle'] = $course->title;
		$this->data['pagebody'] = 'learn';
		$this->render();
	}

	/**
	 * Extract & format the materials & resources, by week
	 */
	private function format_organizer($stuff)
	{
		$num = 1;

		// Recognized activity types
		$valid = array ('lesson', 'video', 'tutorial', 'lab',
			'assignment', 'example', 'github', 'download', 'pdf');

		$result = '';
		foreach ($stuff as $week)
		{
			$number = (int) $week['num'];
			$topic = (string) $week->topic;

			// Collect the activities for this week
			$partial = '';
			foreach ($week->children() as $activity)
			{
				$type = (string) isset($activity['type']) ?
					$activity['type'] : $activity->getName();
				if (in_array($type, $valid))
				{
					$item = (string) $activity;
					$name = (string) $activity['name'];
					$pdf = (string) $activity['pdf'];
					$active = ((string) $activity['active']) != 'n';
					$duedate = (string) isset($activity['duedate']) ?
						' (due '.$activity['duedate'].')' : '';
					$parms = array ('type'		 => $type, 'item'		 => $item,
						'name'		 => $name, 'typed'		 => ucfirst($type),
						'duedate'	 => $duedate, 'pdf'		 => $pdf);
					$site = (string) isset($activity['domain']) ?
						'http://'.$activity['domain'] : '';
					$parms['site'] = $site;
					$download = (string) isset($activity['pdf']) ?
						$this->parser->parse('theme/_download', $parms, true) : '';
					$parms['download'] = $download;
//		    $target = ($type == 'pdf') ? 'theme/_simple_activity' : 'theme/_activity';
					$target = $active ? 'theme/_activity' : 'theme/_almost';
					$partial .= $this->parser->parse($target, $parms, true);
				}
			}

			$parms = array ('number'	 => $number, 'topic'		 => $topic,
				'activities' => $partial, 'num'		 => $num ++);
			$result .= $this->parser->parse('theme/_week', $parms, true);
		}
		return $result;
	}

	/**
	 * Extract & format the learning resources
	 */
	private function format_resources($resources)
	{
		$result = '';
		foreach ($resources as $resource)
		{
			$result .= $this->parser->parse('theme/_resource', (array) $resource, true);
		}
		return $result;
	}

}
