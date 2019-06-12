<?php

use Pecee\SimpleRouter\SimpleRouter;

class Router
{
    public static function load($file)
    {
		$router = new SimpleRouter();
		$router->setDefaultNamespace('\Jetpack\Controllers');

		require_once $file;

		$router->start();
	}
}
