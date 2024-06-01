<?php

namespace Domain\Customer;

use Infrastructure\Collection\Collection;

/** @extends Collection<Customer> */
class CustomerCollection extends Collection
{
    public function filterEmail(string $email): CustomerCollection
    {
        return CustomerCollection::fromArray(
            array_filter($this->all(), static fn(Customer $customer) => $customer->email === $email)
        );
    }
}
