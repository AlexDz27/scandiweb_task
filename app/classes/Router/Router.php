<?php

namespace App\Router;

class Router
{
  public function __construct()
  {
    $uri = $_SERVER['REQUEST_URI'];

    if ($uri === '/') {
      require_once dirname(dirname(__DIR__)) . '/templates/pages/index.php';
    }

    if ($uri === '/some') {
      require_once dirname(dirname(__DIR__)) . '/templates/pages/some.php';
    }
  }
}