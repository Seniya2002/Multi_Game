<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Challenge</title>
    <link rel="stylesheet" href="css/load.css">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>
    <div class="floating-icons" id="icons-container"></div>
    
    <div class="game-container">
        <div class="game-header">
            <div class="game-info">
                <div class="round">Round: <span id="round">1/3</span></div>
                <div class="timer">Time: <span id="time">60s</span></div>
                <div class="score">Score: <span id="score">0</span></div>
            </div>
        </div>

        <div class="game-content">
            <div class="target-number">
                Find multiples of: <span id="target-number">?</span>
            </div>
            <div class="numbers-table" id="numbers-table"></div>
            <div class="result-feedback" id="result-feedback"></div>
        </div>

        <div class="controls">
            <button id="newRoundBtn" class="btn new-round-btn">Next Round</button>
            <!--<button id="quitBtn" class="btn quit-btn">Quit Game</button>-->
        </div>
    </div>

    <!-- Game Over Modal -->
    <div class="modal-overlay" id="modal-overlay">
        <div class="modal">
            <h2>Game Over!</h2>
            <p>Your final score: <span id="final-score">0</span></p>
            <button id="retryBtn" class="btn retry-btn">Retry</button>
            <button id="quitBtn" class="btn quit-btn">Reword</button>
        </div>
    </div>

    <script src="js/game.js"></script>
</body>
</html>