<?php
declare(strict_types=1);
require_once 'Word.php';

class LanguageGame extends Word
{
    private $randomKey;
    private $message;

    public function __construct()
    {
        $this->randomKey = Word::getWord();
        $this->message = '';
    }
    public function getRandomKey(): string
    {
        return $this->randomKey;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function run(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Get a random word and, the answer from the user and instantiate the Word class with the object $result
        $translation = Word::getTranslation($this->randomKey);
        $answer = isset($_POST['answer']) ? (string)$_POST['answer'] : '';
        $result = new Word();

        // Display a message only if the form has been submitted
        if (!empty($answer)) {
            $this->message = $result->verify($this->randomKey, $answer);
            $_SESSION['message'] = $this->message; // Store the message in a session variable
            // Redirect to index.php after processing the form submission
            header('Location: ../index.php');
            exit(); // Ensure no further code is executed after the redirection
        }
    }

}


// Process form submission if this script is accessed directly
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game = new LanguageGame();
    $game->run();
}



















        // TODO: check for option A or B

        // Option A: user visits site first time (or wants a new word)
        // TODO: select a random word for the user to translate

        // Option B: user has just submitted an answer
        // TODO: verify the answer (use the verify function in the word class) - you'll need to get the used word from the array first
        // TODO: generate a message for the user that can be shown

