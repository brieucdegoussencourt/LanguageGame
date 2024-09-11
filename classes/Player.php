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

$player = new Player('', 0);