<?php

namespace App\Database;

use PDO;
use PDOException;

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'library_system';

function createTables($host, $username, $password, $database)
{
    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queries = [
            "CREATE TABLE users (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(255) NOT NULL,
                last_name VARCHAR(255) NOT NULL,
                email VARCHAR(255),
                password VARCHAR(255) NOT NULL,
                membership BOOLEAN NOT NULL,
                admin BOOLEAN NOT NULL
            )",
            "CREATE TABLE books (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                author VARCHAR(255) NOT NULL,
                isbn VARCHAR(255),
                available BOOLEAN NOT NULL,
                available_on DATE
            )",
            "CREATE TABLE book_loans (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT UNSIGNED NOT NULL,
                book_id INT UNSIGNED NOT NULL,
                extended BOOLEAN NOT NULL,
                return_date DATE,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE ON UPDATE CASCADE
            )"
        ];

        foreach ($queries as $query) {
            $conn->exec($query);
        }
        echo "Tables created successfully\n";

        // generate sample data
        $sampleData = [
            "INSERT INTO users (first_name, last_name, email, password, membership, admin) VALUES
                ('John', 'Doe', 'john.doe@example.com', 'password', 1, 0),
                ('Jane', 'Doe', 'jane.doe@example.com', 'password', 1, 0),
                ('admin', 'admin', 'admin@example.com', 'password', 1, 1)",
            "INSERT INTO books (title, author, isbn, available, available_on) VALUES
                ('Book 1', 'Author 1', '1234567890', 1, NULL),
                ('Book 2', 'Author 2', '0987654321', 1, NULL),
                ('Book 3', 'Author 3', '1231231230', 0, '2022-01-01')",
            "INSERT INTO book_loans (user_id, book_id, extended, return_date) VALUES
                (1, 1, 0, '2022-01-01'),
                (2, 2, 1, '2022-02-01')"
        ];

        foreach ($sampleData as $query) {
            $conn->exec($query);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function createDatabase($host, $username, $password, $database)
{
    try {
        $conn = new PDO("mysql:host=$host", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // create the database
        $sql = "CREATE DATABASE IF NOT EXISTS $database";
        $conn->exec($sql);
        echo "Database created successfully\n";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
}

createDatabase($host, $username, $password, $database);
createTables($host, $username, $password, $database);
