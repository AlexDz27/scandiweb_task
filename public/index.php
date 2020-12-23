<?php

use App\App;

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/global_vars.php';

$app = new App('development');
$app->run();