<?php

namespace Core\Middleware;

class Middleware
{
    public static function resolve($key): void
    {
        if (!$key) {
            return;
        }

        $middleware = match($key) {
            'auth' => Authenticated::class,
            'guest' => Guest::class,
            default => null,
        };

        if ($middleware) {
            (new $middleware())->handle();
        }
    }
}
