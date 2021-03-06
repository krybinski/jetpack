<?php

use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;

/**
 * Get url for a route by using either name/alias, class or method name.
 *
 * The name parameter supports the following values:
 * - Route name
 * - Controller/resource name (with or without method)
 * - Controller class name
 *
 * When searching for controller/resource by name, you can use this syntax "route.name@method".
 * You can also use the same syntax when searching for a specific controller-class "MyController@home".
 * If no arguments is specified, it will return the url for the current loaded route.
 *
 * @param string|null $name
 * @param string|array|null $parameters
 * @param array|null $getParams
 * @return \Pecee\Http\Url
 * @throws \InvalidArgumentException
 */
function url(?string $name = null, $parameters = null, ?array $getParams = null): Url
{
    return Router::getUrl($name, $parameters, $getParams);
}

/**
 * @return \Pecee\Http\Response
 */
function response(): Response
{
    return Router::response();
}

/**
 * @return \Pecee\Http\Request
 */
function request(): Request
{
    return Router::request();
}

/**
 * Get input class
 * @param string|null $index Parameter index name
 * @param string|null $defaultValue Default return value
 * @param array ...$methods Default methods
 * @return \Pecee\Http\Input\InputHandler|\Pecee\Http\Input\IInputItem|string
 */
function input($index = null, $defaultValue = null, ...$methods)
{
    if ($index !== null) {
        return request()->getInputHandler()->getValue($index, $defaultValue, ...$methods);
    }

    return request()->getInputHandler();
}

/**
 * @param string $url
 * @param int|null $code
 */
function redirect(string $url, ?int $code = null): void
{
    if ($code !== null) {
        response()->httpCode($code);
    }

    response()->redirect($url);
}

/**
 * Get current csrf-token
 * @return string|null
 */
function csrf_token(): ?string
{
    $baseVerifier = Router::router()->getCsrfVerifier();
    if ($baseVerifier !== null) {
        return $baseVerifier->getTokenProvider()->getToken();
    }

    return null;
}

/**
 * Render view file
 *
 * @param string $view
 * @return void
 */
function view(string $view, array $variables = [])
{
	// Specify our Twig templates location
	$loader = new Twig_Loader_Filesystem(dirname(__DIR__, 1) . '/views');
	// Instantiate our Twig
	$twig = new Twig_Environment($loader);
	// Append custom functions to view
	appendTwigCustomFunctions($twig);

	echo $twig->render($view . '.html.twig', $variables);
}

/**
 * Append custom functions to twig templating
 */
function appendTwigCustomFunctions($twig): void
{
	$fnConfig = new \Twig_SimpleFunction('config', function (string $path) {
		$filename = explode('.', $path)[0];
		$variable = explode('.', $path)[1];
		$load = include(dirname(__DIR__, 1) . '/config/' . $filename . '.php');
		return $load[$variable];
	});

	$functions = array($fnConfig);

	foreach ($functions as $fn) {
		$twig->addFunction($fn);
	}
}
