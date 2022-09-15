<?php

namespace src;

class Task7
{
    public static function main(array $arr, int $position): array
    {
        if (!is_array($arr) || empty($arr)) {
            throw new \InvalidArgumentException('Invalid data! Only full arrays are accepted!');
        } elseif ($position <= 0 || $position > (count($arr) - 1)) {
            throw new \InvalidArgumentException('Invalid position! Your input was: ' . $position . ' (' . gettype($position) . ')');
        } else {
            unset($arr[$position]);
            array_splice($arr, 0, 0);

            return $arr;
        }
    }
}

$arr = [1, 2, 3, 4, 5];
$n = 3;
Task7::main($arr, $n);
