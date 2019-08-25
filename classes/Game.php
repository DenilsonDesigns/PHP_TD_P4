<?php
class Game
{
    public $phrase;
    public $lives = 5;
    public $game_over;

    function __construct($phrase)
    {
        $this->phrase = $phrase;
    }

    public function checkForWin($guessed, $winners)
    {
        $filtered_winners = array_filter($winners, function ($element) {
            return is_string($element) && '' !== trim($element);
        });
        $overs = array_diff($filtered_winners, $guessed);
        if (count($overs) > 0) {
            return false;
        }

        $this->game_over = true;
        return true;
    }

    public function checkForLose($num_guesses)
    {
        if ($num_guesses <= 0) {
            $this->lives = 0;
            $this->game_over = true;
            return true;
        }
        return false;
    }

    public function gameOver()
    {
        if ($this->lives == 0 && $this->game_over == true) {
            return "<p class='final-msg'>You Lose :(</p>";
        }

        if ($this->lives > 0 && $this->game_over == true) {
            return "<p class='final-msg'>You Win!</p>";
        }

        return false;
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
                if ($this->phrase->checkLetter($first, $guessed_letters)) {
                    if ($this->phrase->checkLetter($first, $phrase_letters)) {
                        $output_keyboard .= '<button id="' . $first . '" name="' . $first . '" value="' . $first . '" class="key correct" disabled>' . $first . '</button>';
                    } else {
                        $output_keyboard .= '<button id="' . $first . '" name="' . $first . '" value="' . $first . '" class="key incorrect" disabled>' . $first . '</button>';
                    }
                } else {
                    $output_keyboard .= '<button id="' . $first . '" name="' . $first . '" value="' . $first . '" class="key " >' . $first . '</button>';
                }
                // if yes in guessed letters:
            }
            $output_keyboard .= '</div>';
        }

        $output_keyboard .= '</div>';

        return $output_keyboard;
    }

    public function displayScore($guesses_avail)
    {
        $total_hearts = 5;
        $empty_hearts = $total_hearts - $guesses_avail;

        $output = '<div id="scoreboard" class="section">
        <ol>';

        for ($i = 0; $i < $guesses_avail; $i++) {
            $output .= '<li class="tries"><img src="images/liveHeart.png" height="35px" widght="30px"></li>';
        }
        for ($i = 0; $i < $empty_hearts; $i++) {
            $output .= '<li class="tries"><img src="images/lostHeart.png" height="35px" widght="30px"></li>';
        }
        $output .= '</ol>
    </div>';
        return $output;
    }
}
