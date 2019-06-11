<?php

$root = __DIR__ . '/..';

require $root . '/vendor/autoload.php';

Router::load($root . '/routes/web.php');
