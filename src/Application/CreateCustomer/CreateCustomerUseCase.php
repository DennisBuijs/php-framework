<?php

namespace Application\CreateCustomer;

use Application\CreateCustomer\Dto\CreateCustomer;
use Application\GetCustomer\GetCustomer;
use Application\GetCustomer\Transformer\CustomerTransformer;
use Domain\Customer\CustomerRepository;
use Application\UseCase;

class CreateCustomerUseCase implements UseCase
{
    public function __construct(
        private readonly CustomerRepository $customerRepository,
        private readonly CustomerTransformer $transformer,
        private readonly CreateCustomer $createCustomer
    ) {
    }

    public function execute(): GetCustomer
    {
        $customer = $this->customerRepository->create($this->createCustomer);

        return $this->transformer->transform($customer);
    }
}
