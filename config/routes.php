<?php

use App\Router\Route;

return [
  new Route('/product/list', 'ProductController', 'list'),
  new Route('/product/delete', 'ProductController', 'delete'),

  new Route('/some', 'SomeController', 'some'),
];