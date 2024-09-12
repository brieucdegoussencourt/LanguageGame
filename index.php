<?php
// Require the correct variable type to be used
declare(strict_types=1);

// Show errors for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once __DIR__ . '/controllers/GameController.php';

use LanguageGame\Controllers\GameController;


// Start the game by delegating to the controller
$controller = new GameController();
$controller->run();