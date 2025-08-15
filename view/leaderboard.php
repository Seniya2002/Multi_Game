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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Leaderboard - Multiplication Kingdom</title>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
<div class="floating-icons" id="icons-container"></div>

    <div class="container">
        <h1>🏆 Top Scorers</h1>
        <div class="leaderboard">
            <table class="score-table">
                <thead>
                    <tr>
                        <th class="rank">Rank</th>
                        <th>Player</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody id="scores">
                    <!-- Scores will be populated dynamically -->
                </tbody>
            </table>
        </div>

        <button class="home-btn" onclick="window.location.href='index.php'">Back to Home</button>
    </div>


    <style>
        .gold { color: #ffd700; }
        .silver { color: #c0c0c0; }
        .bronze { color: #cd7f32; }

        .container {
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        .score-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .score-table th, .score-table td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            text-align: center;
            color: #fff;
        }

        .home-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .home-btn:hover {
            background-color: #45a049;
        }
    </style>
     <script src="js/leaderboard.js"></script>
</body>
</html>
