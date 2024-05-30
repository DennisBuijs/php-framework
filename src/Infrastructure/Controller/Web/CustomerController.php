<?php

namespace Infrastructure\Controller\Web;

use Domain\Customer\CustomerRepository;
use Infrastructure\Controller\Controller;
use Infrastructure\Controller\Request;

class CustomerController implements Controller
{
    public function get(Request $request): HtmlResponse
    {
        $customerId = $request->getQuery("id");

        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->getById($customerId);

        return new HtmlResponse(
            "
            <table>
                <tr>
                    <td>ID</td>
                    <td>" .
                $customer->id .
                "</td>
                </tr>

                <tr>
                    <td>First name</td>
                    <td>" .
                $customer->firstName .
                "</td>
                </tr>

                <tr>
                    <td>Last name</td>
                    <td>" .
                $customer->lastName .
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
