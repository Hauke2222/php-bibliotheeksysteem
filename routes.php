<?php

$routes = [
    // '/' => [
    //     'controller' => 'HomeController',
    // ],
    '/books' => [
        'controller' => 'BookController',
    ],
    '/books/loans' => [
        'controller' => 'BookController',
    ],
    '/books/create' => [
        'controller' => 'BookController',
        'middleware' => 'IsAdmin',
    ],
    '/users' => [
        'controller' => 'UserController',
    ],
    '/users/create' => [
        'controller' => 'UserController',
    ],
    '/login' => [
        'controller' => 'AuthController',
    ],
];
