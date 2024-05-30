<?php

namespace App;

class Router
{
    private array $routes = [];

    public function handle(): void
    {
        $uri = $_SERVER["REQUEST_URI"];
        $route = $this->matchRoute($uri);

        $controller = new $route->controller();
        $method = $route->method;
        echo $controller->$method();
    }

    public function addGet(string $path, string $controller, string $method): void
    {
        $route = new Route("GET", $path, $controller, $method);
        $this->routes[] = $route;
    }

    private function matchRoute(string $path): Route
    {
        foreach ($this->routes as $route) {
            if ($route->path === $path) {
                return $route;
            }
        }

        throw new \Exception("No route");
    }
}
