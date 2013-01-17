<?php

/**
 * Maps Lat Lng Controller.
 *
 * Online tool to get the lat lng of a point on a map
 * 
 * @package  app
 * @extends  Controller
 */

namespace Mapslatlng;

class Controller_Mapslatlng extends \Controller_Template
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
		$this->template->title = 'Maps Lat,Lng Tool. Grab the latitude and longitude of a point on a map';
        $this->template->content = \View::forge('index', $data);		
	}
}
