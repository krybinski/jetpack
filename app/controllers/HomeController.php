<?php

namespace Jetpack\Controllers;

use Jetpack\Traits\SeoTrait;

class HomeController extends Controller
{
	use SeoTrait;

	public function index()
    {
		$this->pageTitle('Home page');
		$this->pageDescription('Home page description');
		$this->seoTags = [
			'canonical' => config('app.url'),
		];

		// TODO: here should be return statement
		$this->view('index');
    }

    public function contact()
    {
		$this->pageTitle('Contact page');
		$this->pageDescription('Contact page description');
		$this->seoTags = [
			'canonical' => config('app.url') . '/contact',
		];

		// TODO: here should be return statement
        $this->view('contact');
    }
}
