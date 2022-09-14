<?php

namespace src;

class Task1
{
    private function task1(int $inputNumber): string
    {
        return $inputNumber > 30 ? 'More than 30'
            : ($inputNumber > 20 ? 'More than 20'
            : ($inputNumber > 10 ? 'More than 10'
            : 'Equal or less than 10'));
    }

    public function main()
    {
        $input = 25; // change value here
        if (!is_int($input)) {
            throw new \InvalidArgumentException('task1 function only accepts integers. Your input was: ' . $input . ' (' . gettype($input) . ')');
        } else {
            echo $this->task1($input);
        }
    }
}

$task1 = new Task1();
$task1->main();
