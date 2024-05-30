<?php

namespace Infrastructure\Controller\Api;

use Application\GetCustomer\Dto\ApiCustomer;
use Application\GetCustomer\Transformer\ApiCustomerTransformer;
use Application\GetCustomer\GetCustomerUseCase;
use Domain\Customer\CustomerRepository;
use Infrastructure\Controller\Controller;
use Infrastructure\Controller\Api\JsonResponse;
use Infrastructure\Controller\Request;

class CustomerController implements Controller
{
    public function get(Request $request): JsonResponse
    {
        $customerId = $request->getQuery("id");

        $customerRepository = new CustomerRepository();
        $customerTransformer = new ApiCustomerTransformer();

        $useCase = new GetCustomerUseCase($customerRepository, $customerTransformer, $customerId);

        /** @var ApiCustomer $customer */
        $customer = $useCase->execute();

        return new JsonResponse((array) $customer);
    }
}
