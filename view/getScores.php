<?php
session_start();
include '../model/connect.php';

$sql = "
    SELECT u.username, s.total_score 
    FROM scores s
    JOIN users u ON s.user_id = u.id
    ORDER BY s.total_score DESC
    LIMIT 9
";

$result = $conn->query($sql);

$scores = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $scores[] = $row;
    }
}

echo json_encode($scores);
$conn->close();
?>

