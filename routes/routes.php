<?php

$router->get('/', 'HomeController@index')->name('home');
$router->get('/contact', 'HomeController@contact')->name('contact');

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
