<?php

/**
 * MD5 Encrypt Controller.
 *
 * Online tool to encrypt a string using MD5
 * 
 * @package  app
 * @extends  Controller
 */

namespace Md5_encrypt;

class Controller_Md5_Encrypt extends Controller_Template
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
		$this->template->tab = 'geek';
		$this->template->title = 'MD5 Encrypt Tool';
        $this->template->content = View::forge('welcome/index', $data);		
	}
}
