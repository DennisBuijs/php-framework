<?php

namespace Application\GetCustomer\Transformer;

use Application\GetCustomer\Dto\ApiCustomer;
use Application\GetCustomer\Transformer\CustomerTransformer;
use Domain\Customer\Customer;

class ApiCustomerTransformer implements CustomerTransformer
{
    public function transform(Customer $customer): ApiCustomer
    {
        return new ApiCustomer($customer->id, $customer->firstName, $customer->lastName, $customer->email);
    }
}
