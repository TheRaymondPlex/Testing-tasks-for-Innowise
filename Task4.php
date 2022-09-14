<?php

namespace src;

class Task4
{
    public static function main(string $sentence): string
    {
        if (!is_string($sentence)) {
            throw new \InvalidArgumentException('task4 function only accepts strings. Your input was: ' . $sentence . ' (' . gettype($sentence) . ')');
        } else {
            $sentence = str_replace(['_', '-'], ' ', $sentence);
            $sentence = ucwords($sentence);

            return str_replace(' ', '', $sentence);
        }
    }
}

$string = 'The quick-brown_fox jumps over the_lazy-dog';
Task4::main($string);
