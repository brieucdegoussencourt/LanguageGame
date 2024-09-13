<?php

declare(strict_types=1);

namespace LanguageGame\Models;

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
        $this->score--;
    }
}