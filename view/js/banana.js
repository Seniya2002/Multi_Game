let currentSolution = null;
let totalScore = 0;
let attemptsLeft = 3;

// Fetch new problem from API
async function fetchProblem() {
    if (attemptsLeft > 0) {
        try {
            const response = await fetch('https://marcconrad.com/uob/banana/api.php');
            const data = await response.json();

            document.getElementById('banana-image').src = data.question;
            currentSolution = data.solution;

            // Reset input and result
            document.getElementById('result').textContent = '';
            document.getElementById('user-answer').value = '';
        } catch (error) {
            console.error('Error fetching problem:', error);
            alert('Failed to load problem. Please try again.');
        }
    } else {
        endGame();
    }
}

// Check user's answer
function checkAnswer() {
    const userAnswer = parseInt(document.getElementById('user-answer').value);
    const resultDiv = document.getElementById('result');

    if (userAnswer === currentSolution) {
        totalScore += 10;
        resultDiv.textContent = "Correct! 🎉";
        resultDiv.className = "result correct";
    } else {
        resultDiv.textContent = `Incorrect 😞 The correct answer was ${currentSolution}`;
        resultDiv.className = "result incorrect";
    }

    attemptsLeft--;

    if (attemptsLeft <= 0) {
        endGame();
    }
}

// Generate new problem
function newProblem() {
    if (attemptsLeft > 0) {
        fetchProblem();
    } else {
        endGame();
    }
}

// End game after 3 attempts
function endGame() {
    document.getElementById('final-score').textContent = `Your final score: ${totalScore}`;
    document.getElementById('popup').style.display = 'flex';
}

// Close popup and reset game
function closePopup() {
    document.getElementById('popup').style.display = 'none';

    // Get multiplication score from session storage
    const multiplicationScore = sessionStorage.getItem('multiplicationScore') || 0;
    
    // Assuming player name is stored in the session (replace with actual session data)
    const playerName = "<?php echo $_SESSION['user_id']; ?>";

    if (playerName) {
        saveScore(playerName, totalScore, multiplicationScore);
    }
}

// Save score to database using PHP
function saveScore(playerName, bananaScore, multiplicationScore) {
    const formData = new FormData();
    formData.append('playerName', playerName);
    formData.append('multiplicationScore', multiplicationScore);
    formData.append('bananaScore', bananaScore);

    fetch('../view/saveScore.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        window.location.href = '../view/leaderboard.php';
    })
    .catch(error => console.error('Error:', error));
}

// Initial load
fetchProblem();
