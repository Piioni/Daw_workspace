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
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function createUserFromData($userData): User
    {
        $user = new User();
        $user->id = $userData['id_usuario'];
        $user->nombre = $userData['nombre'];
        $user->email = $userData['email'];
        $user->password = $userData['password'];
        $user->rol = $userData['id_rol'];
        return $user;
    }

    public function findById(int $id): ?User
    {
        $query = $this->pdo->prepare('SELECT * FROM usuarios WHERE id_usuario = ?');
        $query->execute([$id]);
        $userData = $query->fetch(PDO::FETCH_ASSOC);

        return $userData ? $this->createUserFromData($userData) : null;
    }

    public function findByEmail(string $email): ?User
    {
        $query = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);
        $userData = $query->fetch(PDO::FETCH_ASSOC);

        return $userData ? $this->createUserFromData($userData) : null;
    }

    public function save(User $user): bool
    {
        $query = $this->pdo->prepare(
            'INSERT INTO usuarios (nombre, email, password, id_rol) VALUES (?, ?, ?, ?)'
        );
        return $query->execute([$user->nombre, $user->email, $user->password, $user->rol]);
    }

    public function update(User $user): bool
    {
        $query = $this->pdo->prepare(
            'UPDATE usuarios SET nombre = ?, email = ?, password = ?, id_rol = ? WHERE id_usuario = ?'
        );
        return $query->execute([$user->nombre, $user->email, $user->password, $user->rol, $user->id]);
    }

    public function delete(int $id): bool
    {
        $query = $this->pdo->prepare('DELETE FROM usuarios WHERE id_usuario = ?');
        return $query->execute([$id]);
    }

    public function findAll(): array
    {
        $query = $this->pdo->query('SELECT * FROM usuarios');
        $users = [];

        while ($userData = $query->fetch(PDO::FETCH_ASSOC)) {
            $users[] = $this->createUserFromData($userData);
        }

        return $users;
    }
}