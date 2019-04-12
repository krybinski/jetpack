<?php

namespace Jetpack\Controllers;

class ExceptionNotFoundController extends Controller
{
    public $pageTitle = '404';

    public function get()
    {
        $this->view('error/404');
    }
}
