<?php

class ViewRenderer
{
  private array $config;

  public function __construct(array $config)
  {
    $this->config = $config;
  }

  public function render(string $route): void
  {
    $routeInfo = null;

    if (isset($this->config['routes'][$route])) {
      $routeInfo = $this->config['routes'][$route];
    }

    if (!$routeInfo) {
      $this->renderErrorPage();
      return;
    }

    $this->loadView($routeInfo['view'], $routeInfo['directory']);
  }

  private function loadView(string $viewFile, string $directory): void
  {
    $viewPaths = $this->buildViewPaths($viewFile, $directory);

    foreach ($viewPaths as $path) {
      if (file_exists($path)) {
        // Asegurar que las variables globales estén disponibles en la vista
        global $VIEW_DIR, $PUBLIC_DIR;
        $VIEW_DIR = $GLOBALS['VIEW_DIR'];
        $PUBLIC_DIR = $GLOBALS['PUBLIC_DIR'];
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
      if (isset($this->config['routes']['/404'])) {
        $errorInfo = $this->config['routes']['/404'];
        $this->loadView($errorInfo['view'], $errorInfo['directory']);
      } else {
        echo "Página no encontrada y no se pudo cargar la página de error.";
      }
    } catch (RuntimeException) {
      echo "Error del servidor: No se puede cargar la página de error";
    }
  }
}

function handleRequest(): void
{
  $routeConfig = require __DIR__ . '/../config/routes.php';

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
}

