<?php
include '../model/connect.php';
$error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
unset($_SESSION['error']);

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
    <title>Login - Multiplication Kingdom</title>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <div class="auth-container">
        <h1>Welcome Back!</h1>
        <form id="loginForm" action="../controller/loginHandler.php" method="POST">
            <div class="input-group" style= "margin-top: 24px;">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group" style= "margin-top: 24px;">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <p id="errorMessage" class="error-message" style= "margin-top: 24px;"></p>
            <button type="submit" class="btn login-btn">Login</button>
        </form>
        <p style= "margin-top: 24px;">New here?<a href="register.php">Create an account</a></p>
    </div>
    
</body>
<script src="js/script.js"></script>
</html>
