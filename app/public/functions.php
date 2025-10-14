<?php

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

function isCurrentUrl(string $url): bool
{
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $currentPath = rtrim($currentPath, '/') ?: '/';
    $url = rtrim($url, '/') ?: '/';

    // Comprobación exacta para la página principal
    if ($url === '/') {
        return $currentPath === '/';
    }

    // Para otras rutas, verificar si la ruta actual comienza con la URL base
    return $currentPath === $url || str_starts_with($currentPath, $url . '/');
}


