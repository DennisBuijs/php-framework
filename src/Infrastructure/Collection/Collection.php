<?php

namespace Infrastructure\Collection;

use ArrayIterator;
use Traversable;

/** @template T */
abstract class Collection implements \IteratorAggregate
{
    /** @var T[] $items */
    private array $items = [];

    /** @param T $item */
    public function add($item): void
    {
        $this->items[] = $item;
    }

    public function all(): array
    {
        return $this->items;
    }

    public function filter(callable $callback): self
    {
        return self::fromArray(array_filter($this->items, $callback));
    }

    public static function fromArray(array $items): self
    {
        $collection = new static();
        foreach ($items as $item) {
            $collection->add($item);
        }

        return $collection;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}
