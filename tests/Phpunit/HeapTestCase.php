<?php

declare(strict_types=1);

namespace Louzet\Heap\Tests\Phpunit;

use PHPUnit\Framework\TestCase;
use Louzet\Heap\Tests\Phpunit\IsHeapConstraint;

abstract class HeapTestCase extends TestCase
{
    public static function assertIsHeap($condition, bool $test = true, string $message = ''): void
    {
        self::assertThat(
            $condition,
            new IsHeapConstraint($test),
            $message
        );
    }
}