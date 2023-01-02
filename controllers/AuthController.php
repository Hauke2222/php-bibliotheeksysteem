<?php

class AuthController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function check()
    {
        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function isAdmin()
    {
        // Check if the user is an admin
        if (isset($_SESSION['user_id'])) {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ? AND admin = true');
            $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch();

            if ($user) {
                // User is an admin
                return true;
            } else {
                // User is not an admin
                return false;
            }
        } else {
            // User is not logged in
            return false;
        }
    }

    public function login($email, $password)
    {
        // Check if the email and password match a user in the database
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
        $stmt->execute([$email, $password]);
        $user = $stmt->fetch();

        if ($user) {
            // Login successful, set the user_id session variable
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            // Login failed
            return false;
        }
    }

    public function logout()
    {
        // Unset the user_id session variable
        unset($_SESSION['user_id']);
    }
}
