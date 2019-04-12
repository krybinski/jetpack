<?php

use Jetpack\User;

class Router
{
    /**
     * All registered routes.
     */
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Load a user's routes file.
     */
    public static function load($file)
    {
        $router = new static;

        require $file;
        return $router;
    }

    /**
     * Register a GET route.
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Register a POST route.
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Load the requested URI's associated controller method.
     */
    public function direct($uri, $requestType)
    {
        $userControl = new User;
        $username = $userControl->getUserByUsername($uri);

        // If uri contains edit, go to edit controller
        if (($pos = strpos($uri, '/')) !== false) {
            if (strpos($uri, 'edit') !== false) {
                $param = substr($uri, $pos+1);
                $uri = 'edit';
            }
        }
        // Gather all users from the database and compare against uri
        else if ($username) {
            $uri = 'user';
        }

        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', 'Jetpack\Controllers\\' . $this->routes[$requestType][$uri])
            );
        } else {
            return $this->callAction(
                ...explode('@', 'Jetpack\Controllers\\' . $this->routes[$requestType]['404'])
            );
        }
    }

    /**
     * Load and call the relevant controller action.
     * @param $controller
     * @param $action
     * @return mixed
     * @throws Exception
     */
    protected function callAction($controller, $action)
    {
        $controller = new $controller();

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action();
    }
}
