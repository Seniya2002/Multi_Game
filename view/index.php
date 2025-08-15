<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['user_id'])&& !isset($_COOKIE['user'])) {
    header("Location: ../view/welcome.html"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Kingdom</title>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  

    <!-- Floating Icons -->
    <div class="floating-icons" id="icons-container"></div>
    
    <!-- Main Content -->
    <div class="container">
        <h1>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?> to</h1>
        <h1 class="title-main">Multiplication Kingdom </h1>
        
        <div class="buttons">
            <button class="btn start-btn" id="startBtn"onclick="window.location.href='select.php'">select levels</button>
            <button class="btn start-btn" id="startBtn"onclick="window.location.href='leaderboard.php'">leader Board</button>
            <button class="btn start-btn" id="startBtn"onclick="window.location.href='profile.php'">Profile</button>
            <button class="btn quit-btn" id="quitBtn" onclick="window.location.href='logout.php'">Quit Game</button>

        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
