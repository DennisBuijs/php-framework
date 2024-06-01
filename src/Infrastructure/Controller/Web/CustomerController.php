<?php

namespace Infrastructure\Controller\Web;

use Application\CreateCustomer\CreateCustomerUseCase;
use Application\CreateCustomer\Dto\CreateCustomer;
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

    public function getForm(): Response
    {
        return new TemplateResponse("customer_form", []);
    }

    public function postForm(Request $request): Response
    {
        $customer = new CreateCustomer(
            $request->getInput("firstName"),
            $request->getInput("lastName"),
            $request->getInput("email")
        );

        $customerRepository = new CustomerRepository();
        $customerTransformer = new WebCustomerTransformer();

        $createCustomerUseCase = new CreateCustomerUseCase($customerRepository, $customerTransformer, $customer);
        $createCustomerUseCase->execute();

        $useCase = new GetAllCustomersUseCase($customerRepository, $customerTransformer);
        $customers = $useCase->execute();

        return new TemplateResponse("customer_form", [
            "message" => "Saved!",
            "customers" => $customers,
        ]);
    }
}
