<?php

/**
 * Word Count Controller.
 *
 * Online tool to count length of a given string
 * 
 * @package  app
 * @extends  Controller
 */

namespace Strrev;

class Controller_Strrev extends \Controller_Template
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
		
		$val->add_field('string', 'Text to reverse', 'required');
		$val->set_message('required', 'You must specify some text to be reversed.');
		
		if ($val->run())
		{
			// process your stuff when validation succeeds
			$data['calculated'] = strrev(\Input::post('string'));
		}
		else
		{
			// validation failed
		}
		
		$data['val'] = $val;
		
		$this->template->tab = 'geek';
		$this->template->title = 'Strrev Tool, String Reverse Tool';
        $this->template->content = \View::forge('index', $data);		
	}
}
