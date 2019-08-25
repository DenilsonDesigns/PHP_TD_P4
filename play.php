<?php
include "./inc/header.php";
include "./classes/Game.php";
include "./classes/Phrase.php";
session_start();


if (isset($_POST['restart']) || isset($_POST['start-gayme'])) {
    unset($_SESSION['guessed']);
    unset($_SESSION['phrase']);
    unset($_SESSION['gayme']);
    echo "Game restarted";
} elseif (isset($_POST)) {
    $keys = array_keys($_POST);
    if (!in_array($_POST[$keys[0]], $_SESSION['phrase']->phraseArray())) {
        $_SESSION['guesses']--;
        if ($_SESSION['gayme']->checkForLose($_SESSION['guesses'])) {
            //not sure how to handle this yet. 
            $_SESSION['gayme']->gameOver("lose");
        }
    }
    //this is where actually pushing to guessed array
    var_dump($_SESSION['guessed']);
    var_dump($_SESSION['phrase']->phraseArray());
    array_push($_SESSION['guessed'], $_POST[$keys[0]]);
    if ($_SESSION['gayme']->checkForWin($_SESSION['guessed'], $_SESSION['phrase']->phraseArray())) {
        $_SESSION['gayme']->gameOver("win");
    }
}

if (!isset($_SESSION['guessed'])) {
    $_SESSION['guessed'] = array();
    $_SESSION['phrase'] = new Phrase("ballsy juan", []);
    $_SESSION['gayme'] = new Game($_SESSION['phrase']);
    $_SESSION['guesses'] = 5;
}


var_dump($_SESSION['phrase']);
var_dump($_SESSION['guessed']);

?>

<body>
    <div class="main-container">
        <h2 class="header">Phrase Hunter</h2>
        <?php
        echo $_SESSION['phrase']->addPhraseToDisplay($_SESSION['guessed']);
        echo $_SESSION['gayme']->displayScore($_SESSION['guesses']);
        ?>
        <form action="play.php" class="keyboard" method="POST">
            <?php

            if ($_SESSION['gayme']->gameOver()) {
                echo $_SESSION['gayme']->gameOver();
            } else {
                echo $_SESSION['gayme']->displayKeyboard($_SESSION['phrase']->phraseArray(), $_SESSION['guessed']);
            }

            ?>
        </form>

        <form action="play.php" method="POST">
            <input id="btn-start-again" type="submit" value="Restart Game" name="restart" />
        </form>
    </div>

</body>

</html>

<!-- This file creates a new instance of the Phrase class which OPTIONALLY accepts the current phrase as a string, and an array of selected letters.
This file creates a new instance of the Game class which accepts the created instance of the Phrase class.
The constructor should handle storing the phrase string and selected letters in sessions or another storage mechanism.
In the body of the page you should play the game. To play the game:
Use the gameOver method to check if the game has been won or lost and display appropriate messages.
If the game is still in play, display the game items: displayPhrase(), displayKeyboard(), displayScore() -->