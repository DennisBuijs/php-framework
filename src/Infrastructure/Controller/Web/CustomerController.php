<?php

namespace Infrastructure\Controller\Web;

use Application\GetCustomer\Dto\WebCustomer;
use Application\GetCustomer\GetAllCustomersUseCase;
use Application\GetCustomer\GetCustomerUseCase;
use Application\GetCustomer\Transformer\WebCustomerTransformer;
use Domain\Customer\CustomerRepository;
use Infrastructure\Controller\Controller;
use Infrastructure\Controller\Request;
use Infrastructure\Controller\Response;

class CustomerController implements Controller
{
    public function get(Request $request): Response
    {
        $customerId = $request->getQuery("id");

        $customerRepository = new CustomerRepository();
        $customerTransformer = new WebCustomerTransformer();

        $useCase = new GetCustomerUseCase($customerRepository, $customerTransformer, $customerId);

        /** @var WebCustomer $customer */
        $customer = $useCase->execute();

        return new TemplateResponse("customer", ["customer" => $customer]);
    }

    public function getAll(): Response
    {
        $customerRepository = new CustomerRepository();
        $customerTransformer = new WebCustomerTransformer();

        $useCase = new GetAllCustomersUseCase($customerRepository, $customerTransformer);

        $customers = $useCase->execute();

        return new TemplateResponse("customer_list", ["customers" => $customers]);
    }
}
