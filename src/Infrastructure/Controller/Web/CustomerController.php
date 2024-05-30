<?php

namespace Infrastructure\Controller\Web;

use Application\GetCustomer\Dto\WebCustomer;
use Application\GetCustomer\GetCustomerUseCase;
use Application\GetCustomer\Transformer\WebCustomerTransformer;
use Domain\Customer\CustomerRepository;
use Infrastructure\Controller\Controller;
use Infrastructure\Controller\Request;

class CustomerController implements Controller
{
    public function get(Request $request): HtmlResponse
    {
        $customerId = $request->getQuery("id");

        $customerRepository = new CustomerRepository();
        $customerTransformer = new WebCustomerTransformer();

        $useCase = new GetCustomerUseCase($customerRepository, $customerTransformer, $customerId);

        /** @var WebCustomer $customer */
        $customer = $useCase->execute();

        return new HtmlResponse(
            "
            <table>
                <tr>
                    <td>First name</td>
                    <td>" .
                $customer->name .
                "</td>
                </tr>

                <tr>
                    <td>E-mail</td>
                    <td>" .
                $customer->email .
                "</td>
                </tr>
            </table>
        "
        );
    }
}
