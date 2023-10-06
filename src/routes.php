<?php

declare(strict_types=1);

namespace Jake\FileReader;

use Jake\FileReader\Router;
use Jake\FileReader\Controllers\FileUploadController;

$router = new Router();

$router->addRoute('/', FileUploadController::class, 'index');
