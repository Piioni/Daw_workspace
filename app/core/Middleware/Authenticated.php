<?php

namespace Core\Middleware;

class Authenticated
{
    public function handle(): void
    {
        if (! isset($_SESSION['id_usuario'])) {
            header('Location: /login');
            exit;
        }
    }
}

