<?php

namespace Domain\Customer;

use Kipkron\Collection\Collection;

/** @extends Collection<Customer> */
class CustomerCollection extends Collection
{
    public function __construct()
    {
        $this->of(Customer::class);
    }

    public function filterEmail(string $email): CustomerCollection
    {
        return $this->filter(static fn(Customer $customer) => $customer->email === $email);
    }
}
