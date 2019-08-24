<?php
include "./inc/header.php";
include "./classes/Game.php";
include "./classes/Phrase.php";
session_start();

if (!isset($_SESSION['guessed'])) {
    $_SESSION['guessed'] = array();
}

$_SESSION['phrase'] = new Phrase("Ballsy Juan", []);
$_SESSION['gayme'] = new Game($_SESSION['phrase']);
var_dump($_SESSION['phrase']);

if (isset($_POST)) {
    $keys = array_keys($_POST);
    var_dump($_POST[$keys[0]]);
    array_push($_SESSION['guessed'], $_POST[$keys[0]]);
}

var_dump($_SESSION['guessed']);
?>

<body>
    <div class="main-container">
        <h2 class="header">Phrase Hunter</h2>
        <?php
        echo $_SESSION['phrase']->addPhraseToDisplay($_SESSION['guessed']);
        ?>
        <form action="play.php" class="keyboard" method="POST">
            <?php
            echo $_SESSION['gayme']->displayKeyboard(['a'], $_SESSION['guessed']);
            ?>
        </form>

        <form action="play.php">
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