<?php

namespace Infrastructure\Controller;

readonly class Request
{
    public function __construct(private array $query, private array $input)
    {
    }

    public function getQuery(?string $key = null): array|string
    {
        if ($key) {
            return $this->query[$key];
        }

        return $this->query;
    }

    public function getInput(?string $key = null): array|string
    {
        if ($key) {
            return $this->input[$key];
        }

        return $this->input;
    }
}
