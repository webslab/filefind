<?php

use Jodit\Application;

class JoditRestApplication extends Application
{
	/**
	 * @example Jodit connector in Joomla
	 * ```php
	 * function checkPermissions() {
	 *      $user = JFactory::getUser();
	 *      if (!$user->id) {
	 *           trigger_error('You are not authorized!', E_USER_WARNING);
	 *      }
	 * }
	 * ```
	 */
	function checkAuthentication()
	{
		if (!isset($_SERVER['HTTP_X_WEBSLAB_TOKEN']) || !isset($_SERVER['HTTP_X_WEBSLAB_PROJECT'])) {
			trigger_error('You are not authorized!', E_USER_WARNING);
		}

		// hits surrealdb with token to check if user is authorized
		if ($_SERVER['HTTP_X_WEBSLAB_TOKEN'] !== 'TOKEN') {
			trigger_error('You are not authorized!', E_USER_WARNING);
		}

		if (!file_exists(__DIR__ . '/resources/' . $_SERVER['HTTP_X_WEBSLAB_PROJECT'])) {
			// trigger_error('Project not found!', E_USER_WARNING);
			// only if comes from the token
			mkdir(__DIR__ . '/resources/' . $_SERVER['HTTP_X_WEBSLAB_PROJECT'], 0777, true);
		}

		return;
	}
}
