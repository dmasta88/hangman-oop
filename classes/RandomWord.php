<?php
namespace classes;

class RandomWord{
    public function getRandomWord()
    {
        $filename = dirname(__DIR__) . '/words.txt';
        if (file_exists($filename)){
            $fileContent = file_get_contents(dirname(__DIR__) . '/words.txt');
            // Split the content into an array of words using spaces, line breaks, and punctuation
            $words = preg_split('/[\s,.;!?]+/', $fileContent, -1, PREG_SPLIT_NO_EMPTY);
            // Get a random word
            $randomWord = mb_strtolower($words[array_rand($words)]);
            return $randomWord;
        }
    }
}