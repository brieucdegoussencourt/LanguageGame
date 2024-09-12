<?php

class Player
{
    public $name;
    public $score;

    public function __construct(string $name, int $score)
    {
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