<?php

namespace LibrarySystem;

use PDOException;
use PDO;
use LibrarySystem\Controllers\AuthController;
use LibrarySystem\Controllers\BookController;
use LibrarySystem\Controllers\UserController;

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=library_system', 'root', '');
} catch (PDOException $e) {
    die('Could not connect to the database.');
}

$request_uri = $_SERVER['REQUEST_URI'];

switch ($request_uri) {
    case '/':
        // code to handle the homepage
        break;
    case '/books':
        $controller = new BookController($pdo);
        $books = $controller->getAll();
        require 'views/books/books.view.php';
        break;
    case '/books/loans':
        $userController = new UserController($pdo);
        $bookController = new BookController($pdo);
        $loans = $bookController->getAllLoans();
        require 'views/books/loans.view.php';
        break;
    case '/books/create':
        $authController = new AuthController($pdo);
        if ($authController->isAdmin()) {
            $controller = new BookController($pdo);
            require 'views/books/create.view.php';
        } else {
            // User is not authenticated, redirect to login page
            header('Location: /login');
        }
        break;
    case '/users':
        $controller = new UserController($pdo);
        $users = $controller->getAll();
        require 'views/users/users.view.php';
        break;
    case '/users/create':
        $controller = new UserController($pdo);
        require 'views/users/create.view.php';
        break;
    case '/login':
        require 'views/login.view.php';
    default:
        // code to handle any other pages
        http_response_code(404);
        break;
}
