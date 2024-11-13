<?php

namespace classes;

class Word
{
    public $originWord;
    public $displayedWord;
    public function __construct($randomWord)
    {
        $this->originWord = $randomWord;
        $this->createMask($this->originWord);
    }
    public function createMask($word)
    {
        $this->displayedWord = str_repeat('*', mb_strlen($word));
    }
    public function revealLetter($letter)
    {
        $found = false;
        $length = mb_strlen($this->originWord); // Длина строки в символах

        for ($i = 0; $i < $length; $i++) {
            if (mb_substr($this->originWord, $i, 1) === $letter) {
                // Меняем соответствующую букву в $displayedWord
                $this->displayedWord =
                    mb_substr($this->displayedWord, 0, $i) . $letter .
                    mb_substr($this->displayedWord, $i + 1);

                $found = true;
            }
        }

        return $found;
    }
    public function isFullyRevealed()
    {
        if ($this->originWord == $this->displayedWord) {
            return true;
        }
        return false;
    }
    public function getDisplayedWord()
    {
        return $this->displayedWord;
    }
}
