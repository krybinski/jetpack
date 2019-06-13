<?php

/**
 * Get variable from configs
 */
function config(string $path)
{
	$filename = explode('.', $path)[0];
	$variable = explode('.', $path)[1];
	$load = include('../config/' . $filename . '.php');
	return $load[$variable];
}

/**
 * Get filtered $_POST values.
 * @return array
 */
function filter_post()
{
    $post = filter_input_array(INPUT_POST);
    $post = array_map('trim', $post);
    $post = array_map ('htmlspecialchars', $post);
    return $post;
}

/**
 * Get filtered $_GET values.
 * @return array
 */
function filter_get()
{
    $get = filter_input_array(INPUT_GET);
    $get = array_map('trim', $get);
    $get = array_map ('htmlspecialchars', $get);
    return $get;
}

/**
 * Get protocol.
 * @return string
 */
function getProtocol()
{
    return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
}

/**
 * Get URI path.
 * @return string
 */
function getUri()
{
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    return $uri;
}

/**
 * Get request method.
 * @return string
 */
function getMethod()
{
    $method = $_SERVER['REQUEST_METHOD'];
    return $method;
}

/**
 * Generate route path
 * @param $path
 * @return string
 */
function route($url) {
	if (substr($url, -1) === '/') {
		return substr($url, 0, -1);
	}

	return $url;
}

require_once '../vendor/pecee/simple-router/helpers.php';
