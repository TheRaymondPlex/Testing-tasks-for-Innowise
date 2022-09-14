<?php

namespace src;

class Task7
{
    private function task7(array $arr, int $position)
    {
        echo 'Original array: ';
        var_dump($arr);
        unset($arr[$position]);
        echo '<br>';
        array_splice($arr, 0, 0);
        echo 'New array: ';
        var_dump($arr);

        return null;
    }

    public function main()
    {
        $arr = [1,2,3,4,5,6,7,8,9];
        if (!is_array($arr)) {
            throw new \InvalidArgumentException('Invalid data! Only arrays are accepted! Your input was: ' . $arr . ' (' . gettype($arr) . ')');
        } else {
            echo $this->task7($arr, 3);
        }
    }
}

$task7 = new Task7();
$task7->main();
