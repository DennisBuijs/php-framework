<?php

namespace App;

use Http\IndexController;

class Application
{
    public function bootstrap(): void
    {
        $router = new Router();

        $router->addGet("/index", IndexController::class, "index");

        $router->handle();
    }
}
