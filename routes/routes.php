<?php

use Jetpack\Router;

Router::csrfVerifier(new \Jetpack\Middlewares\CsrfVerifier());

Router::group([
	'namespace' => '\Jetpack\Controllers',
	'exceptionHandler' => \Jetpack\Handlers\CustomExceptionHandler::class], function () {

	Router::get('/', 'DefaultController@home')->setName('home');
	Router::get('/contact', 'DefaultController@contact')->setName('contact');

    // API
	Router::group(['prefix' => '/api', 'middleware' => \Jetpack\Middlewares\ApiVerification::class], function () {
		Router::resource('/demo', 'ApiController');
	});

});
