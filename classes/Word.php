<?php

declare(strict_types=1);
require_once 'Data.php';
use LanguageGame\Classes\Data;

class Word extends Data
{
    public static function getWord(): string
    {
        return array_rand(self::words());
    }

    public static function getTranslation(string $key): string
    {
        return self::words()[$key];
    }

    public function verify(string $randomWord, string $answer): string
    {
        // Convert the answer to uppercase for case-insensitive comparison
        $answer = strtoupper($answer);

        // Get the translation and convert it to uppercase
        $translation = strtoupper(self::getTranslation($randomWord));

        // If the answer is correct, display a congrats message
        if ($answer === $translation) {
            return 'Congratulations! You are correct!';
        } else {
            return 'Sorry, that is not correct. Please try again.';
        }
    }
}