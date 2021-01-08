<?php

namespace App\Router;

class NotFoundRoute extends Route
{
  public function __construct()
  {
    parent::__construct(null, 'NotFoundController', 'notFound');
  }
}