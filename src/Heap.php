<?php

declare(strict_types=1);

namespace Louzet\Heap;

class Heap
{
    public function __construct(array $data = [])
    {}

    public function makeHeap(array $first, array $second, callable $compare = null, string $sort = HeapSort::MAXHEAP)
    {}
}
