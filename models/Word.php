<?php

declare(strict_types=1);

namespace LanguageGame\Models;

// Manually include the Data.php file
require_once __DIR__ . '/Data.php';

class Word
{
    public static function getWord(): string
    {
        return array_rand(Data::words());
    }

    public static function getTranslation(string $key): string
    {
        return Data::words()[$key];
    }

    public static function verify(string $randomWord, string $answer): bool
    {
        // Fetch the correct translation for the random word
        $correctTranslation = Data::words()[$randomWord];
    
        // Case-insensitive comparison for verification
        return strcasecmp($correctTranslation, $answer) === 0;
    }
}