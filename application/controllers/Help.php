<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * controllers/Help.php
 *
 * Explain how to use the slideshow
 * 
 * Learn CodeIgniter website, template driven
 *
 */
class Help extends Application
{

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();
		$this->template = 'theme/template_1';
	}

	/**
	 * Default entry point
	 */
	function index()
	{
		$course = $this->course->metadata();
		$this->data = array_merge($this->data, (array) $course);

		$source = file_get_contents(DATAPATH.'materials.md');
		$result = $this->parsedown->text($source);
		$this->data['materials'] = $result;

		$this->data['pagetitle'] = $course->title.' ~ Help';
		$this->data['pagebody'] = 'help';
		$this->render();
	}

	/**
	 * Extract & format the materials & resources
	 */
	private function format_materials($materials)
	{
		$num = 1;
		$result = '';
		foreach ($materials as $name => $group)
		{
			$partial = '';
			foreach ($group as $type => $item)
			{
				$parms = array ('type' => $type, 'item' => $item);
				$partial .= $this->parser->parse('theme/_item', $parms, true);
			}
			$parms = array ('name' => $name, 'items' => $partial, 'num' => $num ++);
			$result .= $this->parser->parse('theme/_heading', $parms, true);
			$result .= $partial;
		}
		return $result;
	}

	/**
	 * Present the resource list
	 */
	public function resources() {
		$course = $this->course->metadata();
		$this->data = array_merge($this->data, (array) $course);

		$source = file_get_contents(DATAPATH.'resources.md');
		$result = $this->parsedown->text($source);
		$this->data['stuff'] = $this->parser->parse_string($result, $this->data, true);

		$this->data['pagetitle'] = $course->title.' ~ Resources';
		$this->data['pagebody'] = 'generic';
		$this->render();
		
	}
	/**
	 * Present the syllabus
	 */
	public function syllabus() {
		$course = $this->course->metadata();
		$this->data = array_merge($this->data, (array) $course);

		$source = file_get_contents(DATAPATH.'syllabus.md');
		$result = $this->parsedown->text($source);
		$this->data['stuff'] = $this->parser->parse_string($result, $this->data, true);

		$this->data['pagetitle'] = $course->title.' ~ Syllabus';
		$this->data['pagebody'] = 'generic';
		$this->render();
		
	}
}


