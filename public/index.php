<?php

$root = __DIR__ . '/..';

require $root . '/vendor/autoload.php';

Router::load($root . '/app/routes.php')->direct(getUri(), getMethod());
