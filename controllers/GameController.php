<?php

require_once './models/Word.php';
require_once './models/Player.php';

use LanguageGame\Models\Player;  
use LanguageGame\Models\Word;

class GameController
{
    private $player;
    private $randomKey;
    private $message;
    private $nickname;

    public function __construct()
    {
        session_start();  // Start the session to track data across requests

        // Handle reset request to clear session
        if (isset($_POST['reset'])) {
            $this->resetGame();
        }

        // Check if the nickname is already set in the session
        if (!isset($_SESSION['nickname'])) {
            $this->nickname = '';  // If no nickname, initialize as empty
        } else {
            $this->nickname = $_SESSION['nickname'];
        }

        // If the user has submitted the nickname, store it in the session
        if (isset($_POST['nickname'])) {
            $this->nickname = trim($_POST['nickname']);  // Sanitize input
            $_SESSION['nickname'] = $this->nickname;  // Store nickname
            $_SESSION['player'] = new Player($this->nickname, 0);  // Create player
            $_SESSION['randomKey'] = Word::getWord();  // Generate first word
        }

        // Initialize player and word from session if set
        if (!isset($_SESSION['player'])) {
            $_SESSION['player'] = new Player('Player 1', 0);  // Default player
        }
        if (!isset($_SESSION['randomKey'])) {
            $_SESSION['randomKey'] = Word::getWord();  // Default word
        }

        $this->player = $_SESSION['player'];
        $this->randomKey = $_SESSION['randomKey'];
        $this->message = '';
    }

    public function run(): void
    {
        // If nickname is not set, show the nickname form
        if (empty($this->nickname)) {
            $this->renderNicknameForm();
            return;
        }

        // If form is submitted with an answer, check the answer
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
            $this->checkAnswer($_POST['answer']);

            // Generate new word after submission
            $this->randomKey = Word::getWord();
            $_SESSION['randomKey'] = $this->randomKey;
        }

        // Store message and player back into the session
        $_SESSION['message'] = $this->message;
        $_SESSION['player'] = $this->player;

        // Render the main game view
        $this->renderView($this->randomKey, $this->message, $this->player);
    }

    private function checkAnswer(string $answer): void
    {
        $sanitizedAnswer = trim($answer);

        // Check if answer is correct
        if (Word::verify($this->randomKey, $sanitizedAnswer)) {
            $this->message = "Correct!";
            $this->player->increaseScore();
        } else {
            $correctAnswer = Word::getTranslation($this->randomKey);
            $this->message = "Wrong! The correct translation is: $correctAnswer";
            $this->player->decreaseScore();
        }
    }

    private function renderView(string $randomKey, string $message, Player $player): void
    {
        require 'views/view.php';
    }

    private function renderNicknameForm(): void
    {
        // Load the nickname form view
        require 'views/nickname_form.php';
    }

    private function resetGame(): void
    {
        // Clear the session to reset the game
        session_destroy();
        session_start();  // Restart session

        // Redirect to refresh the game
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }
}