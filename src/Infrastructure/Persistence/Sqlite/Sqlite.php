<?php

namespace Infrastructure\Persistence\Sqlite;

use Infrastructure\Persistence\Database;
use SQLite3;

class Sqlite implements Database
{
    private SQLite3 $db;

    public function __construct()
    {
        $this->db = new SQLite3("database.sqlite", SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

        $this->db->query('CREATE TABLE IF NOT EXISTS "customers" (
            "id" VARCHAR,
            "first_name" VARCHAR,
            "last_name" VARCHAR,
            "email" VARCHAR
        )');
    }

    public function query(string $query, array $bindParams): mixed
    {
        $statement = $this->db->prepare($query);
        foreach ($bindParams as $key => $value) {
            $statement->bindValue(":" . $key, $value);
        }

        return $statement->execute();
    }
}
