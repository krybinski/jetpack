<?php

namespace Jetpack\Controllers;

use Jetpack\Traits\SeoTrait;
use Zend\Diactoros\Response;

class HomeController extends Controller
{
	use SeoTrait;

    public function index()
    {
		var_dump('home');
		$this->pageTitle('Home page');
		$this->pageDescription('Home page description');
		$this->seoTags = [
			'canonical' => config('app.url'),
		];

		$this->view('index');
		// $response = new Response();
		// $response->getBody()->write("Home page");
		// return $response;
    }

    public function contact()
    {
		$this->pageTitle('Contact page');
		$this->pageDescription('Contact page description');
		$this->seoTags = [
			'canonical' => config('app.url') . '/contact',
		];

        $this->view('contact');
    }
}
