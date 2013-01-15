<?php

/**
 * Unix Timestamp Controller.
 *
 * Convert to and from a timestamp
 * 
 * @package  app
 * @extends  Controller
 */

namespace Caseconverter;

class Controller_Caseconverter extends \Controller_Template
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
		
		$this->template->tab = 'teens';
		$this->template->title = 'Case Converter';
        $this->template->javascript = \View::forge('js/index', $data);
        $this->template->content = \View::forge('index', $data);
	}
}
