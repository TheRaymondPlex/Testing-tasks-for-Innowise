<?php

namespace src;

class Task9
{
    private function task9(array $arr, int $number): array
    {
        $resArray = [];
        for ($i = 0; $i < (count($arr) - 2); $i++) {
            if ($arr[$i] + $arr[$i + 1] + $arr[$i + 2] == $number) {
                array_push($resArray, "{$arr[$i]} + {$arr[$i + 1]} + {$arr[$i + 2]} = $number");
            }
        }

        return $resArray;
    }

    public function main()
    {
        $array = [2, 7, 7, 1, 8, 2, 7, 8, 7];
        $num = 16;
        if (!is_array($array)) {
            throw new \InvalidArgumentException('Invalid array provided!');
        } elseif (!is_int($num) || $num < 0) {
            throw new \InvalidArgumentException('Invalid target number provided!');
        } else {
            print_r($this->task9($array, $num));
        }
    }
}

$task9 = new Task9();
$task9->main();
