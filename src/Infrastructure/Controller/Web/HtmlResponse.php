<?php

namespace Infrastructure\Controller\Web;

use Infrastructure\Controller\Response;

class HtmlResponse implements Response
{
    public function __construct(private readonly string $body)
    {
    }

    public function render(): string
    {
        header("Content-Type: text/html");
        return $this->body;
    }
}
