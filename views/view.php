<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Game</title>
</head>
<body>
    <!-- Display the title and welcome message -->
    <h1>Language Game</h1>
    <h2>Welcome <?= htmlspecialchars($player->name) ?>!</h2>
    <h3>Translate the word: <?= htmlspecialchars($randomKey) ?></h3>

    <!-- Form to display the random word and submit the translation -->
    <form method="POST" action="">
        <input type="text" name="answer" required placeholder="Enter your translation">
        <button type="submit">Submit</button>
    </form>

    <!-- Display the message (correct/incorrect) and the player's score -->
    <p><?= htmlspecialchars($message) ?></p>
    <h3>Your score is: <?= htmlspecialchars($player->score) ?></h3>
    
    <!-- Reset button to restart the game -->
    <form method="POST" action="">
        <input type="hidden" name="reset" value="true">
        <button type="submit">Reset Game</button>
    </form>
    
</body>
</html>