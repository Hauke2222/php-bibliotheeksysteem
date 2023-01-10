<?php

namespace App\Controllers;

class UserController
{
    // PDO object used for connecting to the database
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Create a new user
    public function create($name, $email, $password)
    {
        // Hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password_hash]);
    }

    // Get all users
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Get a user by ID
    public function get($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Update a user
    public function update($id, $name, $email, $password)
    {
        // Hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Update the user in the database
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
        $stmt->execute([$name, $email, $password_hash, $id]);
    }

    // Delete a user
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}
