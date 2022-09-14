<?php

namespace src;

date_default_timezone_set('Europe/Minsk');

class Task2
{
    private function task2(string $date): string
    {
        return date_diff(new \DateTime($date), new \DateTime())->days;
    }

    private function isDate(string $input): bool
    {
        if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $input)) {
            return true;
        } else {
            return false;
        }
    }

    public function main()
    {
        $yourDate = '09-03-2023'; // <- here is the closest birthday date

        if (!$this->isDate($yourDate)) {
            throw new \InvalidArgumentException('Invalid date format! Acceptable date format is DD-MM-YYYY');
        } else {
            echo 'Your birthday will be ' . date('d.m.Y', strtotime($yourDate));
            echo '<br>';
            echo 'There are ' . $this->task2($yourDate) . ' days till your birthday!';
        }
    }
}

$task2 = new Task2();
$task2->main();
