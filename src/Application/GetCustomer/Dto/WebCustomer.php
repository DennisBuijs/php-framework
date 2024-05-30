<?php

namespace Application\GetCustomer\Dto;

use Application\GetCustomer\GetCustomer;

readonly class WebCustomer implements GetCustomer
{
    public function __construct(public string $name, public string $email)
    {
    }
}
