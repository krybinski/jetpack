<?php

$options = [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try {
	$connection = new PDO('mysql:host=' . config('database.host'), config('database.user'), config('database.user'), $options);
	$sql = file_get_contents('./data/init.sql');
	$connection->exec($sql);

	echo 'Success! App is ready to use.' . "\n";
} catch (PDOException $error) {
	echo $sql . $error->getMessage() . "\n";
}
