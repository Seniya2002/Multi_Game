function endGame() {
    clearInterval(this.timerInterval);

    // ✅ Store multiplication score in session storage
    sessionStorage.setItem('multiplicationScore', this.score);

    const playerName = prompt("Enter your username:");
    if (playerName) {
        // ✅ Save the multiplication score (banana score = 0 for now)
        saveScore(playerName, this.score, 0);
    }

    window.location.href = '../view/banana.php';
}

function saveScore(playerName, multiplicationScore, bananaScore) {
    const formData = new FormData();
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
