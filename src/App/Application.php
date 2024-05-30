<?php

namespace App;

class Application
{
    public function bootstrap(): void
    {
        $router = new Router();

        $router->addGet("/web/index", \Infrastructure\Controller\Web\CustomerController::class, "index");
        $router->addGet("/api/index", \Infrastructure\Controller\Api\CustomerController::class, "index");

        $router->handle();
    }
}
