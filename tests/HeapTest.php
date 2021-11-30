<?php

declare(strict_types=1);

namespace Louzet\Heap\Tests;

use Louzet\Heap\Heap;
use Louzet\Heap\HeapOperation;
use Louzet\Heap\Tests\Phpunit\HeapTestCase;

class HeapTest extends HeapTestCase
{
   
    /**
     * @dataProvider heapDataProvider
     */
    public function testIsAHeap($actual, $bool): void
    {
        self::assertIsHeap($actual, $bool);
    }

    public function testIsNotMaxHeap(): void
    {
        $data = [9, 5, 4, 17, 1, 2, 3 ];
        self::assertFalse(HeapOperation::isMaxHeap($data));
    }

    public function testIsMaxHeap(): void
    {
        $data = [9, 5, 4, 1, 2, 3 ];
        self::assertTrue(HeapOperation::isMaxHeap($data));
    }

    public function testIsNotMinHeap(): void
    {
        $data = [9, 5, 4, 17, 1, 2, 3 ];
        self::assertFalse(HeapOperation::isMinHeap($data));
    }

    public function testIsMinHeap(): void
    {
        $data = [1, 5, 4, 9, 2, 3 ];
        self::assertTrue(HeapOperation::isMinHeap($data));
    }

    public function testHeapIsNotHeap(): void
    {
        $heap = new Heap([3, 2, 4, 1, 5, 9]);
        self::assertFalse(HeapOperation::isHeap($heap));

    }

    public function heapDataProvider(): \Generator
    {
        yield [new Heap(), false];
        yield [[1, 2, 3, 4, 5], true]; // it's a minHeap
        yield [[3, 2, 4, 1, 5, 9], false]; // initial
        yield [[9, 5, 4, 1, 2, 3], true]; // after makeHeap($initial)
        yield [new Heap([6, 5]), true]; // count 2 nodes but it's a basic maxHeap
    }
}