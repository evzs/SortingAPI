<?php

namespace SortingAPI\utils;

class ArrayLib
{
    static function DumpArray($data) {
        echo "[";
        for ($i = 0; $i < count($data); $i++) {
            if($i != count($data) - 1){
                echo $data[$i].", ";
            }
            else {
                echo $data[$i];
            }
        }
        echo "]";
    }
}