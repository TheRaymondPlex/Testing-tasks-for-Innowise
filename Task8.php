<?php

namespace src;

class Task8
{
    public static function main(string $json): string
    {
        if (!is_string($json)) {
            throw new \InvalidArgumentException('Main function accepts strings only.');
        } else {
            $json = str_replace(['\n', '\r'], '', $json);
            $jsonDecoded = json_decode($json, true);
            if (!is_array($jsonDecoded)) {
                throw new \InvalidArgumentException('$jsonDecoded must be array type only!');
            }
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
