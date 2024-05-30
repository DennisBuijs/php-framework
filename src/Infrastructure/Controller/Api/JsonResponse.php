<?php

namespace Infrastructure\Controller\Api;

use Infrastructure\Controller\Response;

class JsonResponse implements Response
{
    public function __construct(private readonly array $body)
    {
    }

    public function render(): string
    {
        header("Content-Type: application/json");
        return json_encode($this->body);
    }
}
