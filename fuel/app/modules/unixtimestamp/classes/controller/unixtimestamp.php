<?php

/**
 * Unix Timestamp Controller.
 *
 * Convert to and from a timestamp
 * 
 * @package  app
 * @extends  Controller
 */

namespace Unixtimestamp;

class Controller_Unixtimestamp extends \Controller_Template
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
		
		$val->add_field('datetoconvert', 'Date to convert', 'valid_string[utf8]');
		$val->add_field('timestamptoconvert', 'Timestamp to convert', 'valid_string[utf8]');
		$val->set_message('required', 'You must specify some HTML to be encoded or decoded.');
		
		if ($val->run())
		{
			// process your stuff when validation succeeds
			$tscon = \Input::post('timestamptoconvert');
			$data['timestamp'] = strtotime(\Input::post('datetoconvert'));
			$data['date'] = (empty($tscon) ? null : date('l jS F Y, H:i:s e', $tscon));
		}
		else
		{
			// validation failed
		}
		
		$data['val'] = $val;
		
		$this->template->tab = 'geek';
		$this->template->title = 'Unix Timestamp Convertor Tool';
        $this->template->javascript = \View::forge('js/index', $data);		
        $this->template->content = \View::forge('index', $data);		
	}
}
