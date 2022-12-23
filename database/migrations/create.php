<?php


function createTables()
{
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDBPDO";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $users = "CREATE TABLE users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            email VARCHAR(255),
            password VARCHAR(255) NOT NULL,
            membership BOOLEAN NOT NULL,
            admin BOOLEAN NOT NULL,
        )";

        $books = "CREATE TABLE books (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            author VARCHAR(255) NOT NULL,
            isbn VARCHAR(255),
            available BOOLEAN NOT NULL,
            available_on DATE,
        )";

        $book_loans = "CREATE TABLE books (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id VARCHAR(255) NOT NULL FOREIGN KEY,
            book_id VARCHAR(255) NOT NULL FOREIGN KEY,
            extended BOOLEAN NOT NULL,
            return_date DATE,
        )";

        // use exec() because no results are returned
        $conn->exec($users, $books, $book_loans);
        echo "Tables created successfully";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
}
