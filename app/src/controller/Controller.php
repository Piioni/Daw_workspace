<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;

/**
 * Clase base para todos los controladores
 * Proporciona métodos helper comunes
 */
abstract class Controller
{
   /**
     * Renderizar una vista
     *
     * @param string $view Nombre del archivo de vista (ej: 'home_cliente.php')
     * @param string $directory Directorio de la vista (ej: '/pages/cliente')
     * @param array $data Datos a pasar a la vista
     * @return void
     */
    protected function view(string $view, string $directory = '/pages', array $data = []): void
    {
        // Extraer datos para que estén disponibles como variables en la vista
        extract($data);

        $viewPath = VIEW_DIR . $directory . '/' . $view;

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            http_response_code(404);
            require VIEW_DIR . '/pages/errors/404.php';
        }
    }

    /**
     * Retornar respuesta JSON
     *
     * @param mixed $data Datos a convertir en JSON
     * @param int $status Código de estado HTTP
     * @return void
     */
    #[NoReturn]
    protected function json(mixed $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Redirigir a otra URL
     *
     * @param string $url URL a la que redirigir
     * @return void
     */
    #[NoReturn]
    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

    /**
     * Obtener dato del request
     *
     * @param string $key Clave del dato
     * @param  mixed|null  $default Valor por defecto si no existe
     * @return mixed
     */
    protected function input(string $key, mixed $default = null): mixed
    {
        return $_POST[$key] ?? $_GET[$key] ?? $default;
    }

    /**
     * Verificar si el request es POST
     *
     * @return bool
     */
    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Verificar si el request es GET
     *
     * @return bool
     */
    protected function isGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
}

