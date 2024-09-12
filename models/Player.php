<?php

class Player
{
    public $name;
    public $score;

    public function __construct(string $name, int $score = 0)
    {
        $this->name = $name;
        $this->score = $score;
    }

    public function increaseScore(): void
    {
        $this->score++;
    }

    public function decreaseScore(): void
    {
        // Ensure the score does not go below 0 if you want a lower limit
        if ($this->score > 0) {
            $this->score--;
        }
    }
}