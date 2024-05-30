<?php

namespace Infrastructure\Controller\Web;

use Infrastructure\Controller\Controller;

class CustomerController implements Controller
{
    public function index(): HtmlResponse
    {
        return new HtmlResponse("<h1>Hello</h1>");
    }
}
