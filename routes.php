<?php

$routes = [
    '/books' => [
        'controller' => 'BookController',
        'method' => 'getAll',
        'view' => 'views/books/books.view.php',
    ],
    '/books/create' => [
        'controller' => 'BookController',
        'method' => 'create',
        'view' => 'views/books/create.view.php',
    ],
    '/books/loans' => [
        'controller' => 'LoanController',
        'method' => 'getAllLoans',
        'view' => 'views/books/loans.view.php',
    ],
    '/books/user/loans' => [
        'controller' => 'LoanController',
        'method' => 'getLoansByUser',
        'view' => 'views/books/loans.view.php',
    ],
    '/users' => [
        'controller' => 'UserController',
        'method' => 'getAll',
        'view' => 'views/users/users.view.php',
    ],
    '/users/create' => [
        'controller' => 'UserController',
        'method' => 'create',
        'view' => 'views/users/create.view.php',
    ],
    '/login' => [
        'controller' => 'AuthController',
        'method' => 'login',
        'view' => 'views/login.view.php',
    ],
];
