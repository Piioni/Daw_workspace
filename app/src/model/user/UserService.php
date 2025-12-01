<?php

namespace model\user;

use model\user\UserRepository;
use model\user\User;

class UserService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getUserById(int $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    public function getUserByEmail(string $email): ?User
    {
        return $this->userRepository->findByEmail($email);
    }

    public function getAllUsers(): array
    {
        return $this->userRepository->findAll();
    }

    public function createUser(string $nombre, string $email, string $password, int $rol): bool
    {
        if (!$this->validateEmail($email)) {
            return false;
        }

        if (!$this->validateRol($rol)) {
            return false;
        }

        if ($this->userRepository->findByEmail($email) !== null) {
            return false; // Email already exists
        }

        $user = new User();
        $user->nombre = $nombre;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->rol = $rol;

        return $this->userRepository->save($user);
    }

    public function updateUser(User $user): bool
    {
        return $this->userRepository->update($user);
    }

    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }

    private function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function validateRol(int $rol): bool
    {
        return in_array($rol, [1, 2, 3]); // 1: Admin, 2: Usuario, 3: Moderador
    }
}