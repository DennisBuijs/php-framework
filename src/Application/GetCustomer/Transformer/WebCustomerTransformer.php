<?php

namespace Application\GetCustomer\Transformer;

use Application\GetCustomer\Dto\WebCustomer;
use Application\GetCustomer\Transformer\CustomerTransformer;
use Domain\Customer\Customer;

class WebCustomerTransformer implements CustomerTransformer
{
    public function transform(Customer $customer): WebCustomer
    {
        return new WebCustomer($customer->firstName . " " . $customer->lastName, $customer->email);
    }
}
