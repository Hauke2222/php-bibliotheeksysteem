<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=library_system', 'root', '');
} catch (PDOException $e) {
    die('Could not connect to the database.');
}
