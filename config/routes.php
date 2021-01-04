<?php

use App\Router\Route;

return [
  new Route('/product/list', 'IndexController', 'index'),
  new Route('/some', 'SomeController', 'some'),
];