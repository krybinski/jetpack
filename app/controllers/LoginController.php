<?php

namespace Jetpack\Controllers;

use Jetpack\Services\SessionService;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public $pageTitle = 'Login';
    public $user;
    public $message;
    public $csrf;

    public function get()
    {
        $isLoggedIn = $this->sessionService->isUserLoggedIn();
        $this->csrf = $this->sessionService->getSessionValue('csrf');

        if ($isLoggedIn) {
            $this->redirect('panel');
        }

        $this->view('auth/login');
    }

    public function post()
    {
        $request = Request::createFromGlobals();
        $csrf = $request->request->get('csrf');

        SessionService::validateCSRF($csrf);

        $username = $request->request->get('username');
        $password = $request->request->get('password');

        // Retrieve the user account information for the given username
        $this->user = $this->userControl->getUserByUsername($username);

        // Could not find a user with that username

        if (!$this->user) {
            $this->redirect('panel');
            return;
        } else {
            // User account found
            $correctPassword = $this->verifyPassword($password, $this->user['password']);

            if ($correctPassword) {
                // User login
                $this->sessionService->login($this->user);
                $this->redirect('panel');
                return;
            } else {
                $this->message = LOGIN_FAIL;
                $this->redirect('panel');
                return;
            }
        }
    }
}
