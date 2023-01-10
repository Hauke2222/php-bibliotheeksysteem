<?php

namespace App\Controllers;

class LoanController
{
    // PDO object used for connecting to the database
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get all book loans
    public function getallLoans()
    {
        $stmt = $this->db->prepare("SELECT * FROM book_loans");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Get all book loans from one user
    public function getLoansByUser($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM book_loans WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}
