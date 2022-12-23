<?php
class Book
{
    public $id;
    public $title;
    public $author;
    public $isbn;
    public $available;
    public $available_on;

    public function __construct($id, $title, $author, $isbn, $available, $available_on)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->available = $available;
        $this->available_on = $available_on;
    }

    public function available()
    {
        // return $this->available;
    }
}
