<?php

use App\App;
use App\Router\Router;

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/global_vars.php';

$app = new App('development');
$router = new Router();