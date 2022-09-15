<?php

namespace src;

class Task3
{
    public static function main($number): int
    {
        if (!is_int($number) || $number <= 0) {
            throw new \InvalidArgumentException('Main function accepts positive integers only. Your input was: ' . $number . ' (' . gettype($number) . ')');
        } elseif ($number > 0 && $number <= 9) {
            throw new \InvalidArgumentException('Main function accepts two digit integers only . Your input was: ' . $number . ' (' . gettype($number) . ')');
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
