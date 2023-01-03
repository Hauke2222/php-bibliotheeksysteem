<?php

require 'routes.php';
require 'pdo.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function routeToControllerMethod($uri, $routes, $pdo)
{
    if (!array_key_exists($uri, $routes)) {
        abort();
    }

    $route = $routes[$uri];
    $controllerName = $route['controller'];
    $methodName = $route['method'];
    $view = $route['view'];

    // Create an instance of the controller 
    $controller = new $controllerName($pdo);

    // Call the method of the controller using call_user_func
    $data = call_user_func([$controller, $methodName]);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require $view;
    }
}

function abort($code = 404)
{
    http_response_code($code);
    echo "404 Not Found.";
    die();
}

routeToControllerMethod($uri, $routes, $pdo);
