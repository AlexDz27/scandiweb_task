<?php

use App\Router\Router;
use App\Database\Database;

require dirname(__DIR__) . '/vendor/autoload.php';

$router = new Router();

$database = new Database();

$database->test();