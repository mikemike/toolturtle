<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller_Template
{

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data = array();
		$greeting = array('mate', 'chump', 'buddy old pal', 'me old mucka', 'buddy', 'bud', 'homie');
		$this->template->tab = 'home';
		$this->template->title = 'Hello there, '.$greeting[array_rand($greeting)];
        $this->template->content = View::forge('welcome/index', $data);		
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		$this->template->title = 'Oh dear, oh dear, oh dear';
        $this->template->content = Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
