<?php
include '../model/connect.php';

// Handle login request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Get user data
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["password"])) {
            // Successful login
            session_start();
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("Location: ../view/index.php"); // Redirect to home page
            exit();
        } else {
            $_SESSION["error"] = "Incorrect password. Please try again.";
            echo "<script>alert('Invalid username or password!');window.location.href='../view/login.php';</script>";
            
            exit();
        }
    } else {
        $_SESSION["error"] = "Username not found. Please try again.";
        echo "<script>alert('Invalid username or password!');window.location.href='../view/login.php';</script>";
        
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
