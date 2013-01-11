<?php

/**
 * SHA1 Encrypt Controller.
 *
 * Online tool to encrypt a string using MD5
 * 
 * @package  app
 * @extends  Controller
 */

namespace Sha1encrypt;

class Controller_Sha1encrypt extends \Controller_Template
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
		
		$val->add_field('string', 'String to hash', 'required');
		$val->set_message('required', 'You must specify a string to be hashed.');
		
		if ($val->run())
		{
			// process your stuff when validation succeeds
			$data['hashed'] = sha1(\Input::post('string'));
		}
		else
		{
			// validation failed
		}
		
		$data['val'] = $val;
		
		$this->template->tab = 'geek';
		$this->template->title = 'SHA1 Encrypt Tool';
        $this->template->content = \View::forge('index', $data);		
	}
}
