<?php

// Идея в том, что мы определяем разницу в месяцах между двумя датами (дельта). Если она отрицательная и мы должны идти назад,
// то я просто переворачиваю условие и превращаю разницу в положительное число. Дальше от стартовой даты (первый день этого месяца)
// мы шагаем по месяцам (и уменьшаем дельту), просто добавляя количество дней в текущем месяце (с учетом високосного года и т.п.).
// Если новая дата попадает на ожидаемый день, то я увеличиваю счетчик условных "Monday" на 1. Для шагания я также использую
// числа от 0 до 6 вместо Понедельника-Воскресенья, так как тогда при добавлении количества дней в текущем месяце,
// относительно легко определить, какой это будет день в следующем месяце.
// Пример: 1 Февраля 2021 года - это понедельник.
// Мне надо понять, какой будет первый день в Марте. Я просто добавляю к нулю (0 - это понедельник, 1 - это вторник, и т.д.) 28 дней,
// которые в 2021 году были в Феврале и беру от этого остаток от деления на 7 (кол-во дней в неделе). Это даст количество дней,
// на которое мне надо сдвинуть текущий день (понедельник), чтобы понять, какой будет первый день в след месяце. Так как (0 + 28) % 7 = 0, то сдвиг = 0.
// Значит в Марте это тоже будет понедельник.

namespace src;

class Task6
{
    public static function getDayOfWeek($year, $month): int|string
    {
        return date('N', strtotime("$year-$month-01")) - 1;
    }

    public static function getDeltaInMonths($yearA, $yearB, $monthA, $monthB): float|int
    {
        return ($yearB - $yearA) * 12 + $monthB - $monthA;
    }

    public static function daysInMonth($month, $year): int|string
    {
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }

    public static function main(int $year, int $lastYear, int $month, int $lastMonth, string $day = 'Monday'): int
    {
        if (!is_int($year) || !is_int($lastYear) || !is_int($month) || !is_int($lastMonth)) {
            throw new \InvalidArgumentException('You\'ve entered invalid type of variables! Change to integer!');
        } elseif ($month < 0 || $month > 12 || $lastMonth < 0 || $lastMonth > 12) {
            throw new \InvalidArgumentException('You\'ve entered invalid month! It can be from 1 to 12.');
        } elseif ($year <= 0 || $lastYear <= 0) {
            throw new \InvalidArgumentException('You\'ve entered invalid year! It can be positive only.');
        } else {
            $days_map_to_num = [
                'Monday' => 0,
                'Tuesday' => 1,
                'Wednesday' => 2,
                'Thursday' => 3,
                'Friday' => 4,
                'Saturday' => 5,
                'Sunday' => 6,
            ];
            $day_to_count = $days_map_to_num[$day];

            // Заполняем массив количествами дней для каждого месяца
            $current_year = $year;
            $days_in_month = [];
            for ($i = 1; $i <= 12; $i++) {
                array_push($days_in_month, Task6::daysInMonth($i, $current_year));
            }
            // print_r($days_in_month);

            // Дельта в месяцах между двумя датами.
            $delta = Task6::getDeltaInMonths($year, $lastYear, $month, $lastMonth);
            if ($delta === 0) {
                // Если дельта 0, тогда просто проверяем, является ли текущий первый день ожидаемым днем.
                return Task6::getDayOfWeek($year, $month) === $day_to_count ? 1 : 0;
            } elseif ($delta < 0) {
                // Переворачиваем, т.к. надо шагать в другую сторону.
                $tmp = $lastYear;
                $lastYear = $year;
                $year = $tmp;
                $tmp = $lastMonth;
                $lastMonth = $month;
                $month = $tmp;
                $delta *= -1;
            }

            $current_day = Task6::getDayOfWeek($year, $month);
            $current_month = $month;
            $count = $current_day === 0 ? 1 : 0;

            // echo $current_day . PHP_EOL;
            while ($delta != 0) {
                $current_day = ($current_day + $days_in_month[$current_month - 1] % 7) % 7;
                if ($current_day === $day_to_count) {
                    $count++;
                }
                $current_month++;
                if ($current_month > 12) {
                    $current_year++;
                    $current_month = 1;
                    $days_in_month = [];
                    for ($i = 1; $i <= 12; $i++) {
                        array_push($days_in_month, Task6::daysInMonth($i, $current_year));
                    }
                }
                $delta--;
            }

            return $count;
        }
    }
}

$year = 1980;
$lastYear = 2021;
$month = 5;
$lastMonth = 10;
Task6::main($year, $lastYear, $month, $lastMonth);
