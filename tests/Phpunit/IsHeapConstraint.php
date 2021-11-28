<?php

declare(strict_types=1);

namespace Louzet\Heap\Tests\Phpunit;

use Louzet\Heap\Heap;
use Louzet\Heap\HeapOperation;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\InvalidArgumentException;

final class IsHeapConstraint extends Constraint
{
    private bool $test;

    public function __construct(bool $test = true)
    {
        $this->test = $test;
    }

    public function matches($other): bool
    {
        if (is_object($other) && !$other instanceof Heap) {
            throw InvalidArgumentException::create(1, 'object or array');
        }
        // otherwise $other is an array
        // test if it's a heap

        return $this->test === HeapOperation::isHeap($other);
    }

    public function toString(): string
    {
        return 'is heap';
    }
}