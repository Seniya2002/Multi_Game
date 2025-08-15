<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user'])) {
    die("User not logged in");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Kingdom - Difficulty Selection</title>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/select.css">
</head>
<body>
    <div class="floating-icons" id="icons-container"></div>
    
    <div class="difficulty-container">
        <h1 class="difficulty-title">Select your choice</h1>
        
        <div class="difficulty-options">
            <button class="difficulty-btn easy">Easy</button>
            <button class="difficulty-btn medium">Medium</button>
            <button class="difficulty-btn hard">High</button>
        </div>
        
        <button class="start-game-btn">Let's Start Game</button>
    </div>

    <script src="js/difficulty.js"></script>
</body>
</html>