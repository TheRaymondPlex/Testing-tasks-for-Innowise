<?php

namespace src;

date_default_timezone_set('Europe/Minsk');
class Task2
{
    private static function isDate(string $input): bool
    {
        if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $input)) {
            return true;
        } else {
            return false;
        }
    }

    public static function main(string $date): string
    {
        if (!Task2::isDate($date)) {
            throw new \InvalidArgumentException('Invalid date format! Acceptable date format is DD-MM-YYYY');
        } else {
            return date_diff(new \DateTime($date), new \DateTime())->days;
        }
    }
}

$date = '09-03-2023';
echo Task2::main($date);
