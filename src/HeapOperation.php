<?php

declare(strict_types=1);

namespace Louzet\Heap;

use Louzet\Heap\Exception\InvalideHeapException;

class HeapOperation
{
    public function __construct()
    {}

    public static function isHeap(Heap|array $data): bool
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

            return self::isMaxHeap($data);
        }

        if ($data instanceof Heap) {
            return true;
        }

        return false;
    }

    public static function isMaxHeap(Heap|array $heap): bool
    {
        $heapSize = \count($heap);
        
        if (is_array($heap) && !empty($heap)) {
            if ($heap[0] !== max($heap)) {
                return false;
            }
            
            for ($i = 0; $i <= $heapSize; $i++) {
                return ($heap[$i] >= $heap[($i*2)+1]) && ($heap[$i] >= $heap[($i*2)+2]);
            }
            
            // if ($heapSize % 2 === 0) {
            //     $midHeapSize = $heapSize / 2 - 1; // cause array start to 0
            // } else {
            //     $midHeapSize = intval($heapSize / 2) + 1;
            // } 
            return false;
        }

        return false;
    }

    private static function nodeChildrens(array $heap, int $position = 1): array
    {
        if (0 === $position) {
            return [];
        }

        return [$heap[$position*2], $heap[$position*2+1]];
    }
}
