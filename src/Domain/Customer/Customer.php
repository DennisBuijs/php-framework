<?php

namespace Domain\Customer;

use JsonSerializable;

readonly class Customer implements JsonSerializable
{
    public function __construct(
        public string $id,
        public string $firstName,
        public string $lastName,
        public string $email
    ) {
    }

    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->id,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "email" => $this->email,
        ];
    }
}
