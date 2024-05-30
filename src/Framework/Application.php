<?php

namespace Framework;

class Application
{
    public function bootstrap(): void
    {
        $router = new Router();

        $router->addGet("/web/customer/:id", \Infrastructure\Controller\Web\CustomerController::class, "get");

        $router->addGet("/api/customer/:id", \Infrastructure\Controller\Api\CustomerController::class, "get");

        $router->handle();
    }
}
