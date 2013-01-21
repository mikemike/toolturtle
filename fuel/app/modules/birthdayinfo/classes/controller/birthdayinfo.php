<?php

/**
 * Unix Timestamp Controller.
 *
 * Convert to and from a timestamp
 * 
 * @package  app
 * @extends  Controller
 */

namespace Birthdayinfo;

class Controller_Birthdayinfo extends \Controller_Template
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
		$val->set_message('required', 'You must specify :label in order for us to calculate your age.');
		
		if ($val->run())
		{
			// process your stuff when validation succeeds
			$ok_to_proceed = false;
			// Process the date
			$birthday = \Input::post('birthday');
			$birthday_arr = explode('/', $birthday);
			if(count($birthday_arr) != 3){
				$data['error'] = 'Sorry, your birthday was entered in the wrong format.';
				$ok_to_proceed = false;
			} else {
				$ok_to_proceed = true;
			}

			if($ok_to_proceed){
				// Convert dates to timestamps
				$birthday_timestamp = mktime(0, 0, 0, $birthday_arr[0], $birthday_arr[1], $birthday_arr[2]);
				$data['birthday_timestamp'] = $birthday_timestamp;
				// Now lets calculate all the useless facts
				$difference = array();
				/*$difference['seconds'] = $futuredate_timestamp - $birthday_timestamp;
				$difference['minutes'] = $difference['seconds']/60;
				$difference['hours'] = $difference['minutes']/60;*/
				$date1 = new \DateTime('@'.$birthday_timestamp);
				$date2 = new \DateTime('@'.time());
				$data['interval'] = (array)$date1->diff($date2);
				
								
				/* Grab all info on the date.  Bit useless
				$q = array(
					'/type/reflect/any_value' => array(
						'type' => '/type/datetime',					
						'value' => date('Y-m-d', $birthday_timestamp),
						'link' => array(
							'source' => array(
								'id' => null,
								'name' => null,
								'type' => array()
							)
						),
						'*' => null
					)
				);
				$res = $this->freebase($q);*/
				
				$q = array(
					'type' => '/people/person',
					'limit' => 1000,
					'sort' => 'name',
					'name' => null,
					'guid' => null,
					'timestamp' => null,
					'/people/person/date_of_birth' => date('Y-m-d', $birthday_timestamp)
				);
				$birthdays = $this->freebase($q);
				
				echo '<pre>'.print_r($birthdays, true).'</pre>';
			}
			
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
	
	
	public function freebase($q)
	{
		$query_str = json_encode($q);
		$query = 'https://www.googleapis.com/freebase/v1/mqlread?query=['.$query_str.']';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $query);
		echo 'Called <a href="'.$query.'">'.$query.'</a><br>';
		curl_setopt($ch, CURLOPT_HEADER, 0);
		//curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt ($ch, CURLOPT_TIMEOUT, 4000);  // times out after 4s
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, false); // allow redirects 
				
		// Execute query and get raw json results
		$result_str = curl_exec($ch);	
		$res = json_decode($result_str);
		return $res;
	}
}

