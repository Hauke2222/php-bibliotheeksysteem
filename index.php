<?php

$names = ['h', 'b', 'l', 'n', 'j', 'j'];


try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=library_system', 'root', '');
} catch (PDOException $e) {
    die('Could not connect to the database.');
}

$statement = $pdo->prepare('select * from books');
$statement->execute();
$books = $statement->fetchAll(PDO::FETCH_OBJ);

var_dump($books);



require 'index.view.php';
