<?php

$dotenv = Dotenv\Dotenv::create('../');
$dotenv->load();

return [

	'host' => getenv('MAIL_HOST'),
	'encryption' => getenv('MAIL_ENCRYPTION'),
	'port' => getenv('MAIL_PORT'),
	'username' => getenv('MAIL_USERNAME'),
	'password' => getenv('MAIL_PASSWORD'),

];
