<?php

namespace Framework;

use Infrastructure\Controller\Request;
use Infrastructure\Controller\Web\StatusController;

class Router
{
    private array $routes = [];

    private array $statusRoutes;

    public function __construct()
    {
        $this->statusRoutes = [
            "404" => new Route("", "", StatusController::class, "notFound"),
        ];
    }

    public function handle(): void
    {
        $uri = $_SERVER["REQUEST_URI"];
        $route = $this->matchRoute($uri);

        $controller = new $route->controller();
        $method = $route->method;
        echo $controller->$method(new Request($route->getParameters()))->render();
    }

    public function addGet(string $path, string $controller, string $method): void
    {
        $route = new Route("GET", $path, $controller, $method);
        $this->routes[] = $route;
    }

    private function matchRoute(string $path): Route
    {
        usort($this->routes, function ($a, $b) {
            return substr_count($b->path, "/") - substr_count($a->path, "/") ?:
                substr_count($a->path, ":") - substr_count($b->path, ":");
        });

        foreach ($this->routes as $route) {
            $pattern = preg_replace("/:\w+/", "([^/]+)", $route->path);
            $pattern = str_replace("/", "\/", $pattern);
            if (preg_match("/^" . $pattern . '$/', $path, $matches)) {
                array_shift($matches);

                $params = [];
                preg_match_all("/:(\w+)/", $route->path, $paramNames);
                foreach ($paramNames[1] as $index => $name) {
                    $params[$name] = $matches[$index];
                }

                return $route->withParameters($params);
            }
        }

        return $this->statusRoutes["404"];
    }
}
