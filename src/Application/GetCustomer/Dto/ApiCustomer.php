<?php

namespace Application\GetCustomer\Dto;

use Application\GetCustomer\GetCustomer;

readonly class ApiCustomer implements GetCustomer
{
    public function __construct(
        public string $id,
        public string $firstName,
        public string $lastName,
        public string $email
    ) {
    }
}
