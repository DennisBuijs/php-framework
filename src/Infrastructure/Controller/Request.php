<?php

namespace Infrastructure\Controller;

readonly class Request
{
    public function __construct(private array $query)
    {
    }

    public function getQuery(?string $key): array|string
    {
        if ($key) {
            return $this->query[$key];
        }

        return $this->query;
    }
}
