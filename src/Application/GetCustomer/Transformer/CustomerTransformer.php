<?php

namespace Application\GetCustomer\Transformer;

use Application\GetCustomer\GetCustomer;
use Domain\Customer\Customer;

interface CustomerTransformer
{
    public function transform(Customer $customer): GetCustomer;
}
