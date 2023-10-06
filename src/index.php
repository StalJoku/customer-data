<?php

require __DIR__ . '/includes/autoload.php';
require __DIR__ . '/routes.php';

use CustomerData\App\Config\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();

$uri = $_SERVER['REQUEST_URI'];

$router->dispatch($uri);

?>