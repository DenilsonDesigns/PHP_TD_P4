
<?php
class Phrase
{
    public $current_phrase;
    public $selected;


    function __construct($current_phrase, $selected = array())
    {
        $this->current_phrase = $current_phrase;
        $this->selected = $selected;
    }

    public function addPhraseToDisplay($guessed_letters = [])
    {
        echo $this->current_phrase;
        $chars = str_split($this->current_phrase);
        // echo $chars;
        $output_string = '<div id="phrase" class="section">
                                                        <ul>';

        foreach ($chars as $letter) {
            if ($letter != " ") {
                $output_string .= '<li class="hide letter ' . $letter . '">' . $letter . '</li>';
            } else {
                $output_string .= '<li class="hide letter space"> </li>';
            }
        }

        // <li class="hide letter h">h</li>
        // <li class="hide letter o">o</li>
        // <li class="hide letter w">w</li>
        // <li class="hide space"> </li>
        // <li class="hide letter a">a</li>
        // <li class="hide letter r">r</li>
        // <li class="hide letter e">e</li>
        // <li class="hide space"> </li>
        // <li class="hide letter y">y</li>
        // <li class="hide letter o">o</li>
        // <li class="hide letter u">u</li>

        $output_string .= '</ul>
                            </div>';

        //Builds the HTML for the letters of the phrase.
        // Each letter is presented by an empty box,
        // one list item for each letter. 
        //See the example_html/phrase.txt file for an example of 
        // what the render HTML for a phrase should look like 
        //when the game starts. When the player correctly 
        //guesses a letter, the empty box is replaced with the 
        // matched letter. Use the class "hide" to hide a letter 
        //and "show" to show a letter. Make sure the phrase 
        // displayed on the screen doesn't include boxes for 
        // spaces: see example HTML.
        return $output_string;
    }

    public function checkLetter()
    {
        // checks to see if a letter matches a letter in the phrase. ///Accepts a single letter to check against the phrase. 
        //Returns true or false.
    }
}
?>