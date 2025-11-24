<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected array $routes = [];
    protected array $routeIndex = []; // Nuevo índice para búsqueda rápida
    protected $currentRoute = null;

    public function add($method, $uri, $handler, $directory = null): static
    {
        // Determinar si es un controlador o una vista
        $isController = is_array($handler);

        $route = [
            'uri' => $uri,
            'method' => strtoupper($method),
            'middleware' => null,
            'isController' => $isController
        ];

        if ($isController) {
            // Es un controlador [Controller::class, 'method']
            $route['controller'] = $handler[0];
            $route['action'] = $handler[1];
            $route['view'] = null;
            $route['directory'] = null;
        } else {
            // Es una vista tradicional
            $route['view'] = $handler;
            $route['directory'] = $directory;
            $route['controller'] = null;
            $route['action'] = null;
        }

        $this->routes[] = $route;

        // Crear índice para búsqueda O(1)
        $key = $this->getRouteKey($uri, $method);
        $this->routeIndex[$key] = count($this->routes) - 1;

        $this->currentRoute = count($this->routes) - 1;
        return $this;
    }

    public function get($uri, $handler, $directory = null): static
    {
        return $this->add('GET', $uri, $handler, $directory);
    }

    public function post($uri, $handler, $directory = null): static
    {
        return $this->add('POST', $uri, $handler, $directory);
    }

    public function delete($uri, $handler, $directory = null): static
    {
        return $this->add('DELETE', $uri, $handler, $directory);
    }

    public function patch($uri, $handler, $directory = null): static
    {
        return $this->add('PATCH', $uri, $handler, $directory);
    }

    public function put($uri, $handler, $directory = null): static
    {
        return $this->add('PUT', $uri, $handler, $directory);
    }

    public function only($middleware): static
    {
        if ($this->currentRoute !== null) {
            $this->routes[$this->currentRoute]['middleware'] = $middleware;
        }
        return $this;
    }

    protected function getRouteKey(string $uri, string $method): string
    {
        return strtoupper($method) . ':' . $uri;
    }

    public function match($uri, $method): ?array
    {
        $method = strtoupper($method);
        $key = $this->getRouteKey($uri, $method);

        // Búsqueda O(1) usando el índice
        if (isset($this->routeIndex[$key])) {
            $route = $this->routes[$this->routeIndex[$key]];
            Middleware::resolve($route['middleware']);
            return $route;
        }

        return null;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}
