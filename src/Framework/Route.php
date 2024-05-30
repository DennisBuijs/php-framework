<?php

namespace Framework;

class Route
{
    private array $parameters;

    public function __construct(
        public readonly string $verb,
        public readonly string $path,
        public readonly string $controller,
        public readonly string $method
    ) {
        $this->parameters = [];
    }

    public function withParameters(array $parameters): self
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
