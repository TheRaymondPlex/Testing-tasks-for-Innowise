<?php

namespace src;

use JetBrains\PhpStorm\Pure;

class Task5
{
    public static function findSum($str1, $str2): string
    {
        if (strlen($str1) > strlen($str2)) {
            $temp = $str1;
            $str1 = $str2;
            $str2 = $temp;
        }

        $str3 = '';

        $n1 = strlen($str1);
        $n2 = strlen($str2);
        $diff = $n2 - $n1;

        $carry = 0;

        for ($i = $n1 - 1; $i >= 0; $i--) {
            $sum = ((ord($str1[$i]) - ord('0')) + ((ord($str2[$i + $diff]) - ord('0'))) + $carry);
            $str3 .= chr($sum % 10 + ord('0'));
            $carry = (int)($sum / 10);
        }

        for ($i = $n2 - $n1 - 1; $i >= 0; $i--) {
            $sum = ((ord($str2[$i]) - ord('0')) + $carry);
            $str3 .= chr($sum % 10 + ord('0'));
            $carry = (int)($sum / 10);
        }

        if ($carry) {
            $str3 .= chr($carry + ord('0'));
        }

        return strrev($str3);
    }

    public static function numberOfDigits($n): float|int
    {
        if ($n == 1) {
            return 1;
        }

        // phi = 1.6180339887498948
        $d = ($n * log10(1.6180339887498948)) - ((log10(5)) / 2);

        return ceil($d);
    }

    public static function fib($n): string
    {
        $a = '0';
        $b = '1';
        if ($n == 0) {
            return $a;
        }
        for ($i = 2; $i <= $n; $i++) {
            $c = Task5::findSum($a, $b);
            $a = $b;
            $b = $c;
        }

        return $b;
    }


    #[Pure] public static function main(int $n): string
    {
        if ($n <= 0 || !is_int($n)) {
            throw new \InvalidArgumentException('Main function accepts positive integers only. Your input was: ' . $n . ' (' . gettype($n) . ')');
        }
        $i = 0;
        while (true) {
            if (Task5::numberOfDigits(++$i) >= $n) {
                return Task5::fib($i);
            }
        }
    }
}

// Тесты
// Последовательность Фибоначчи
//for ($i = 0; $i < 20; $i++) {
//    echo $i . "=>" . Task5::fib($i) . PHP_EOL;
//}

$n = 121;
Task5::main($n);
