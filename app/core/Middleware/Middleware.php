<?php

namespace Core\Middleware;

class Middleware
{
    /**
     * Resuelve y ejecuta middlewares
     * Soporta múltiples middlewares: 'auth|admin' o 'guest'
     * También soporta parámetros: 'role:1,2,3'
     */
    public static function resolve($middlewares): void
    {
        if (!$middlewares) {
            return;
        }

        // Convertir a array si es string
        $middlewareList = is_string($middlewares)
            ? explode('|', $middlewares)
            : (array) $middlewares;

        foreach ($middlewareList as $middleware) {
            $middleware = trim($middleware);

            // Parsear middleware con parámetros: 'role:1,2' => ['role', '1,2']
            $parts = explode(':', $middleware);
            $key = $parts[0];
            $params = $parts[1] ?? null;

            $middlewareClass = match($key) {
                'auth' => Authenticated::class,
                'guest' => Guest::class,
                'admin' => Admin::class,
                'role' => Role::class,
                default => null,
            };

            if ($middlewareClass) {
                $instance = new $middlewareClass();
                if ($params && method_exists($instance, 'handle')) {
                    $instance->handle($params);
                } else {
                    $instance->handle();
                }
            }
        }
    }
}
