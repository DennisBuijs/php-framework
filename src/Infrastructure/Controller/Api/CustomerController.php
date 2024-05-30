<?php

namespace Infrastructure\Controller\Api;

use Infrastructure\Controller\Controller;
use Infrastructure\Controller\Api\JsonResponse;

class CustomerController implements Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse(["hello" => "world"]);
    }
}
