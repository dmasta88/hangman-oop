<?php

namespace classes;

class Image
{
    public $state = 0;
    public $images = [
        "" . PHP_EOL,
        "
                  -----|
                  |    |
                       |
                       |
                       |
                       - " . PHP_EOL,
        "
                  -----|
                  |    |
                  o    |
                       |
                       - " . PHP_EOL,
        "
                  -----|
                  |    |
                  o    |
                  |    |
                       - " . PHP_EOL,
        "
                  ------|
                   |    |
                   o    |
                  /|\   |
                        - " . PHP_EOL,
        "
                      ------|
                       |    |
                       o    |
                      /|\   |
                      /      - " . PHP_EOL,
        "
                       -----|
                       |    |
                       o    |
                      /|\   |
                      / \     - " . PHP_EOL,
    ];
    public function print()
    {
        echo $this->images[$this->state];
    }
    public function update()
    {
        $this->state++;
    }
}
