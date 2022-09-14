<?php

namespace src;

class Task10
{
    private function task10(int $input): array
    {
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

    public function main()
    {
        $number = 12;
        if (!is_int($number)) {
            throw new \InvalidArgumentException('Variable $number is not integer! ' . gettype($number) . ' is provided.');
        } elseif ($number <= 0) {
            throw new \InvalidArgumentException('Variable $number equals or lower zero! ' . $number . ' is provided.');
        } else {
            print_r($this->task10($number));
        }
    }
}

$task10 = new Task10();
$task10->main();
