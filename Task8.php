<?php

namespace src;

header('Content-type: text/plain');

class Task8
{
    private function task8(string $json): string
    {
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

    public function main()
    {
        $jsonInput = '{
            "Title": "The Cuckoos Calling",
            "Author": "Robert Galbraith",
            "Detail": {
            "Publisher": "Little Brown"
            }
            }';
        if (!is_string($jsonInput)) {
            throw new \InvalidArgumentException('task8 function only accepts strings. Your input was: ' . $jsonInput . ' (' . gettype($jsonInput) . ')');
        } else {
            echo $this->task8($jsonInput);
        }
    }
}

$task8 = new Task8();
$task8->main();
