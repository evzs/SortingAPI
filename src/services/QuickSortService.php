<?php

namespace SortingAPI\services;

use SortingAPI\Service;

class QuickSortService extends Service
{
    public static function sort(array $data): array
    {
        if (count($data) < 2) {
            return $data;
        }
        $left = $right = [];
        reset($data);
        $pivot_key = key($data);
        $pivot = array_shift($data);
        foreach ($data as $key => $temp) {
            if ($temp < $pivot) {
                $left[$key] = $temp;
            } else {
                $right[$key] = $temp;
            }
        }
        return array_merge(
            self::sort($left),
            [$pivot_key => $pivot],
            self::sort($right)
        );
    }
}