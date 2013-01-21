<?php
/**
 * @File freebase.php
 * @author Randall Morgan rmorgan62@gmail.com
 * @version 1.1.0
 * @note This library was written for use with
 * CodeIgniter but can be used as a stand-alone Php library.
 */

/**
 * @class Freebase
 * @brief A Freebase Query Library
 * @details A Freebase MQL query library for
 * CodeIgniter.
 */
namespace Freebase; 
 
class Freebase {

	var $queries = array();
	var $query_str = '';
	var $apiendpoint ='';
	var $query_count = 0;
	var $result_str = '';
	var $result_array = array();
	var $json_error = '';
	var $result_message = '';
	var $result_status = '';
	var $result_cursor = '';
	var $result_pagesize = '100';
	var $result_has_error = false;
	var $sandbox_mode = false;
	var $timeout = 9; // 9+1 give ten second time out
	var $follow = 0; // FOllow Redirects
	
	
	/**
	 * Constructor
	 */	
	public function __construct()
	{
		// Set api end point
		//$this->apiendpoint = "http://api.freebase.com/api/service/mqlread?queries";
		$this->apiendpoint = "https://www.googleapis.com/freebase/v1/mqlread?query";
		
		ini_set('display_errors',1);
		error_reporting(E_ALL|E_STRICT);
	}
	
	/**
	 * Set api url
	 */
	public function setApiEndPoint($url=null)
	{
		if($url)
		{
			$this->apiendpoint = $url;
			return true;
		}
		
		return false;
	}
	
	/**
	 * Set sandbox mode
	 */
	public function setSandbox($sandbox=false)
	{
		if($sandbox)
		{
			$this->sandbox_mode = true;
			$this->apiendpoint = "http://api.freebase.com/api/service/mqlread?queries";
		}
		else
		{
			$this->sandbox_mode = false;
			$this->apiendpoint = "http://sandbox.freebase.com/api/service/mqlread?queries";
		}
		
		return $this->sandbox_mode;
	}
	
	/**
	 * Return true if running in sandbox mode
	 */
	public function isSandbox()
	{
		return $this->sandbox_mode;
	}
	
	/**
	 * Set connection timeout
	 */
	public function setTimeout($tm=0)
	{
		$this->timeout = (int)$tm;
		return $this->timeout;	
	}
	
	/**
	 * Set Follow
	 * If set, cURL will follow any reidrects
	 * from the host. Otherwise, cURL will
	 * return with error.
	 */
	public function setFollow($f=false)
	{
		if($f)
		{
			$this->follow = 1;
		}
		else
		{
			$this->folow = 0;
		}
		
		return $this->follow;
	}
	
	/**
	 * Add query to query list
	 */
	public function addQuery($query=array())
	{
		if(!empty($query))
		{	
			$this->query_count++;
			$idx = "q".$this->query_count;
			$this->queries[$idx] = $query;	
		}
		
		return $this->query_count = count($this->queries);
	}
	
	
	/**
	 * Remove previously added query
	 * If query is removed, return int value query count
	 * If query index is not found in list, returns bool false
	 */
	public function removeQuery($idx)
	{
		$found = false;
		
		// loop through and remove our query
		foreach($this->queries as $indx => $q)
		{
			// Skip our query
			if($indx === $idx)
			{
				$found = true;
				continue;
			}
			else
			{
				$tmp[]=$q;
			}
		} 
		
		// Rebuild query list
		$id = 0;
		foreach($tmp as $q)
		{
			$id++;
			$temp['q'.$id] = $q;
		}
		
		// Save new array
		$this->queries = $temp;
		// Reset query count
		$this->query_count = count($this->queries);
		
		if($found)
		{
			// return query count
			return $this->query_count;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * Return results from queries added to query list.
	 * All queries in the query list are ran at once.
	 * Sets results properties and optionally returns
	 * results as requested type
	 */
	public function get($mode='')
	{
		#run the query
		$this->query_str = json_encode($this->queries);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->apiendpoint.'='.$this->query_str);
		echo "Called <a href='".$this->apiendpoint.'='.$this->query_str."'>".$this->apiendpoint.'='.$this->query_str."</a>\n<br>";
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt ($ch, CURLOPT_TIMEOUT, $this->timeout);  // times out after 4s
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, $this->follow); // allow redirects 
		
		
		// Execute query and get raw json results
		$this->result_str = curl_exec($ch);
		
		echo "Return String ".$this->result_str;
		
		// Show errors for debugging
		echo "<br>\n<br>\nErrors:\n <br>";
		print_r ( curl_getinfo ( $ch )); 
		echo  "\n\ncURL error number:"  . curl_errno ( $ch )."<br>\n"; 
		echo  "\n\ncURL error:"  .  curl_error ( $ch )."<br>\n"; 

		// Close connection
		curl_close($ch); 
	
		exit();
		
		// Set any cursor we may have in the results
		$this->getCursor();
		// Set any pagesize we may have in the results
		$this->getPagesize();
		
		// Test for error(s)
		if($this->_set_result_status())
		{		
			// get results in proper format if requested
			switch($mode)
			{
				case 'json': return $this->get_result_str();
				case 'string': return $this->get_result_str();
				case 'array': return $this->get_result_assoc();
				case 'assoc': return $this->get_result_array();
				case 'obj': return $this->get_result_object();
				case 'bool': return true;
				default: return $this->get_result_assoc();
			}
		}
		else
		{
			return false;
		}
		
	}
	
	/**
	 * Get current result cursor
	 */
	public function getCursor()
	{
		$this->walk_cursor($this->get_result_assoc());
		
		return $this->result_cursor;		
	}
	
	/**
	 * Walk results looking for cursor
	 */
	private function walk_cursor($data=array())
	{
		if(is_array($data) && !empty($data))
		{
			foreach($data as $name => $value)
			{
				if(is_array($value))
				{
					$this->walk_cursor($value);
				}
				else
				{
					if($name == 'cursor')
					{
						$this->result_cursor = $value;
					}
				}
				
			}
			
		}
		
		return;
	}
	
	/**
	 * Return current result pagesize
	 */
	public function getPagesize()
	{
		$pgs = $this->get_result_assoc();
		
		if(array_key_exists('pagesize', $pgs))
		{
			$this->result_pagesize = $pgs['pagesize'];
		}
		else
		{
			$this->result_pagesize = '100';
		}
		
		return $this->result_pagesize;	
	}
	
	/**
	 * Return error object
	 */
	public function getErrors()
	{
		if($this->_get_result_status())
		{
			return false;
		}
		else
		{
			return array('json' => $this->json_error,
						'query' => $this->result_message);
		}
	}
	
	
	/**
	 * Returns bool true if an error occurred
	 */
	public function hasError()
	{
		return $this->result_has_error;
	}
	
	/**
	 * helper method to set error message for query errors
	 */
	private function _set_result_message()
	{
		//$msg = $this->get_result_assoc();
		$this->walk_message($this->get_result_assoc());
		
		return $this->result_message;
	}
	
	/**
	 * Returns the Error message if any
	 */
	public function getMessage()
	{
		
		return $this->result_message;
	}
	
	/**
	 * Debugging Method may be removed 
	 * from production code.
	 */
	private function walk_message($data=array())
	{
		if(is_array($data) && !empty($data))
		{
			foreach($data as $name => $value)
			{
				if(is_array($value))
				{
					$this->walk_message($value);
				}
				else
				{
					if($name == 'message')
					{
						$this->result_message = $value;
					}
				}
				
			}
			
		}
		
		return;
	}
	
	/**
	 * Helper method to test for query errors
	 */
	private function _set_result_status()
	{
		$code = $this->get_result_assoc();
		
		$this->result_status = $code['code'];
	
		if($this->result_status === "/api/status/ok")
		{
			$this->result_has_error = false;
			return true;
		}
		else
		{
			$this->result_has_error = true;
			$this->_set_result_message();
			return false;
		}
	}
	
	/**
	 * Return the status string
	 */
	public function getStatus()
	{
		return $this->result_status;
	}
	
	/**
	 * Retrun raw json string
	 */
	public function get_result_string()
	{
		return $this->result_string;
	}
	
	/**
	 * Return array of results
	 */
	public function get_result_array()
	{
		return $this->result_array = $this->decode($this->result_str, false); //
	}
	
	/**
	 * Return associative array or results
	 */
	public function get_result_assoc()
	{
		return $this->result_assoc = $this->decode($this->result_str, true);//true:give us the json struct as an array
	}
	
	/**
	 * Return result object
	 */
	public function get_result_object()
	{
		return json_decode($this->result_str);
	}
	
	/**
	 * decode json string and make error messages human readable
	 */
	public function decode($json, $toAssoc = false)
    {
		$result = json_decode($json, $toAssoc);
		
		// json_last_error() only PHP 5.3 and up
		// PHP_VERSION_ID is available as of PHP 5.2.7, if our 
		// version is lower than that, then emulate it
		if(!defined('PHP_VERSION_ID'))
		{
    		$version = explode('.',PHP_VERSION);

    		define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[	2]));
		}

		$error = '';
		
		if(PHP_VERSION_ID > 50300)
		{
        
			switch(json_last_error())
			{
				case JSON_ERROR_DEPTH:
					$error =  ' - Maximum stack depth exceeded';
					break;
				case JSON_ERROR_CTRL_CHAR:
					$error = ' - Unexpected control character found';
					break;
				case JSON_ERROR_SYNTAX:
					$error = ' - Syntax error, malformed JSON';
					break;
				case JSON_ERROR_NONE:
				default:
					$error = '';                    
			}
			
			$this->json_error = 'JSON Error: '.$error;
		}
		else
		{
			$this->json_error = 'unknowm';
		}
				
        return $result;
    }
}
