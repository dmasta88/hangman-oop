<?php

namespace classes;
use classes\Image;
class Game
{
    public $word;
    public $player;
    public $attempts;
    public $image;
    public function __construct(Word $word, Player $player, Int $attempts = 6)
    {
        $this->word = $word;
        $this->player = $player;
        $this->attempts= $attempts;
        $this->player->attemptsLeft = $attempts;
        $this->image = new Image();
        $this->start();
    }
    public function start()
    {

        // if (!$this->isWin()) {
        //     $this->play($this->word->originWord);
        // } 
    }
    public function makeGuess($letter)
    {
        if (!$this->player->hasGuessedLetter($letter)) {
            if ($this->word->revealLetter($letter)) {
                $this->player->addGuessedLetter($letter);
            }
            else {
                $this->player->decreaseAttempts();
                $this->image->update();
            }
        }
        $this->image->print();

    }
    public function isGameOver(){
        if ($this->player->attemptsLeft < 1){
            return true;
        }
        return false;
    }
    public function isWin() {
        return $this->word->isFullyRevealed();
    }
}
