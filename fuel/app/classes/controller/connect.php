<?php

use Hybrid\Auth_Controller;

class Controller_Connect extends Auth_Controller
{
	public $template = 'frontend';
	
	/**
	 * Show any error during authentication
	 *
	 * @access 	protected
	 * @return 	Response
	 */
	protected function action_error($provider = array(), $e = '')
	{
		$data = array(
			'title'   => 'An error has occur',
			'message' => $e,
		);

		$template = Template::make($this->template);
		$template->set(array(
			'title'   => $data['title'],
			'content' => $template->partial('static/notice', $data)
		));

		return Response::forge($template->render(), 200);
	}
}