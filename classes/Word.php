<?php
declare(strict_types=1);

require_once 'Data.php';
use LanguageGame\Classes\Data;

class Result extends Data
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

// Get a random word and its translation
$randomKey = Result::getWord(); // Call the getWord() method to get a random key
$translation = Result::getTranslation($randomKey); // Call the getTranslation() method to get the translation of the random key

// Display the random word and its translation
echo $randomKey . '=' . $translation . "<br>";

// Retrieve the answer from the form and make sure it is a string
$answer = isset($_POST['answer']) ? (string)$_POST['answer'] : '';
echo $answer;
$result = new Result();

// Display a message only if the form has been submitted
$message = '';
if (!empty($answer)) {
    $message = $result->verify($randomKey, $answer);
    echo $message;
}
echo $message;