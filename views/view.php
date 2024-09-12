<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Game</title>
</head>
<body>
    <h1>Language Game</h1>
    <h2>Welcome <?= htmlspecialchars($player->name) ?>!</h2>
    <h3>Translate the word: <?= htmlspecialchars($randomKey) ?></h3>
    <form method="POST" action="">
        <input type="text" name="answer" required placeholder="Enter your translation">
        <button type="submit">Submit</button>
    </form>
    <p><?= htmlspecialchars($message) ?></p>
    <h3>Your score is: <?= htmlspecialchars($player->score) ?></h3>
    
</body>
</html>