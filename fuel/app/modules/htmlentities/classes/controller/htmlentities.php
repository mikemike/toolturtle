<?php

/**
 * Word Count Controller.
 *
 * Online tool to count length of a given string
 * 
 * @package  app
 * @extends  Controller
 */

namespace Htmlentities;

class Controller_Htmlentities extends \Controller_Template
{ 

	/**
	 * The tool
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{		
		$data = array();
		$val = \Validation::forge('my_validation');
		
		$val->add_field('toencode', 'HTML to encode', 'valid_string[utf8]');
		$val->add_field('todecode', 'HTML to encode', 'valid_string[utf8]');
		$val->set_message('required', 'You must specify some HTML to be encoded or decoded.');
		
		if ($val->run())
		{
			// process your stuff when validation succeeds
			$data['encoded'] = htmlentities(\Input::post('toencode'));
			$data['decoded'] = html_entity_decode(\Input::post('todecode'));
		}
		else
		{
			// validation failed
		}
		
		$data['val'] = $val;
		
		$this->template->tab = 'geek';
		$this->template->title = 'HTML Entities Tool';
        $this->template->content = \View::forge('index', $data);		
	}
}
