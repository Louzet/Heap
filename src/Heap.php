<?php

declare(strict_types=1);

namespace Louzet\Heap;

class Heap
{
    private array $data;

    private int $size = 0;

    public function __construct(array $data = [])
    {
        $this->data = $data;
        $this->size = \count($this->data);
    }

    public function isEmpty(): bool
    {
        return $this->getSize() === 0;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
