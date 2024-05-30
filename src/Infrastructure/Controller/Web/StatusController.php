<?php

namespace Infrastructure\Controller\Web;

use Infrastructure\Controller\Controller;
use Infrastructure\Controller\Response;

class StatusController implements Controller
{
    public function notFound(): Response
    {
        return new TemplateResponse("status/404", []);
    }
}
