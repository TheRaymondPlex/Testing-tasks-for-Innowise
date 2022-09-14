<?php

namespace src;

class Task10
{
    public static function main(int $input): array
    {
        if (!is_int($input)) {
            throw new \InvalidArgumentException('Variable $number is not integer! ' . gettype($input) . ' is provided.');
        } elseif ($input <= 0) {
            throw new \InvalidArgumentException('Variable $number equals or lower zero! ' . $input . ' is provided.');
        } else {
            $resultArray = [$input];

            while ($input > 1) {
                if ($input % 2 == 0) {
                    $input = $input / 2;
                } else {
                    $input = $input * 3 + 1;
                }
                array_push($resultArray, $input);
            }

            return $resultArray;
        }
    }
}

$input = 12;
Task10::main($input);
