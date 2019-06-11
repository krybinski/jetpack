<?php

// $map->get('home', '/')->handler('\Jetpack\Controllers\HomeController@index');

$map->get('home', '/', function ($request) {
    $response = new Zend\Diactoros\Response();
    $response->getBody()->write("Home page");
    return $response;
});

// $map->get('blog.read', '/blog/{id}', function ($request) {
//     $id = (int) $request->getAttribute('id');
//     $response = new Zend\Diactoros\Response();
//     $response->getBody()->write("You asked for blog entry {$id}.");
//     return $response;
// });

// $map->get('home', '/', function ($request, $response) {
// 	var_dump('asd');
// });

// $router->get('', 'HomeController@index');
// $router->get('contact', 'HomeController@contact');

// $router->get('login', 'LoginController@get');
// $router->post('login', 'LoginController@post');

// $router->get('panel', 'AuthController@get');
// $router->post('panel/update', 'AuthController@update');

// $router->get('forgot-password', 'ForgotPasswordController@get');
// $router->post('forgot-password', 'ForgotPasswordController@post');

// $router->get('reset-password', 'ResetPasswordController@get');
// $router->post('reset-password', 'ResetPasswordController@post');

// $router->get('create-password', 'CreatePasswordController@get');
// $router->post('create-password', 'CreatePasswordController@post');

// $router->get('logout', 'LogoutController@get');

// $router->get('404', 'ExceptionNotFoundController@get');
