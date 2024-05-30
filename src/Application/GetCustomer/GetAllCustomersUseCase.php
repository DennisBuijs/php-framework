<?php

namespace Application\GetCustomer;

use Application\GetCustomer\Transformer\CustomerTransformer;
use Domain\Customer\CustomerRepository;
use Application\UseCase;

class GetAllCustomersUseCase implements UseCase
{
    public function __construct(
        private readonly CustomerRepository $customerRepository,
        private readonly CustomerTransformer $transformer
    ) {
    }

    /** @return GetCustomer[] */
    public function execute(): array
    {
        $customers = $this->customerRepository->getAll();

        if (empty($customers)) {
            return [];
        }

        return array_map(fn($customer) => $this->transformer->transform($customer), $customers);
    }
}
