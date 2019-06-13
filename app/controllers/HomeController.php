<?php

namespace Jetpack\Controllers;

use Jetpack\Traits\SeoTrait;

class HomeController extends Controller
{
	use SeoTrait;

	public function index()
    {
		$this->pageTitle('Home');
		$this->pageDescription('Home page description');
		$this->canonical();

		// TODO: here should be return statement
		$this->view('index');
    }

    public function contact()
    {
		$this->pageTitle('Contact page');
		$this->pageDescription('Contact page description');
		$this->canonical('/contact');

		// TODO: here should be return statement
        $this->view('contact');
	}
}
