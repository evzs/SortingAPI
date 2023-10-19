<?php
namespace SortingAPI\services;

use SortingAPI\Service;

class BubbleSortService extends Service
{
    public static function sort(array $data): array
    {
        $array_length = count($data);
        for ($i = 0; $i < $array_length; $i++) {
            for ($j = 0; $j < $array_length - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    $temp = $data[$j];
                    $data[$j] = $data[$j + 1];
                    $data[$j + 1] = $temp;
                }
            }
        }
        return $data;
    }
}