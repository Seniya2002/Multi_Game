<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])&& !isset($_COOKIE['user'])) {
    die("User not logged in");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banana Math Interface</title>
    <link rel="stylesheet" href="css/banana.css">
</head>
<body>
    <div class="container">
        <h1>🍌 Banana Math Challenge 🍌</h1>
        
        <div class="problem-container">
            <img id="banana-image" class="banana-image" alt="Banana arrangement">
        </div>

        <div class="answer-section">
            <input type="number" id="user-answer" placeholder="Enter your answer">
            <button onclick="checkAnswer()">Check Answer</button>
            <button onclick="newProblem()">New Problem</button>
            <div id="result" class="result"></div>
        </div>
    </div>

    <!-- Popup for Final Score -->
    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>Game Over!</h2>
            <p id="final-score"></p>
            <button onclick="closePopup()">OK</button>
        </div>
    </div>

    <script src="js/banana.js"></script>
</body>
</html>
