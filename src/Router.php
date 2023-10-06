<?php

declare(strict_types=1);

namespace Jake\FileReader;

class Router 
{
    /**
     * @var array
     */
    protected $routes = [];

    /**
     * @param string $route
     * @param string $controller
     * @param string $action
     * @return void
     */
    public function addRoute(string $route, string $controller, string $action): void 
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * @param string $uri
     * @return void
     */
    public function dispatch($uri): void
    {
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }
}