<?php
include '../model/connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("User not logged in");
}

$user_id = $_SESSION['user_id'];
// Check if scores are provided, default to 0 if not
$multiplicationScore = isset($_POST['multiplicationScore']) ? (int)$_POST['multiplicationScore'] : 0;
$bananaScore = isset($_POST['bananaScore']) ? (int)$_POST['bananaScore'] : 0;

// Check existing scores
$checkStmt = $conn->prepare("SELECT * FROM scores WHERE user_id = ?");
if (!$checkStmt) die("Prepare failed: " . $conn->error);
$checkStmt->bind_param("i", $user_id);
if (!$checkStmt->execute()) die("Execute failed: " . $checkStmt->error);
$result = $checkStmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Check attempts for Banana game only
    if ($bananaScore > 0 && $row['attempts'] >= 3) {
        die("Maximum attempts (3) for Banana game reached!");
    }

    // Update scores
    $newMultiplicationScore = max($row['multiplication_score'], $multiplicationScore);
    $newBananaScore = $row['banana_score'] + $bananaScore;  // Accumulate banana score
    $totalScore = $newMultiplicationScore + $newBananaScore;
    
    // Increment attempts ONLY for Banana game submissions
    $attempts = $bananaScore > 0 ? $row['attempts'] + 1 : $row['attempts'];

    $updateStmt = $conn->prepare("UPDATE scores SET 
        multiplication_score = ?, 
        banana_score = ?, 
        total_score = ?, 
        attempts = ? 
        WHERE user_id = ?"
    );
    if (!$updateStmt) die("Prepare failed: " . $conn->error);
    $updateStmt->bind_param("iiiii", 
        $newMultiplicationScore, 
        $newBananaScore, 
        $totalScore, 
        $attempts, 
        $user_id
    );
    if ($updateStmt->execute()) {
        echo "Score updated successfully";
    } else {
        die("Execute failed: " . $updateStmt->error);
    }
    $updateStmt->close();
} else {
    // Insert new record (only reachable if no existing row)
    $totalScore = $multiplicationScore + $bananaScore;
    $attempts = $bananaScore > 0 ? 1 : 0;  // Count attempt only for Banana game

    $insertStmt = $conn->prepare("INSERT INTO scores 
        (user_id, multiplication_score, banana_score, total_score, attempts) 
        VALUES (?, ?, ?, ?, ?)"
    );
    if (!$insertStmt) die("Prepare failed: " . $conn->error);
    $insertStmt->bind_param("iiiii", $user_id, $multiplicationScore, $bananaScore, $totalScore, $attempts);
    if ($insertStmt->execute()) {
        echo "Score inserted successfully";
    } else {
        die("Execute failed: " . $insertStmt->error);
    }
    $insertStmt->close();
}

$checkStmt->close();
$conn->close();
?>