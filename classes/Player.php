<?php

class Player
{
    // TODO: add name and score
    public $name;
    public $score;

    public function __construct(string $name, int $score)
    {
        // TODO: add 👤 automatically to their name
        $this->name = '👤';
        $this->score = 0;
    }
    public function increaseScore()
    {
        //increase the player's score
        $this->score++;
    }
}

// // Initialize the player and store it in the session if not already set
// session_start();
// if (!isset($_SESSION['player'])) {
//     $_SESSION['player'] = new Player('', 0);
// }

$player = new Player('', 0);