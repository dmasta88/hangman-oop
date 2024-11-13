<?php
namespace classes;

class Player{
    public $name;
    public $attemptsLeft;
    public $guessedLetters;
    public function __construct(String $name) {
        $this->name = $name;
        //$this->attemptsLeft = $attempts;
    }
    public function decreaseAttempts(){
        $this->attemptsLeft--;
    }
    public function addGuessedLetter($letter)
    {
        $this->guessedLetters [] = $letter;
    }
    public function hasGuessedLetter($letter)
    {
        if (isset($this->guessedLetters) && in_array($letter, $this->guessedLetters)) {
            return true;
        }
        return false;
    }
}