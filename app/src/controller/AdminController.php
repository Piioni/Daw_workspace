<?php

namespace App\Controller;

use model\user\UserService;

class AdminController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * Mostrar panel de administración
     */
    public function dashboard(): void
    {
        $users = $this->userService->getAllUsers();
        $totalUsers = count($users);
        $adminCount = count(array_filter($users, fn($u) => $u->rol == 1));
        $moderatorCount = count(array_filter($users, fn($u) => $u->rol == 3));
        $userCount = count(array_filter($users, fn($u) => $u->rol == 2));

        $this->view('admin.php', '/pages/usuario', [
            'title' => 'Panel de Administración',
            'users' => $users,
            'totalUsers' => $totalUsers,
            'adminCount' => $adminCount,
            'moderatorCount' => $moderatorCount,
            'userCount' => $userCount
        ]);
    }
}

