<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'library_system';

function dropDatabase($host, $username, $password, $database)
{
    try {
        $conn = new PDO("mysql:host=$host", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DROP DATABASE IF EXISTS $database";
        $conn->exec($sql);
        echo "Database dropped successfully\n";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
}

// example usage
dropDatabase($host, $username, $password, $database);
