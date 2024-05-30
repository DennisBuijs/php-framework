<?php

namespace Http;

class IndexController implements Controller
{
    public function index(): string
    {
        return "<h1>Hello</h1>";
    }
}
