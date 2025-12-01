<?php

namespace Core\Middleware;

class Role
{
    /**
     * Verifica que el usuario tenga uno de los roles especificados
     * Uso en rutas: $router->post('/admin', [AdminController::class, 'store'])->only('role:1,2');
     *
     * @param string $rolesParam Roles permitidos separados por coma: '1,2,3'
     */
    public function handle(string $rolesParam = ''): void
    {
        // Primero verificar autenticación
        if (! isset($_SESSION['id_usuario'])) {
            header('Location: /login');
            exit;
        }

        if (empty($rolesParam)) {
            return;
        }

        // Parsear roles permitidos
        $allowedRoles = array_map('intval', explode(',', $rolesParam));
        $userRole = (int) ($_SESSION['id_rol'] ?? 0);

        if (! in_array($userRole, $allowedRoles, true)) {
            header('Location: /');
            exit;
        }
    }
}

