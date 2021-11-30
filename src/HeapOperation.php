<?php

declare(strict_types=1);

namespace Louzet\Heap;

use Louzet\Heap\Exception\InvalideHeapException;

class HeapOperation
{
    public function __construct()
    {}

    public function makeHeap(array $first, array $second, callable $compare = null, string $sort = 'max_heap')
    {}

    /**
     * Check if a given data is a Heap, by testing if it's a maxHeap or minHeap
     * 
     * @param Heap|array $data
     * 
     * @return bool
     */
    public static function isHeap($data): bool
    {
        if (is_array($data) && empty($data)) {
            throw new InvalideHeapException(sprintf("argument can not be empty."));
        }

        if (is_array($data)) {
            foreach($data as $item) {
                if(!is_numeric($item)) {
                    throw new InvalideHeapException(sprintf("All elements inside the array must be type integer."));
                }
            }

            return self::isMaxHeap($data)|| self::isMinHeap($data);
        }

        if (is_object($data) && $data instanceof Heap) {
            return self::isMaxHeap($data) || self::isMinHeap($data);
        }

        return false;
    }

    public static function isMaxHeap($heap): bool
    {
        if (is_array($heap) && !empty($heap)) {

            $heapSize = \count($heap);

            if ($heapSize <= 2) {
                return max($heap) === $heap[0];
            }
            
            if ($heap[0] !== max($heap)) {
                return false;
            }
            
            for ($i = 0; $i <= $heapSize; $i++) {
                return ($heap[$i] >= $heap[($i*2)+1]) && ($heap[$i] >= $heap[($i*2)+2]);
            }
            
            return false;
        }

        if (is_object($heap)) {
            if (!$heap instanceof Heap) {
                return false;
            }

            return self::isMaxHeap($heap->toArray());
        }

        return false;
    }

    public static function isMinHeap($heap): bool
    {
        if (is_array($heap) && !empty($heap)) {

            $heapSize = \count($heap);

            if ($heapSize <= 2) {
                return min($heap) === $heap[0];
            }

            if ($heap[0] !== min($heap)) {
                return false;
            }
            
            for ($i = 0; $i <= $heapSize; $i++) {
                return ($heap[$i] <= $heap[($i*2)+1]) && ($heap[$i] <= $heap[($i*2)+2]);
            }
            
            return false;
        }

        if (is_object($heap)) {
            if (!$heap instanceof Heap) {
                return false;
            }

            return self::isMinHeap($heap->toArray());
        }

        return false;
    }
}
