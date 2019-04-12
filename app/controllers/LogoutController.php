<?php

namespace Jetpack\Controllers;

class LogoutController extends Controller
{
    public function get()
    {
        $this->sessionService->logout();
        $this->redirect('login');
    }
}
