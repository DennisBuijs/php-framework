<?php

namespace Infrastructure\Collection;

use InvalidArgumentException;

class ItemNotOfCollectionTypeException extends InvalidArgumentException
{
    public function __construct()
    {
    }
}
