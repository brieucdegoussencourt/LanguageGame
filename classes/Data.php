<?php
declare(strict_types=1);

class Data
{
    public static function words(): array
    {
        return [
            'pain' => 'bread',
            'nain de jardin' => 'garden gnome',
            'oeuf' => 'egg',
            'buisson' => 'bush',
            'chapeau' => 'hat',
            'porte' => 'door',
            'musique' => 'music',
            'biscuit' => 'cookie',
        ];
    }

    public static function getTranslation(string $key): string
    {
        $wordsArray = self::words();
        return $wordsArray[$key] ?? '';
    }
}
    
    // public static function getRandomKey(): string
    // {
    //     $wordsArray = self::words(); // Call the words() method to get the associative array
    //     $keys = array_keys($wordsArray); // Get the keys of the array
    //     $randomKey = $keys[array_rand($keys)]; // Randomly select a key from the keys array
    //     return $randomKey;
    // }

    // public static function getTranslation(string $key): string
    // {
    //     $wordsArray = self::words(); // Call the words() method to get the associative array
    //     return $wordsArray[$key]; // Get the value of the key
    // }
// }

// $randomKey = Data::getRandomKey(); // Call the getRandomKey() method to get a random key
// $translation = Data::getTranslation($randomKey); // Call the getTranslation() method to get the translation of the random key

// echo $randomKey . '=' . $translation;
