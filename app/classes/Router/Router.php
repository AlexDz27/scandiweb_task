<?php

namespace App\Router;

class Router
{
  private string $uri;

  /**
   * @var Route[] $routes
   */
  private array $routes;
  
  public function __construct()
  {
    $this->uri = $this->getUriWithoutParams();
    $GLOBALS['route_uri'] = $this->uri;

    $this->loadRoutes();
  }
  
  public function handleRoute()
  {
    $isRouteMatched = false;
    foreach ($this->routes as $route) {
      if ($this->uri === $route->uri) {
        $this->resolveRoute($route);
        $isRouteMatched = true;
        break;
      }
    }

    if (!$isRouteMatched) {
      $this->resolveRoute(new NotFoundRoute());
    }
  }

  private function resolveRoute(Route $route)
  {
    $controllerPath = $GLOBALS['project_dir'] . "/app/classes/Controllers/{$route->controllerName}.php";
    require_once $controllerPath;
    $controllerName = $this->getControllerName($controllerPath);

    $controller = new $controllerName();
    $controller->{$route->controllerMethod}();
  }
  
  private function loadRoutes()
  {
    $this->routes = require_once $GLOBALS['project_dir'] . '/config/routes.php';
  }

  private function getControllerName($path): string
  {
    $exploded = explode('/', $path);
    $nameWithPhpExt = end($exploded);

    return explode('.', $nameWithPhpExt)[0];
  }
  
  private function getUriWithoutParams(): string
  {
    $uri = $_SERVER['REQUEST_URI'];

    return explode('?', $uri)[0];
  }
}