<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected array $routes = [];
    protected array $routeIndex = []; // Nuevo índice para búsqueda rápida
    protected $currentRoute = null;

    public function add($method, $uri, $view, $directory): static
    {
        $route = [
            'uri' => $uri,
            'view' => $view,
            'directory' => $directory,
            'method' => strtoupper($method),
            'middleware' => null
        ];

        $this->routes[] = $route;

        // Crear índice para búsqueda O(1)
        $key = $this->getRouteKey($uri, $method);
        $this->routeIndex[$key] = count($this->routes) - 1;

        $this->currentRoute = count($this->routes) - 1;
        return $this;
    }

    public function get($uri, $view, $directory = '/pages'): static
    {
        return $this->add('GET', $uri, $view, $directory);
    }

    public function post($uri, $view, $directory = '/pages'): static
    {
        return $this->add('POST', $uri, $view, $directory);
    }

    public function delete($uri, $view, $directory = '/pages'): static
    {
        return $this->add('DELETE', $uri, $view, $directory);
    }

    public function patch($uri, $view, $directory = '/pages'): static
    {
        return $this->add('PATCH', $uri, $view, $directory);
    }

    public function put($uri, $view, $directory = '/pages'): static
    {
        return $this->add('PUT', $uri, $view, $directory);
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
