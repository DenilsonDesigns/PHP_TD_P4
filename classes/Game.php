<?php
class Game
{
    public $phrase;
    public $lives;

    function __construct($phrase)
    {
        $this->phrase = $phrase;
    }

    public function checkForWin()
    {
        //this method checks to see if the player 
        //has selected all of the letters.
    }

    public function checkForLose()
    {
        // this method checks to see if the player
        // has guessed too many wrong letters;
    }

    public function gameOver()
    {
        // this method displays one message if the player wins and another
        // message if they lose. It returns false
        // if the game has not been won or lost. 
    }

    public function displayKeyboard($phrase_letters = [], $guessed_letters = [])
    {

        $keyboard_rows = array(
            ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'],
            ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l'],
            ['z', 'x', 'c', 'v', 'b', 'n', 'm']
        );


        $output_keyboard = '<div id="qwerty" class="section">';

        foreach ($keyboard_rows as $rows) {

            $output_keyboard .= '<div class="keyrow">';
            foreach ($rows as $first) {
                // if not in guessed letters.
                if (!in_array($first, $guessed_letters)) {
                    $output_keyboard .= '<button name="' . $first . '" value="' . $first . '" class="key">' . $first . '</button>';
                } else {
                    $output_keyboard .= '<button name="' . $first . '" value="' . $first . '" class="key" style="background-color: red" disabled>' . $first . '</button>';
                }
                // if yes in guessed letters:
            }
            $output_keyboard .= '</div>';
        }

        $output_keyboard .= '</div>';

        return $output_keyboard;
        // Create an onscreen keyboard form. See the example_html/keyboard.txt
        // file for an example of what the render HTML for the keyboard should
        // look like. If the letter has been selected the button should be disabled. 
        // Additionally, the class "correct" or "incorrect" should be added
        // based on the checkLetter() method of the Phrase object. 
        // Return a string of HTML for the keyboard form.
    }

    public function displayScore()
    {
        // Display the number of guesses available.
        // See the example_html/scoreboard.txt file for an example of what the render
        // HTML for a scoreboard should look like.
        // Return a string HTML of Scoreboard.
    }
}
