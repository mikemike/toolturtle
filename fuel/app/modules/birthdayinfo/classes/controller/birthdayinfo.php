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
		
		$q = array(
			'type' => '/people/person',
			'limit' => 1000,
			'sort' => 'name',
			'name' => null,
			'guid' => null,
			'timestamp' => null,
			'/people/person/date_of_birth' => '1955-02-24'
		);
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
		echo $result_str;
		
		
		$val->add_field('birthday', 'your birthday', 'valid_string[utf8]|required');
		$val->add_field('futuredate', 'the future date', 'valid_string[utf8]|required');
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

			// Process the date
			$futuredate = \Input::post('futuredate');
			$futuredate_arr = explode('/', $futuredate);
			if(count($futuredate_arr) != 3){
				$data['error'] = 'Sorry, the future date was entered in the wrong format.';
				$ok_to_proceed = false;
			} else {
				$ok_to_proceed = true;
			}

			if($ok_to_proceed){
				// Convert dates to timestamps
				$birthday_timestamp = mktime(0, 0, 0, $birthday_arr[0], $birthday_arr[1], $birthday_arr[2]);
				$futuredate_timestamp = mktime(0, 0, 0, $futuredate_arr[0], $futuredate_arr[1], $futuredate_arr[2]);
				$data['birthday_timestamp'] = $birthday_timestamp;
				$data['futuredate_timestamp'] = $futuredate_timestamp;
				// Now lets calculate all the useless facts
				$difference = array();
				/*$difference['seconds'] = $futuredate_timestamp - $birthday_timestamp;
				$difference['minutes'] = $difference['seconds']/60;
				$difference['hours'] = $difference['minutes']/60;*/
				$date1 = new \DateTime('@'.$birthday_timestamp);
				$date2 = new \DateTime('@'.$futuredate_timestamp);
				$data['interval'] = (array)$date1->diff($date2);
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
}
