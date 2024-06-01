<?php

namespace Application\CreateCustomer\Dto;

readonly class CreateCustomer
{
    public function __construct(public string $firstName, public string $lastName, public string $email)
    {
    }
}
