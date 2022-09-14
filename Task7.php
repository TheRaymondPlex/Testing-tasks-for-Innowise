<?php

namespace src;

class Task7
{
    public static function main(array $arr, int $position): array
    {
        if (!is_array($arr)) {
            throw new \InvalidArgumentException('Invalid data! Only arrays are accepted! Your input was: ' . $arr . ' (' . gettype($arr) . ')');
        } else {
            unset($arr[$position]);
            array_splice($arr, 0, 0);

            return $arr;
        }
    }
}

$arr = [1,2,3,4,5];
$n = 3;
Task7::main($arr, $n);
