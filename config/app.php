<?php

$dotenv = Dotenv\Dotenv::create('../');
$dotenv->load();

return [

	'name' => getenv('APP_NAME'),
	'version' => getenv('APP_VERSION'),
	'url' => getenv('APP_URL'),

];
