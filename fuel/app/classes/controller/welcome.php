<?php

use Hybrid\Controller;

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{

	public $template = 'frontend';
	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data = array();
		return $this->response(array(
			'title'   => '',
			'content' => $this->template->partial('welcome/index', $data),
		), 200);
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$data = array(
			'title' => $messages[array_rand($messages)]
		);

		return $this->response(array(
			'content' => $this->template->partial('welcome/404', $data),
		), 404);
	}
}
