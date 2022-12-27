<?php

$names = ['h', 'b', 'l', 'n', 'j', 'j'];


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
        $statement = $pdo->prepare('select * from books');
        $statement->execute();
        $books = $statement->fetchAll(PDO::FETCH_OBJ);

        require 'views/books.view.php';
        // code to handle the about page
        break;
    case '/books/loans':
        // code to handle the contact page
        break;
    case '/books/create':
        // code to handle the contact page
        break;
    case '/users':
        // code to handle the contact page
        break;
    case '/users':
        // code to handle the contact page
        break;
    default:
        // code to handle any other pages
        http_response_code(404);
        break;
}





// var_dump($books);



require 'views/index.view.php';
