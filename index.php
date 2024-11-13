<?php
//hangman game

// Start the game

// Output the word mask and the basic hangman Stage 1
// Request to enter a letter
// Check this letter in the array of letters that make up the word
// If there is no letter, change the picture and decrease the number of attempts.

// If there is a letter, change the word mask.

// Check if there are any unsolved letters left.
// If there are none, then the word is solved. If there are any, start this cycle again.

//define('ATTEMPTS', '6'); 
//const ATTEMPTS = 6;
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
    $game = new Game($word, $player, 6);

    while (true) {
        $letter = mb_strtolower(readline("Enter letter: "));
        $game->makeGuess($letter);
        if ($game->isGameOver()) {
            echo 'Закончились ходы, вы проиграли! Слово было: '.$game->word->originWord;
            echo PHP_EOL;
            break;
        }
        if ($game->isWin()) {
            echo 'Поздравляем! Вы угадали слово: ' . $game->word->originWord;
            echo PHP_EOL;
            break;
        }
        echo PHP_EOL;
        print_r($game->word->getDisplayedWord());
        echo PHP_EOL . 'Осталось попыток: ';
        print_r($game->player->attemptsLeft);
        echo PHP_EOL;
        // echo PHP_EOL;
        // print_r($game->player->guessedLetters);
        // echo PHP_EOL;
    }
}
while (true) {
    $exit = mb_strtolower(readline("Повторить? (y / n): "));
    if ($exit === 'y') {
        start();
    } else {
        echo "Спасибо за игру!";
        break;
    }
}
