<?php

namespace Domain\Customer;

use DomainException;

class CustomerRepository
{
    public function getById(string $id): Customer
    {
        foreach ($this->getMock() as $customer) {
            if ($customer->id === $id) {
                return $customer;
            }
        }

        throw new DomainException("Customer not found");
    }

    private function getMock(): array
    {
        return [
            new Customer("b10f7c32-cb25-4746-8e73-30cfc6da94f7", "Tonya", "Dickinson", "tonya.dickinson@example.org"),
            new Customer("b9e69ee8-4d9a-4466-bd8a-c4d6c534cd52", "Dexter", "Schulist", "dexter.schulist@example.org"),
        ];
    }
}
