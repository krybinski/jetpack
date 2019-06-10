<?php

$dotenv = Dotenv\Dotenv::create('../');
$dotenv->load();

return [

	'host' => getenv('DB_HOST'),
	'port' => getenv('DB_PORT'),
	'user' => getenv('DB_USER'),
	'pass' => getenv('DB_PASS'),
	'name' => getenv('DB_NAME'),

];
