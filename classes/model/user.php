<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * User Model for Jelly ORM
 *
 * @author avis <smgladkovskiy@gmail.com>
 */
class Model_User extends Jelly_Model {

	/**
	 * Initializating model meta information
	 *
	 * @param Jelly_Meta $meta
	 */
	public static function initialize(Jelly_Meta $meta)
	{
		$meta->table('users')
			->fields(array(
				'id' => Jelly::field('Primary'),
				'email' => Jelly::field('Email'),
				'name' => Jelly::field('String'),
				'password' => Jelly::field('Password'),
			));
	}
} // End Model_User