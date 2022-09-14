<?php

namespace src;

class Task3
{
    public static function main(int $number): int
    {
        if (!is_int($number)) {
            throw new \InvalidArgumentException('task3 function only accepts integers. Your input was: ' . $number . ' (' . gettype($number) . ')');
        } else {
            $sum = 0;
            while ($number > 0 || $sum > 9) {
                if ($number == 0) {
                    $number = $sum;
                    $sum = 0;
                }
                $sum += $number % 10;
                $number = intdiv($number, 10);
            }

            return $sum;
        }
    }
}

$input = 5689;
Task3::main($input);
