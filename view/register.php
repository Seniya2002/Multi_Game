<?php
include '../controller/registrationHandler.php';
include '../model/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    if (!empty($username)) {
        setcookie('user', $username, time() + (86400 * 30), "/"); // Store for 30 days
        $_SESSION['user'] = $username;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Multiplication Kingdom</title>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <div class="auth-container">
        <h1>Register Now!</h1>
        <form id="registerForm" action="../controller/registrationHandler.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Choose a username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Choose a password" required>
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="Confirm your password" required>
            </div>
            <p id="errorMessage" class="error-message" ></p>
            <button type="submit" class="btn">Register</button>
        </form>
        <p style= "margin-top: 24px;">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
<script src="js/script.js"></script>
</html>
