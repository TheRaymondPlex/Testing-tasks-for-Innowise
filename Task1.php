<?php

namespace src;

class Task1
{
    public static function main($input): string
    {
        if (!is_int($input)) {
            throw new \InvalidArgumentException('task1 function only accepts integers. Your input was: ' . $input . ' (' . gettype($input) . ')');
        } else {
            return $input > 30 ? 'More than 30'
                : ($input > 20 ? 'More than 20'
                : ($input > 10 ? 'More than 10'
                : 'Equal or less than 10'));
        }
    }
}

$inputNumber = '';
Task1::main($inputNumber);
