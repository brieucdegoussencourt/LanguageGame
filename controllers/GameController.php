<?php

declare(strict_types=1);

namespace LanguageGame\Controllers;

require_once __DIR__ . '/../models/Word.php';
require_once __DIR__ . '/../models/Player.php';

use LanguageGame\Models\Word;
use LanguageGame\Models\Player;

class GameController
{
    private $player;
    private $randomKey;
    private $message;

    public function __construct()
    {
        session_start();  // Start the session to track data across requests

        // If the user clicks the reset button, clear the session and start over
        if (isset($_POST['reset'])) {
            $this->resetGame();
        }

        // If the request method is GET, reset the score to 0 (page reload or first visit)
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Reset the session for a new game (new score and word)
            $_SESSION['player'] = new Player('Player 1', 0);  // Reset score to 0
            $_SESSION['randomKey'] = Word::getWord();  // Generate a new word
        }

        // Retrieve the player and word from the session
        $this->player = $_SESSION['player'];
        $this->randomKey = $_SESSION['randomKey'];
        $this->message = '';
    }

    public function run(): void
    {
        // If the form was submitted via POST (not a page reload), process the answer
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
            $this->checkAnswer($_POST['answer']);

            // Always generate a new word after form submission
            $this->randomKey = Word::getWord();  // Update randomKey with a new word
            $_SESSION['randomKey'] = $this->randomKey;  // Store the new word in the session
        }

        // Save the message to the session for display on the page
        $_SESSION['message'] = $this->message;

        // Store the updated player back into the session
        $_SESSION['player'] = $this->player;

        // Render the view with the current word, message, and player info
        $this->renderView($this->randomKey, $this->message, $this->player);
    }

    private function checkAnswer(string $answer): void
    {
        // Sanitize user input
        $sanitizedAnswer = trim($answer);

        // Verify the user's input against the word stored in the session
        if (Word::verify($this->randomKey, $sanitizedAnswer)) {
            // Correct answer
            $this->message = "Correct!";
            $this->player->increaseScore();
        } else {
            // Incorrect answer
            $correctAnswer = Word::getTranslation($this->randomKey);
            $this->message = "Wrong! The correct translation is: $correctAnswer";
            $this->player->decreaseScore();
        }
    }

    private function renderView(string $randomKey, string $message, Player $player): void
    {
        // Load the view with the necessary data
        require 'views/view.php';
    }

    private function resetGame(): void
    {
        // Clear the session to reset everything
        session_destroy();
        session_start();  // Restart the session after clearing it

        // Redirect to the same page to restart the game
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }
}