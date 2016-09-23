<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 */
class Application extends CI_Controller
{

	protected $data = array ();   // parameters for view components
	protected $id;   // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & set a couple up
	 */

	function __construct()
	{
		parent::__construct();
		$this->data = array ();
		$this->data['title'] = 'COMP4711 - Webapp Development';
		$this->data['coursetitle'] = 'COMP4711 - Webapp Development';
		$this->errors = array ();
		$this->data['datapath'] = DATAPATH;
		$this->template = 'theme/template';
	}

	/**
	 * Render this page
	 */
	function render()
	{
		if ( ! isset($this->data['pagetitle'])) $this->data['pagetitle'] = $this->data['title'];

		// Massage the menubar
		$choices = $this->config->item('menu_choices');
		foreach ($choices['menudata'] as &$menuitem)
		{
			$menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
		}
		$this->data['menubar'] = $this->parser->parse('theme/menubar', $choices, true);

		$this->data['footerbar'] = $this->parser->parse('theme/menubar', $this->config->item('footer_choices'), true);

		// render the content if needed
		if ( ! isset($this->data['content']))
		{
			$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		}

		// title for all but the homepage
		$layout = empty($this->data['title']) ? 'jumbotitle' : 'title';
		$this->data['titleblock'] = $this->parser->parse('theme/'.$layout, $this->data, true);

		// how about a sidebar and some news?
		$this->data['sidebar'] = $this->info();
		$this->data['news'] = $this->news();

		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse($this->template, $this->data);
	}

	/**
	 * Construct course info, to present in the sidebar
	 */
	private function info()
	{
		$data = file_get_contents(DATAPATH.'sidebar.md');
		$result = $this->parsedown->text($data);
		$result = $this->parser->parse_string($result, $this->data, true);
		return $result;
	}

	/**
	 * Construct news section
	 */
	private function news()
	{
		$data = file_get_contents(DATAPATH.'news.md');
		$result = $this->parsedown->text($data);
		$result = $this->parser->parse_string($result, $this->data, true);
		return $result;
	}

}
