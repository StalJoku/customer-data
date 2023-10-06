<?php

declare(strict_types=1);

namespace CustomerData\App;

use CustomerData\App\Router;
use CustomerData\App\Controllers\FileUploadController;

$router = new Router();

$router->addRoute('/', FileUploadController::class, 'index');
