<?php
//hangman game
require_once "autoload.php";

use classes\Game;
use classes\Word;
use classes\RandomWord;
use classes\Player;

session_start();
//var_dump($_SESSION['game']);
if (!isset($_SESSION['game'])) {
    $randomWord = new RandomWord();
    $word = new Word($randomWord->getRandomWord());
    $player = new Player('Alex');
    $game = new Game($word, $player, 6, 'web');
    $_SESSION['game'] = $game;
} else {
    $game = $_SESSION['game'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['letter'])) {
    $letter = mb_strtolower($_POST['letter']);
    $game->makeGuess($letter);
}
if ($game->isWin()) {
    echo 'Congratulation! You guessed word: ';
    session_destroy();
    //break;
}
if ($game->isGameOver()) {
    echo '<br>';
    echo 'The attempts finished, you lost! Word: <strong>' . $game->word->originWord . '</strong>';
    echo '<br>';
    session_destroy();
    //break;
} else {
    $game = $_SESSION['game'];
    echo '<br><strong>';
    print_r($game->word->getDisplayedWord());
    echo '</strong><br>' . 'Attempts left: ';
    print_r($game->player->attemptsLeft);
    echo '<br>';
}


// while (true) {
//     $exit = mb_strtolower(readline("Try again? (y / n): "));
//     if ($exit === 'y') {
//         start();
//     } else {
//         echo "Thank you for game!";
//         break;
//     }
// }
?>

<form method="post">
    <label for="letter">Enter letter:</label>
    <input type="text" name="letter" id="letter" maxlength="1">
    <button type="submit">Guess</button>
</form>