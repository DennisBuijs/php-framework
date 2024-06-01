<?php

namespace Infrastructure\Persistence;

interface Database
{
    public function query(string $query, array $bindParams): mixed;
}
