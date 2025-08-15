<?php
// Start the session
session_start();
setcookie('user', '', time() - 3600, "/");// Expire the cookies
// Destroy the session to log out the user
session_unset();  // Unset all session variables
session_destroy();  // Destroy the session

// Redirect the user to the welcome page (or login page)
header("Location: welcome.html");
exit();
?>
