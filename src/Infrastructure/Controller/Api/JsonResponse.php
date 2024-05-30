<?php

namespace Infrastructure\Controller\Api;

use Infrastructure\Controller\Response;
use JsonSerializable;

class JsonResponse implements Response
{
    public function __construct(private readonly JsonSerializable $body)
    {
    }

    public function render(): string
    {
        header("Content-Type: application/json");
        return json_encode($this->body);
    }
}
