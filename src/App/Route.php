<?php

namespace App;

readonly class Route
{
    public function __construct(
        public string $verb,
        public string $path,
        public string $controller,
        public string $method
    ) {
    }
}
