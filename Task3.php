<?php

namespace src;

class Task3
{
    private function task3(int $number): int
    {
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

    public function main()
    {
        $n = 5689; // <- enter your number here

        if (!is_int($n)) {
            throw new \InvalidArgumentException('task3 function only accepts integers. Your input was: ' . $n . ' (' . gettype($n) . ')');
        } else {
            echo 'Your number is ' . $n;
            echo '<br>';
            echo 'Last single digit after operations is ' . $this->task3($n);
        }
    }
}

$task3 = new Task3();
$task3->main();
