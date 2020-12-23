<?php

use App\Router\Route;

return [
  new Route('/', 'IndexController', 'index'),
  new Route('/some', 'SomeController', 'some'),
];