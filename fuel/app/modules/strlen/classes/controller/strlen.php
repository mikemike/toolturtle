<?php

/**
 * String Length Controller.
 *
 * Online tool to count length of a given string
 * 
 * @package  app
 * @extends  Controller
 */

namespace Strlen;

class Controller_Strlen extends \Controller_Template
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
		
		$val->add_field('string', 'String to count', 'required');
		$val->set_message('required', 'You must specify a string to be counted.');
		
		if ($val->run())
		{
			// process your stuff when validation succeeds
			$data['calculated'] = strlen(\Input::post('string'));
		}
		else
		{
			// validation failed
		}
		
		$data['val'] = $val;
		
		$this->template->tab = 'geek';
		$this->template->title = 'Strlen Tool, String length tool';
        $this->template->content = \View::forge('index', $data);		
	}
}
