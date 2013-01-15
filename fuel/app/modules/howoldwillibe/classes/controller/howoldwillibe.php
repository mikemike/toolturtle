<?php

/**
 * Unix Timestamp Controller.
 *
 * Convert to and from a timestamp
 * 
 * @package  app
 * @extends  Controller
 */

namespace Howoldwillibe;

class Controller_Howoldwillibe extends \Controller_Template
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
		
		$val->add_field('birthday', 'your birthday', 'valid_string[utf8]|required');
		$val->add_field('futuredate', 'the future date', 'valid_string[utf8]|required');
		$val->set_message('required', 'You must specify :label in order for us to calculate your age.');
		
		if ($val->run())
		{
			// process your stuff when validation succeeds
			
		}
		else
		{
			// validation failed
		}
		
		$data['val'] = $val;
		
		$this->template->tab = 'teens';
		$this->template->title = 'How Old Will I Be In...';
        $this->template->javascript = \View::forge('js/index', $data);		
        $this->template->content = \View::forge('index', $data);		
	}
}
