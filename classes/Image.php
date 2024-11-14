<?php

namespace classes;

class Image
{
    public $state = 0;
    public $type;
    public $imagesWeb = [
        "<pre></pre>",
        "<pre>
                      ______
                      |    |
                           |
                           |
                           |
                           - 
        </pre>",
        "<pre>
                      ______
                      |    |
                      o    |
                           |
                           |
                           - 
        </pre>",
        "<pre>
                      ______
                      |    |
                      o    |
                      |    |
                           |
                           - 
        </pre>",
        "<pre>
                      ______
                      |    |
                      o    |
                     /|\   |
                           |
                           - 
        </pre>",
        "<pre>
                      ______
                      |    |
                      o    |
                     /|\   |
                     /     |
                           - 
        </pre>",
        "<pre>
                      ______
                      |    |
                      o    |
                     /|\   |
                     / \   |
                           - 
        </pre>",
    ];
    public $imagesConsole = [
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
    public function __construct(String $type)
    {
        $this->type = $type;
    }
    public function print()
    {
        if ($this->type == 'console') {
            echo $this->imagesConsole[$this->state];
        }
        elseif ($this->type == 'web'){
            echo $this->imagesWeb[$this->state];
        }
    }
    public function update()
    {
        $this->state++;
    }
}
