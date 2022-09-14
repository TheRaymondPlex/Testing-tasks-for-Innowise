<?php

namespace src;

header('Content-type: text/plain');

class Task8
{
    public static function main(string $json): string
    {
        if (!is_string($json)) {
            throw new \InvalidArgumentException('task8 function only accepts strings. Your input was: ' . $json . ' (' . gettype($json) . ')');
        } else {
            $jsonDecoded = json_decode($json, true);
            $output = '';

            foreach ($jsonDecoded as $key => $item) {
                if (!is_array($item)) {
                    $output .= "$key: $item\r\n";
                } else {
                    foreach ($item as $k => $v) {
                        $output .= "$k: $v\r\n";
                    }
                }
            }

            return $output;
        }
    }
}

$json = '{
            "Title": "The Cuckoos Calling",
            "Author": "Robert Galbraith",
            "Detail": {
            "Publisher": "Little Brown"
            }
            }';
Task8::main($json);
