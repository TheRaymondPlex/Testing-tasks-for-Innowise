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

    public static function main(string $date): int
    {
        if (!Task2::isDate($date)) {
            throw new \InvalidArgumentException('Invalid date format! Acceptable date format is DD-MM-YYYY');
        } else {
            $diffDays = strtotime($date) - strtotime('today');
            if ($diffDays < 0) {
                $date = date('d-m-Y', strtotime($date . ' next year'));
                $diffDays = strtotime($date) - time();
            }
            $days = ceil($diffDays / 86400);
            if ($days == 365) {
                $days = 0;
            }
            if ($days < 0) {
                $days *= -1;
            }

            return $days;
        }
    }
}

$date = '15-09-2022';
Task2::main($date);
