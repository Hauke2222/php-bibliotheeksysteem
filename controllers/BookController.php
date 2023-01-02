<?php

class BookController
{
    // PDO object used for connecting to the database
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Create a new book
    public function create($title, $author, $price)
    {
        // Insert the new book into the database
        $stmt = $this->db->prepare("INSERT INTO books (title, author, price) VALUES (?, ?, ?)");
        $stmt->execute([$title, $author, $price]);
    }

    // Get a book by ID
    public function get($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Get all books
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM books");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getallLoans()
    {
        $stmt = $this->db->prepare("SELECT * FROM book_loans");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Update a book
    public function update($id, $title, $author, $price)
    {
        // Update the book in the database
        $stmt = $this->db->prepare("UPDATE books SET title = ?, author = ?, price = ? WHERE id = ?");
        $stmt->execute([$title, $author, $price, $id]);
    }

    // Delete a book
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = ?");
        $stmt->execute([$id]);
    }
}
