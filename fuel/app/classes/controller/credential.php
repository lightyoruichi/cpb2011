<?php

use Hybrid\Auth;
use Hybrid\AuthException;
use Hybrid\Controller;
use Hybrid\Input;

/**
 * Credential Controller
 *
 * @package   App
 * @extends   Hybrid\Controller
 */
class Controller_Credential extends Controller 
{
	public $template = 'frontend';

	/**
	 * See login action
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return $this->action_login();
	}

	/**
	 * Login action
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_login()
	{
		if (Auth::make()->is_logged())
		{
			return Response::redirect('home');
		}

		$data = array('title' => __('titles.login'));

		return $this->response(array(
			'title'   => $data['title'],
			'content' => $this->template->partial('credential/login', $data),
		), 200);
	}

	/**
	 * Authenticate a user
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function post_login()
	{
		// setup validation
		$val = Validation::forge();

		$val->add_field('username', __('labels.user.username'), 'required');
		$val->add_field('password', __('labels.user.password'), 'required|min_length[6]');

		if ( ! $val->run())
		{
			$errors = array();

			foreach ($val->error() as $field => $value)
			{
				$errors[$field] = $value->get_message();
			}

			return $this->response(array(
				'validation_errors' => $errors,
			), 400);
		}

		try {
			Auth::make()->login($val->validated('username'), $val->validated('password'));
		}
		catch (AuthException $e) {
			return $this->response(array(
				'errors' => array($e->getMessage()),
			), 400);
		}

		return $this->response(array(
			'text'        => __('responses.credential.login.successful'),
			'redirect_to' => \Uri::create('home'),
		), 200);
	}

	/**
	 * Register action
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_register()
	{
		if (Auth::make()->is_logged())
		{
			return Response::redirect('home');
		}

		$data = array('title' => __('titles.register'));

		return $this->response(array(
			'title'   => $data['title'],
			'content' => $this->template->partial('credential/register', $data),
		), 200);
	}

	/**
	 * Register a user
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function post_register()
	{
		$val = Validation::forge();

		$val->add_field('username', __('labels.user.username'), 'required');
		$val->add_field('password', __('labels.user.password'), 'required|min_length[6]');
		$val->add_field('email', __('labels.user.email'), 'required|valid_email');

		if ( ! $val->run())
		{
			$errors = array();

			foreach ($val->error() as $field => $value)
			{
				$errors[$field] = $value->get_message();
			}

			return $this->response(array(
				'validation_errors' => $errors,
			), 400);
		}

		$user = Model_User::query()
			->where('email', $val->validated('email'))
			->or_where('user_name', $val->validated('username'))
			->get_one();

		if (null !== $user)
		{
			// we found a duplicate user, should disable registration
			return $this->response(array(
				'errors' => array(__('responses.credential.register.duplicate')),
			), 400);
		}

		$user = Model_User::forge(array(
			'user_name' => $val->validated('username'),
			'email'     => $val->validated('email'),
			'full_name' => Input::post('fullname', ''),
			'status'    => 'unverified',	
		));

		$user->auth = Model_Users_Auth::forge(array(
			'password'  => Auth::create_hash($val->validated('password')),
		));

		$user->meta = Model_Users_Metum::forge(array(
			'about'  => Input::post('about', ''),
		));

		$user->roles[] = Model_Users_Role::forge(array(
			'role_id' => 1,
		));

		$user->save();

		return $this->response(array(
			'text'        => __('responses.credential.register.successful'),
			'redirect_to' => \Uri::create(''),
		), 200);
	}

	/**
	 * Login action
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_logout()
	{
		Auth::logout();

		return Response::redirect('/');
	}

}