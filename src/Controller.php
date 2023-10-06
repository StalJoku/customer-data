<?php

declare(strict_types=1);

namespace CustomerData\App;

class Controller 
{   
    /**
     * @return void
     */
    protected function render($view, $data = []): void
    {
        extract($data);

        include "Views/$view.php";
    }
}