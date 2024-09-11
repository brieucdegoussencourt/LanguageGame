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
    <h4>Translate the word: "<?=$randomKey?>"</h4>
    <form action="classes/word.php" method="post">
        <input type="text" id="answer" name="answer" placeholder="Type your English translation here">
        <button type="submit">Submit</button>
    </form>
	<h4><?php echo htmlspecialchars($message); ?></h4>
</body>
</html>