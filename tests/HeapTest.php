<?php

declare(strict_types=1);

namespace Louzet\Heap\Tests;

use Louzet\Heap\Heap;
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

    public function heapDataProvider(): \Generator
    {
        yield [new Heap(), true];
        yield [[1, 2, 3, 4, 5], false];
        yield [[3, 2, 4, 1, 5, 9], false]; // initial
        yield [[9, 5, 4, 1, 2, 3 ], true]; // after makeHeap($initial)
        yield [new Heap([6, 5]), true];
    }
}