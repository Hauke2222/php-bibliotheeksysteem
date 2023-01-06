<?php

$router->get('/books', 'BookController@getAll');
$router->get('/books/loans', 'LoanController@getAllLoans');
$router->get('/books/user/loans', 'LoanController@getLoansByUser');
$router->get('/users', 'UserController@getAll');

$router->get('/users/create', function () {
    include 'views/users/create.view.php';
});
$router->get('/books/create', function () {
    include 'views/books/create.view.php';
});
$router->get('/login', function () {
    include 'views/login.view.php';
});

$router->post('/login', 'AuthController@login');
$router->post('/books/create', 'BookController@create');
$router->post('/users/create', 'UserController@create');
