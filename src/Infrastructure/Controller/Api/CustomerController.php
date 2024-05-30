<?php

namespace Infrastructure\Controller\Api;

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
        $customer = $customerRepository->getById($customerId);

        return new JsonResponse($customer);
    }
}
