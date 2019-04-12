<?php

namespace Jetpack\Services;

class SessionService
{
	/**
	 * Initialize the session service with class instantiation.
	 */
	public function __construct()
	{
		if (!isset($_SESSION)) {
			session_start();
		}
		if (empty($_SESSION['csrf'])) {
			if (function_exists('random_bytes')) {
				$_SESSION['csrf'] = bin2hex(random_bytes(32));
			} else if (function_exists('mcrypt_create_iv')) {
				$_SESSION['csrf'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			} else {
				$_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
			}
		}
	}

	/**
	 * Validate CSRF
	 * @param $csrf
	 */
	public static function validateCSRF($csrf)
	{
		if (!hash_equals($_SESSION['csrf'], $csrf)) {
			header('Location: /login');
			exit;
		}
	}

	/**
	 * Set the user ID session, a boolean and the time the session was authenticated.
	 * @param $user
	 */
	public function login($user)
	{
		$_SESSION['user_id'] = $user['id'];
		$_SESSION['is_logged_in'] = true;
		$_SESSION['time_logged_in'] = time();
	}

	/**
	 * Unset all session variables and destroy the session.
	 */
	public function logout()
	{
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_id']);
		unset($_SESSION['time_logged_in']);

		session_destroy();
	}

	/**
	 * Determine if user is logged in, and redirect to the login screen if not.
	 * @param $userId
	 */
	public function authenticate($userId)
	{
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_logged_in']) || $userId !== $_SESSION['user_id']) {
			header('Location: /login');
		}
	}

	/**
	 * Check if user is logged in.
	 * @return bool
	 */
	public function isUserLoggedIn()
	{
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_logged_in'])) {
			return false;
		}

		return true;
	}

	/**
	 * Set session to test if user resetting password is the same
	 * one who initiated the request.
	 * @param $userId
	 */
	public function setPasswordRequestId($userId)
	{
		$_SESSION['user_id_reset_pass'] = $userId;
	}

	/**
	 * Set a session value.
	 * @param $key
	 * @param $value
	 */
	public function setSessionValue($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	/**
	 * Unset a session value.
	 * @param $key
	 */
	public function deleteSessionValue($key)
	{
		unset($_SESSION[$key]);
	}

	/**
	 * Obtain a session value by key.
	 * @param $key
	 * @return mixed|null
	 */
	public function getSessionValue($key)
	{
		return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
	}
}
