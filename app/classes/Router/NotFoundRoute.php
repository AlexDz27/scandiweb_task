<?php

namespace App\Router;

class NotFoundRoute extends Route
{
  public ?string $uri;
  public string $controllerName;
  public string $controllerMethod;

  public function __construct()
  {
    parent::__construct(null, 'NotFoundController', 'notFound');
  }
}