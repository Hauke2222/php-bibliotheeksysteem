<?php

use LibrarySystem\Controllers\AuthController;
use LibrarySystem\Controllers\BookController;
use LibrarySystem\Controllers\UserController;

require 'controllers/AuthController.php';
require 'controllers/BookController.php';
require 'controllers/UserController.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/books' => ['controller' => 'BookController', 'method' => 'index'],
    '/books/loans' => ['controller' => 'BookController', 'method' => 'loans'],
    // '/books/create' => [
    //     'controller' => 'BookController',
    //     'method' => 'create',
    //     'middleware' => 'IsAdmin',
    // ],
    '/users' => ['controller' => 'UserController', 'method' => 'index'],
    '/users/create' => ['controller' => 'UserController', 'method' => 'create'],
    '/login' => ['controller' => 'AuthController', 'method' => 'login'],
];

function routeToControllerMethod($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        $route = $routes[$uri];
        $controllerName = $route['controller'];
        $methodName = $route['method'];

        // Check if the middleware exists and run it
        // if (isset($route['middleware'])) {
        //     $middlewareName = $route['middleware'];
        //     $middleware = new $middlewareName();
        //     if (!$middleware->handle()) {
        //         return;
        //     }
        // }

        // Create an instance of the controller and call the method
        $controller = new $controllerName();
        $controller->$methodName();
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    echo "404 Not Found.";
    die();
}

routeToControllerMethod($uri, $routes);
