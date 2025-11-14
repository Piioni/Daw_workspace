<?php

namespace model\repository;

use model\Database;
use model\entity\User;
use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->$pdo->get();
    }

    public function createUserFromData($userData): User
    {
        $user = new User();
        $user->setId($userData['id_usuario']);
        $user->setNombre($userData['nombre']);
        $user->setEmail($userData['email']);
        $user->setPassword($userData['password']);
        $user->setRol($userData['id_rol']);
        return $user;
    }
}