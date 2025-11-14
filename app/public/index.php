<?php
session_start();

require_once __DIR__ . '/../core/functions.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Middleware/Middleware.php';
require_once __DIR__ . '/../core/Middleware/Authenticated.php';
require_once __DIR__ . '/../core/Middleware/Guest.php';

use Core\Router;

try {
    $config = require __DIR__ . '/../config/routes.php';

    if (!is_array($config) || !isset($config['router'])) {
        throw new \Exception('Router configuration missing');
    }

    if (!$config['router'] instanceof Router) {
        throw new \Exception('Invalid router instance');
    }

    $router = $config['router'];
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];

    $route = $router->match($uri, $method);

    if ($route) {
        $viewPath = VIEW_DIR . $route['directory'] . '/' . $route['view'];

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            http_response_code(404);
            require VIEW_DIR . '/pages/errors/404.php';
        }
    } else {
        http_response_code(404);
        require VIEW_DIR . '/pages/errors/404.php';
    }
} catch (\Exception $e) {
    http_response_code(500);
    echo "Error: " . $e->getMessage();
}