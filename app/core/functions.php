<?php

// Define VIEW_DIR constant once
const VIEW_DIR = __DIR__.'/../src/view';

use JetBrains\PhpStorm\NoReturn;

#[NoReturn]
function dd($data): void
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function isUrl(string $url): bool
{
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

function isCurrentUrl($url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}

/**
 * Verificar si el usuario está autenticado
 */
function isAuthenticated(): bool
{
    return isset($_SESSION['id_usuario']);
}

/**
 * Obtener el usuario autenticado
 */
function getAuthUser(): ?array
{
    if (!isAuthenticated()) {
        return null;
    }

    return [
        'id' => $_SESSION['id_usuario'],
        'nombre' => $_SESSION['nombre'],
        'email' => $_SESSION['email'],
        'rol' => $_SESSION['id_rol']
    ];
}

/**
 * Obtener el nombre del usuario autenticado
 */
function getAuthUserName(): ?string
{
    return $_SESSION['user_name'] ?? null;
}
