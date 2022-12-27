<?php
class User
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    private $password;
    public $membership;
    public $admin;

    public function __construct($id, $firstName, $lastName, $email, $password, $membership, $admin)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->membership = $membership;
        $this->admin = $admin;
    }
}
