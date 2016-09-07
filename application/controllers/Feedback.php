<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Feedback.php
 *
 * Capture feedback about a course component
 *
 * ------------------------------------------------------------------------
 */
//FIXME - convert into D2L quiz widget
class Feedback extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	//-------------------------------------------------------------
	//  Default entry point
	//-------------------------------------------------------------

	function index()
	{
		// We should never enter here
		redirect('/');
	}

	/**
	 * Present the feedback form
	 */
	public function survey($category, $name)
	{
		$activity = $this->organizer->activity($category, $name);
		$course = $this->course->metadata();
		$this->data = array_merge($this->data, (array) $course);
		$this->data = array_merge($this->data, (array) $activity);

		//TODO - present list of choices
		if ($activity == null)
		{
			redirect('/');
			exit();
		}

		// Present the feedback form
		$this->data['pagebody'] = 'feedback';
		$this->render();
	}

	/**
	 * Process submitted feedback
	 */
	public function opinion($category, $name)
	{
		// Identify the file where feedback is stored
		$folder = './feedback/';
		$filename = $folder.$category.'-'.$name.'.csv';

		// Build a CSV line for feedback
		// date/time, category, lesson, useful, length, depth, suggestions, name
		$result = '';
		$result .= '"'.date('c').'"';
		$result .= ','.$this->input->post('useful');
		$result .= ','.$this->input->post('length');
		$result .= ','.$this->input->post('depth');

		$this->load->helper('text');
		$result .= ',"'.$this->input->post('suggestions', true).'"';
		$result .= ',"'.$this->input->post('yourname', true).'"';
		$result .= PHP_EOL;

		// Save the feedback
		$this->load->helper('file');
		$message = 'Your input has been recorded, and will be used to help make this course better :)';
		if ( ! write_file($filename, $result, 'a'))
		{
			$message = 'Unable to save feedback: ';
			$error = error_get_last();
			$message .= $error['message'];
		}
		$this->data['message'] = $message;

		// Be gracious
		$this->data['pagebody'] = 'thanks';
		$this->render();
	}

}

