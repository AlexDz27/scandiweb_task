<?php

use App\App;
use App\Router\Router;
use App\Database;

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/global_vars.php';

$app = new App('development');
$router = new Router();

$database = new Database();

$database->test();