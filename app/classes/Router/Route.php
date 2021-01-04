<?php

namespace App\Router;

class Route
{
  public ?string $uri;
  public string $controllerName;
  public string $controllerMethod;

  public function __construct(?string $uri, string $controllerName, string $controllerMethod)
  {
    $this->uri = $uri;
    $this->controllerName = $controllerName;
    $this->controllerMethod = $controllerMethod;
  }
}