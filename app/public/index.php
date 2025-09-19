<?php
$routeConfig = require __DIR__ . '/../config/routes.php';

session_start();

class ViewRenderer 
{
    private array $config;
    
    public function __construct(array $config)
    {
        $this->config = $config;
    }
    
    public function render(string $route): void
    {
        $routeInfo = $this->resolveRoute($route);
        
        if (!$routeInfo) {
            $this->renderErrorPage();
            return;
        }
        
        $this->loadView($routeInfo['view'], $routeInfo['directory']);
    }
    
    private function resolveRoute(string $route): ?array
    {
        if (isset($this->config['routes'][$route])) {
            $routeData = $this->config['routes'][$route];
            
            // Soporte para formato legacy (string directo)
            if (is_string($routeData)) {
                return [
                    'view' => ltrim($routeData, '/'),
                    'directory' => $this->config['default_directory']
                ];
            }
            
            // Formato nuevo (array con view y directory)
            return $routeData;
        }
        
        return null;
    }
    
    private function loadView(string $viewFile, string $directory): void
    {
        $viewPaths = $this->buildViewPaths($viewFile, $directory);
        
        foreach ($viewPaths as $path) {
            if (file_exists($path)) {
                include($path);
                return;
            }
        }
        
        throw new RuntimeException("Vista no encontrada: $viewFile en directorio: $directory");
    }
    
    private function buildViewPaths(string $viewFile, string $directory): array
    {
        $baseDir = $this->config['view_dir'];
        $paths = [];

        // Solo arma la ruta principal: baseDir/directory/viewFile
        $paths[] = $baseDir . '/' . $directory . '/' . $viewFile;

        return $paths;
    }
    
    private function renderErrorPage(): void
    {
        http_response_code(404);
        
        try {
            $errorRoute = $this->config['default_error_route'] ?? '/404';
            $errorRouteInfo = $this->resolveRoute($errorRoute);
            
            if ($errorRouteInfo) {
                $this->loadView($errorRouteInfo['view'], $errorRouteInfo['directory']);
            } else {
                echo "Error 404: Página no encontrada";
            }
        } catch (RuntimeException $e) {
            echo "Error del servidor: No se puede cargar la página de error";
        }
    }
}

// Obtener la ruta solicitada y normalizar
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathInfo = rtrim($requestUri, '/') ?: '/';

// Renderizar la página
try {
    $renderer = new ViewRenderer($routeConfig);
    $renderer->render($pathInfo);
} catch (RuntimeException $e) {
    http_response_code(500);
    error_log("Error de renderizado: " . $e->getMessage());
    echo "Error interno del servidor";
}
