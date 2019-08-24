
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
        $output_string = '<div id="phrase" class="section">
                                                        <ul>';

        foreach ($chars as $letter) {
            if ($letter != " ") {
                if ($this->checkLetter($letter, $guessed_letters)) {
                    $output_string .= '<li class="show letter ' . $letter . '">' . $letter . '</li>';
                } else {
                    $output_string .= '<li class="hide letter ' . $letter . '">' . $letter . '</li>';
                }
            } else {
                $output_string .= '<li class="hide letter space"> </li>';
            }
        }

        $output_string .= '</ul>
                            </div>';
        return $output_string;
    }

    public function checkLetter($letter, $mainphrase)
    {
        if (in_array(strtolower($letter), $mainphrase)) {
            return true;
        }
        return false;
    }
}
?>