<?php

namespace Application\GetCustomer;

use Application\GetCustomer\Transformer\CustomerTransformer;
use Domain\Customer\CustomerRepository;
use Application\UseCase;

class GetCustomerUseCase implements UseCase
{
    public function __construct(
        private readonly CustomerRepository $customerRepository,
        private readonly CustomerTransformer $transformer,
        private readonly string $customerId
    ) {
    }

    public function execute(): GetCustomer
    {
        $customer = $this->customerRepository->getById($this->customerId);

        if (!$customer) {
            //
        }

        return $this->transformer->transform($customer);
    }
}
