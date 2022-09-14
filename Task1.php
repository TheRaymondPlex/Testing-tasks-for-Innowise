<?php

namespace src;

class Task1
{
    public static function main(int $inputNumber): string
    {
        $input = 25; // change value here
        if (!is_int($input)) {
            throw new \InvalidArgumentException('task1 function only accepts integers. Your input was: ' . $input . ' (' . gettype($input) . ')');
        } else {

            return $inputNumber > 30 ? 'More than 30'
                : ($inputNumber > 20 ? 'More than 20'
                : ($inputNumber > 10 ? 'More than 10'
                : 'Equal or less than 10'));
        }
    }
}

$inputNumber = 25;
Task1::main($inputNumber);
