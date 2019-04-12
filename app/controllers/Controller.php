<?php

namespace Jetpack\Controllers;

use Jetpack\Comment;
use Jetpack\ListClass;
use Jetpack\Services\SessionService;
use Jetpack\User;

abstract class Controller
{
    protected $sessionService;

	protected $pageTitle;
	protected $seoTags;

    protected $userControl;
    protected $message;
    protected $list;
    protected $comment;

    protected $errorList;
    protected $errors;

    /**
     * Initialize controller.
     */
    public function __construct()
    {
		$this->sessionService = new SessionService;
		$this->userControl = new User;
		$this->list = new ListClass;
		$this->comment = new Comment;
    }

    /**
     * Escape html to string.
     * @param $html
     * @return string
     */
    public function escape($html) {
        return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /**
     * Shortcut to retrieve JavaScript file from the /js/ directory.
     * @param $filename
     * @return string
     */
    protected function getScript($filename)
    {
        $file = strtolower($filename);
        return APP_URL . '/js/' . $file . '.js';
    }

    /**
     * Shortcut to retrieve stylesheet file from the /css/ directory.
     * @param $filename
     * @return string
     */
    protected function getStylesheet($filename)
    {
        $file = strtolower($filename);
        return APP_URL . '/build/css/' . $file . '.css';
	}

    /**
     * Retrieve a view URL by filename.
     * @param $view
     */
    protected function view($view)
    {
        $view = strtolower($view);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/' . $view . '.view.php';
    }

    /**
     * Check if the current page is the Index.
     * @return bool
     */
    protected function isIndex()
    {
        $redirect = ltrim($_SERVER['REDIRECT_URL'], '/');
        return $redirect === '';
    }

    /**
     * Check if the current page is specified page.
     * @param $view
     * @return bool
     */
    protected function isPage($view)
    {
        $view = strtolower($view);
        $redirect = ltrim($_SERVER['REDIRECT_URL'], '/');
        return $redirect === $view;
    }

    /**
     * Redirects to the specified page.
     * @param $view
     */
    protected function redirect($view)
    {
        $view = strtolower($view);
        header('Location: /' . $view );
        exit;
    }

    /**
     * Securely hash a password.
     * @param $password
     * @return bool|string
     */
    protected function encryptPassword($password)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
        return $passwordHash;
    }

    /**
     * Verify a submitted password against existing password.
     * @param $submittedPassword
     * @param $password
     * @return bool
     */
    protected function verifyPassword($submittedPassword, $password)
    {
        $validPassword = password_verify($submittedPassword, $password);
        return $validPassword;
    }

    /**
     * Check if username is empty, and make sure it only contains
     * alphanumeric characters, numbers, dashes, and underscores.
     * @param $username
     */
    protected function validateUsername($username)
    {
        if (!empty($username)) {
            if (strlen($username) < '3') {
                $this->errors[] = USERNAME_TOO_SHORT;
            }
            if (strlen($username) > '50') {
                $this->errors[] = USERNAME_TOO_LONG;
            }
            // Match a-z, A-Z, 1-9, -, _.
            if (!preg_match("/^[a-zA-Z\d-_]+$/i", $username)) {
                $this->errors[] = USERNAME_CONTAINS_DISALLOWED;
            }
        } else {
            $this->errors[] = USERNAME_MISSING;
        }
    }

    /**
     * Check if password is empty, and make sure it conforms
     * to password security standards.
     * @param $password
     */
    protected function validatePassword($password)
    {
        if (!empty($password)) {
            if (strlen($password) < '8') {
                $this->errors[] = PASSWORD_TOO_SHORT;
            }
            if (!preg_match("#[0-9]+#", $password)) {
                $this->errors[] = PASSWORD_NEEDS_NUMBER;
            }
            if (!preg_match("#[A-Z]+#", $password)) {
                $this->errors[] = PASSWORD_NEEDS_UPPERCASE;
            }
            if (!preg_match("#[a-z]+#", $password)) {
                $this->errors[] = PASSWORD_NEEDS_LOWERCASE;
            }
        } else {
            $this->errors[] = PASSWORD_MISSING;
        }
    }

    /**
     * Check if email is empty, and test it against PHP built in email validation.
     * @param $email
     */
    protected function validateEmail($email)
    {
        if (!empty($email)) {
            // Remove all illegal characters from email
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            // Validate e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->errors[] = EMAIL_NOT_VALID;
            }
        } else {
            $this->errors[] = EMAIL_MISSING;
        }
    }

    /**
     * Get list of errors from validation.
     * @param $errors
     * @return string
     */
    protected function getErrors($errors)
    {
        foreach ($errors as $error) {
            $this->errorList .= $error . "\n";
        }
        return $this->errorList;
    }
}
