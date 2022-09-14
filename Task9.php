<?php

namespace src;

class Task9
{
    public static function main(array $arr, int $number): array
    {
        if (!is_array($arr)) {
            throw new \InvalidArgumentException('Invalid array provided!');
        } elseif (!is_int($number) || $number < 0) {
            throw new \InvalidArgumentException('Invalid target number provided!');
        } else {
            $resArray = [];
            for ($i = 0; $i < (count($arr) - 2); $i++) {
                if ($arr[$i] + $arr[$i + 1] + $arr[$i + 2] == $number) {
                    array_push($resArray, "{$arr[$i]} + {$arr[$i + 1]} + {$arr[$i + 2]} = $number");
                }
            }

            return $resArray;
        }
    }

}

$arr = [2, 7, 7, 1, 8, 2, 7, 8, 7];
$num = 16;
Task9::main($arr, $num);
