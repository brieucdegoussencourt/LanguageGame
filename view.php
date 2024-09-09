<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'classes/Player.php';
require_once 'classes/Data.php';
require_once 'classes/Word.php';

$word = Word::getWord(); // Call the getWord() method to get a random key

echo $randomKey . '=' . $translation;

// Declare a message variable
$message = 'test';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game</title>
</head>
<body>
    <h1>Language Game</h1>
    <h2>Translate the word to English</h2>
    <h3>Player=<?= htmlspecialchars($player->name, ENT_QUOTES, 'UTF-8'); ?> Score=<?= htmlspecialchars($player->score, ENT_QUOTES, 'UTF-8'); ?></h3>
    <h4>Translate the word: "<?=$word?>" </h4>
    <form action="classes/Word.php" method="post">
        <input type="text" id="answer" name="answer" placeholder="Type your English translation here">
        <button type="submit">Submit</button>
    </form>
	<h4><?php echo htmlspecialchars($message); ?></h4>
</body>
</html>