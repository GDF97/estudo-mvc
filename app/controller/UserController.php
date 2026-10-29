<?php

require_once __DIR__ . "/../model/User.php";


class UserController
{
    
    private PDO $pdo;
    // private User $user;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function showUsers()
    {
        $user = new User($this->pdo);
        $users = $user->getUsers();
        require_once __DIR__ . "/../views/ShowUsers.php";
    }

    public function showForms()
    {
        require_once __DIR__ . "/../views/CreateUser.php";
    }

    public function createUser(string $name)
    {
        $user = new User($this->pdo);
        $response = $user->createUser($name);
    }
    
}


?>