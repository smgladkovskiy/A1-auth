<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Template Controller Auth
 *
 * @author avis <smgladkovskiy@gmail.com>
 */
class Controller_Auth extends Controller_Template {

	public $_auth_required = FALSE;

	public function action_login ()
	{
		$this->template->title = __('auth.login');
		$url = Session::instance()->get('url', NULL);
		$error = FALSE;

		if(A1::instance()->logged_in())
		{
			$this->request->redirect($url);
		}

		if ($_POST)
		{
			$post = Arr::extract($_POST, array('email', 'password', 'remember'), NULL);
			
			// See if user checked 'Stay logged in'
			$remember = ($post['remember']) ? TRUE : FALSE;

			A1::instance()->login($post['email'], $post['password'], $remember);

			if(A1::instance()->logged_in())
			{
				$this->request->redirect($url);
			}

			$error = TRUE;
		}
		
		$this->template->content = View::factory('auth/login')
			->set('error', $error);
	}

	/**
	 * Logout action
	 */
	public function action_logout()
	{
		if(A1::instance()->logged_in())
		{
			A1::instance()->logout();
		}

		$this->request->redirect();
	}

	public function action_register()
	{
		/*
		 * Checks if the user is logged in or there is no users in the DB. Otherwise redirects
		 * to a mainpage
		 */
		if( ! A1::instance()->logged_in() OR Jelly::select('user')->count())
			$this->request->redirect('auth/login');

		$this->template->title = __('auth.register');

		$errors = FALSE;

		$user = Jelly::factory('user');

		if ($_POST)
		{
			$user->set(
				Arr::extract(
					$_POST,
					array(
						'email', 'username', 'password', 'password_confirm'
					)
				)
			);

			$user->add('roles', 1);

			try
			{
				$user->save();

				$this->request->redirect();
			}
			catch (Validate_Exception $e)
			{
				$errors = $e->array->errors('auth');
			}
		}

		$this->template->content = View::factory('auth/register')
			->set('user', $user)
			->set('errors', $errors);
	}

	public function action_change_password()
	{
		if (! $this->auth->logged_in())
		{
			$this->request->redirect('auth/login');
		}

		$errors = FALSE;

		if ($_POST)
		{
			$user = $this->auth->get_user();

			$user->set(
				Arr::extract(
					$_POST,
					array(
						'password', 'password_confirm'
					)
				)
			);

			try
			{
				$user->save();
				$this->request->redirect();
			}
			catch (Validate_Exception $e)
			{
				$errors = $e->array->errors('auth');
			}
		}

		$this->template->content = View::factory('auth/change_password')
			->set('errors', $errors);
	}

} // End Controller_Auth