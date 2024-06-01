<?php

namespace Domain\Customer;

use Application\CreateCustomer\Dto\CreateCustomer;
use DomainException;
use Infrastructure\Persistence\Database;
use Infrastructure\Persistence\Sqlite\Sqlite;

class CustomerRepository
{
    private readonly Database $db;

    public function __construct()
    {
        // This needs to be injected in the future
        $this->db = new Sqlite();
    }

    public function getById(string $id): Customer
    {
        foreach ($this->getMock() as $customer) {
            if ($customer->id === $id) {
                return $customer;
            }
        }

        throw new DomainException("Customer not found");
    }

    public function getAll(): CustomerCollection
    {
        $result = $this->db->query("SELECT * FROM customers", []);

        $customers = new CustomerCollection();

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $customers->add(new Customer($row["id"], $row["first_name"], $row["last_name"], $row["email"]));
        }

        return $customers;
    }

    public function create(CreateCustomer $createCustomer): Customer
    {
        $customer = new Customer(
            "0f8cbb7a-c8b9-4761-995e-80542f721de8",
            $createCustomer->firstName,
            $createCustomer->lastName,
            $createCustomer->email
        );

        $this->db->query(
            'INSERT INTO "customers" ("id", "first_name", "last_name", "email")
            VALUES (:id, :first_name, :last_name, :email)',
            [
                "id" => $customer->id,
                "first_name" => $customer->firstName,
                "last_name" => $customer->lastName,
                "email" => $customer->email,
            ]
        );

        return $customer;
    }

    private function getMock(): array
    {
        return [
            new Customer("b10f7c32-cb25-4746-8e73-30cfc6da94f7", "Tonya", "Dickinson", "tonya.dickinson@example.org"),
            new Customer("b9e69ee8-4d9a-4466-bd8a-c4d6c534cd52", "Dexter", "Schulist", "dexter.schulist@example.org"),
        ];
    }
}
