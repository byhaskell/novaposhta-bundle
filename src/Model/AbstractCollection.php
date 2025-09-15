<?php
namespace byhaskell\NovaPoshtaBundle\Model;

use IteratorAggregate;
use Countable;
use ArrayIterator;

/**
 * @template T
 * @implements IteratorAggregate<int, T>
 */
abstract class AbstractCollection implements IteratorAggregate, Countable
{
    protected array $items = [];

    abstract public static function getItemClass(): string;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function add($item): void
    {
        $this->items[] = $item;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function all(): array
    {
        return $this->items;
    }
}