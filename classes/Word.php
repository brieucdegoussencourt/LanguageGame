<?php
require_once 'Data.php';
require_once 'Player.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!class_exists('Word')) {
    class Word extends Data
    {
        public static function getWord(): string
        {
            $wordsArray = Data::words(); // Call the words() method to get the associative array
            $keys = array_keys($wordsArray); // Get the keys of the array
            $word = $keys[array_rand($keys)]; // Randomly select a key from the keys array
            return $word;
        }

        public static function getAnswer(string $key): string
        {
            $wordsArray = Data::words(); // Call the words() method to get the associative array
            return $wordsArray[$key]; // Get the value of the key
        }
        
        public function verify(string $answer): bool
        {
            // Verify if the provided answer by the user matches the correct one
            return strcasecmp(Data::getTranslation($randomKey), $answer) === 0;
        }
    }
}


