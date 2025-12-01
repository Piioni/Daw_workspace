<?php

namespace Core\Middleware;

class Admin
{
    public function handle(): void
    {
        // Primero verificar autenticación
        if (! isset($_SESSION['id_usuario'])) {
            header('Location: /login');
            exit;
        }

        // Luego verificar rol de administrador (convertir a int para comparación segura)
        if ((int)$_SESSION['id_rol'] !== 1) {
            header('Location: /');
            exit;
        }
    }
}