<?php

namespace src;

class Task4
{
    private function task4(string $input): string
    {
        $input = str_replace(['_', '-'], ' ', $input);
        $input = ucwords($input);

        return str_replace(' ', '', $input);
    }

    public function main()
    {
        $sentence = 'The quick-brown_fox jumps over the_lazy-dog <br/>'; // <- enter your sentence here

        echo 'Sentence provided: ' . $sentence;
        if (!is_string($sentence)) {
            throw new \InvalidArgumentException('task4 function only accepts strings. Your input was: ' . $sentence . ' (' . gettype($sentence) . ')');
        } else {
            echo 'Result: ' . $this->task4($sentence);
        }
    }
}

$task4 = new Task4();
$task4->main();
