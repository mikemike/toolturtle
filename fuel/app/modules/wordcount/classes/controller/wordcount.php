<?php

/**
 * Word Count Controller.
 *
 * Online tool to count length of a given string
 * 
 * @package  app
 * @extends  Controller
 */

namespace Wordcount;

class Controller_Wordcount extends \Controller_Template
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
		
		$val->add_field('string', 'Words to count', 'required');
		$val->set_message('required', 'You must specify some words to be counted.');
		
		if ($val->run())
		{
			// process your stuff when validation succeeds
			$data['calculated'] = str_word_count(\Input::post('string'));
		}
		else
		{
			// validation failed
		}
		
		$data['val'] = $val;
		
		$this->template->tab = 'geek';
		$this->template->title = 'Word Count Tool';
        $this->template->content = \View::forge('index', $data);		
	}
}
