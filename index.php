<?php
//hangman game
require_once "autoload.php";

use classes\Game;
use classes\Word;
use classes\RandomWord;
use classes\Player;

start();

function start()
{
    $randomWord = new RandomWord();
    $word = new Word($randomWord->getRandomWord());
    $player = new Player('Alex');
    $game = new Game($word, $player, 6, 'console');

    while (true) {
        $letter = mb_strtolower(readline("Enter letter: "));
        $game->makeGuess($letter);
        if ($game->isGameOver()) {
            echo 'The attempts finished, you lost! Слово было: '.$game->word->originWord;
            echo PHP_EOL;
            break;
        }
        if ($game->isWin()) {
            echo 'Congratulation! You guessed word: ' . $game->word->originWord;
            echo PHP_EOL;
            break;
        }
        echo PHP_EOL;
        print_r($game->word->getDisplayedWord());
        echo PHP_EOL . 'Attempts left: ';
        print_r($game->player->attemptsLeft);
        echo PHP_EOL;
        // echo PHP_EOL;
        // print_r($game->player->guessedLetters);
        // echo PHP_EOL;
    }
}
while (true) {
    $exit = mb_strtolower(readline("Try again? (y / n): "));
    if ($exit === 'y') {
        start();
    } else {
        echo "Thank you for game!";
        break;
    }
}
