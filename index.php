<?php
session_start();

// Generate a random number if it hasn't been set in the session
if (!isset($_SESSION['secretNumber'])) {
    $_SESSION['secretNumber'] = rand(1, 100); // Number between 1 and 100
    $_SESSION['guessAttempts'] = 0;
}

// Initialize a variable to store feedback message
$feedbackMessage = "";

// Handle the user's guess
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userGuess = intval($_POST['userGuess']);
    $_SESSION['guessAttempts'] += 1; // Increment attempts

    if ($userGuess < $_SESSION['secretNumber']) {
        $feedbackMessage = "Try a higher number.";
    } elseif ($userGuess > $_SESSION['secretNumber']) {
        $feedbackMessage = "Try a lower number.";
    } else {
        $feedbackMessage = "Congratulations! You guessed the number in {$_SESSION['guessAttempts']} attempts.";
        // Reset the game
        unset($_SESSION['secretNumber']);
        unset($_SESSION['guessAttempts']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Guessing Game</title>
</head>
<body>
    <h1>Number Guessing Game</h1>
    <p>Guess the number between 1 and 100.</p>

    <?php if ($feedbackMessage): ?>
        <p><strong><?php echo $feedbackMessage; ?></strong></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="userGuess">Your Guess:</label>
        <input type="number" name="userGuess" id="userGuess" required min="1" max="100">
        <button type="submit">Submit Guess</button>
    </form>
</body>
</html>
