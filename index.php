<?php
// Require the correct variable type to be used
declare(strict_types=1);

// Show errors for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load your controllers and models
require_once 'controllers/GameController.php';
require_once 'models/Player.php';
require_once 'models/Word.php';
require_once 'models/Data.php';

// Start the game by delegating to the controller
$controller = new GameController();
$controller->run();