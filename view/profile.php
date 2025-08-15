<?php
session_start();
include '../model/connect.php';
include '../controller/ProfileController.php';

if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}

$controller = new ProfileController($conn);
$userProfile = $controller->getUserProfile($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Kingdom- Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<div id="icons-container"></div>
    <nav class="navbar">
        <div class="logo">Multiplication Kingdom</div>
        <button onclick="location.href='index.php'" class="btn">Back to Home</button>
    </nav>

    <div class="container">
        <h2><?php echo htmlspecialchars($_SESSION['username']); ?> Profile</h2>
        <div class="profile-info">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($userProfile['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($userProfile['email']); ?></p>
            <p><strong>Total Score:</strong> <?php echo htmlspecialchars($userProfile['total_score'] ?? 0); ?></p>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
