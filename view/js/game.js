class MultiplicationGame {
    constructor() {
        this.currentRound = 1;
        this.totalRounds = 3;
        this.score = 0;
        this.currentTarget = 0;
        this.timerInterval = null;
        this.selectedNumbers = [];
        this.correctFactors = [];

        // Get difficulty and time from URL
        const params = new URLSearchParams(window.location.search);
        this.timeLeft = parseInt(params.get('time')) || 60;

        this.roundDisplay = document.getElementById('round');
        this.timeDisplay = document.getElementById('time');
        this.scoreDisplay = document.getElementById('score');
        this.targetDisplay = document.getElementById('target-number');
        this.numbersTable = document.getElementById('numbers-table');
        this.feedback = document.getElementById('result-feedback');

        this.setupEventListeners();
        this.startNewRound();
    }

    startNewRound() {
        if (this.currentRound > this.totalRounds) {
            this.endGame();
            return;
        }

        this.generateNewTarget();
        this.selectedNumbers = [];
        this.feedback.textContent = '';
        this.generateNumberTable();
        this.startTimer();

        this.roundDisplay.textContent = `${this.currentRound}/${this.totalRounds}`;
    }

    generateNewTarget() {
        const factor1 = Math.floor(Math.random() * 11) + 2;
        const factor2 = Math.floor(Math.random() * 11) + 2;
        this.currentTarget = factor1 * factor2;
        this.correctFactors = [factor1, factor2];
        this.targetDisplay.textContent = this.currentTarget;
    }

    generateNumberTable() {
        this.numbersTable.innerHTML = '';
        const numbers = new Set(this.correctFactors);

        // Fill remaining slots with random numbers (1-144)
        while (numbers.size < 36) {
            numbers.add(Math.floor(Math.random() * 144) + 1);
        }

        const numbersArray = Array.from(numbers).sort(() => Math.random() - 0.5);

        numbersArray.forEach(num => {
            const cell = document.createElement('div');
            cell.className = 'number-cell';
            cell.textContent = num;
            cell.dataset.value = num;
            this.numbersTable.appendChild(cell);
        });
    }

    checkAnswer(selectedNumbers) {
        const [num1, num2] = selectedNumbers;
        const product = num1 * num2;

        if (product === this.currentTarget) {
            this.score += 10;
            this.scoreDisplay.textContent = this.score;
            this.showFeedback('Correct! Well done!', '#2ecc71');
            this.handleCorrectAnswer();
        } else {
            this.showFeedback(`Incorrect. ${num1} × ${num2} = ${product}`, '#e74c3c');
            this.selectedNumbers = [];
            this.clearSelections();
        }
    }

    handleCorrectAnswer() {
        clearInterval(this.timerInterval);
        this.selectedNumbers = [];

        if (this.currentRound === this.totalRounds) {
            setTimeout(() => this.endGame(), 1000);
        } else {
            this.currentRound++;
            setTimeout(() => this.startNewRound(), 1000);
        }
    }

    showFeedback(message, color) {
        this.feedback.textContent = message;
        this.feedback.style.color = color;
    }

    clearSelections() {
        document.querySelectorAll('.number-cell').forEach(cell => {
            cell.classList.remove('selected');
        });
    }

    startTimer() {
        clearInterval(this.timerInterval);
        this.timeDisplay.textContent = `${this.timeLeft}s`;

        this.timerInterval = setInterval(() => {
            this.timeLeft--;
            this.timeDisplay.textContent = `${this.timeLeft}s`;

            if (this.timeLeft <= 0) {
                this.endGame();
            }
        }, 1000);
    }

    endGame() {
        clearInterval(this.timerInterval);
        alert(`Game over! Your multiplication score is ${this.score}`);
    
        // Save multiplication score
        const formData = new FormData();
        formData.append('multiplicationScore', this.score);  // Send multiplication score
        formData.append('bananaScore', 0);  // Placeholder, will be updated in banana game
    
        fetch('../view/saveScore.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("Multiplication Score Saved:", data);
            window.location.href = 'banana.php'; // Redirect to Banana game
        })
        .catch(error => console.error('Error:', error));
    }
    
    
    resetGame() {
        this.currentRound = 1;
        this.score = 0;
        const params = new URLSearchParams(window.location.search);
        this.timeLeft = parseInt(params.get('time')) || 60;
        this.startNewRound();
    }

    setupEventListeners() {
        this.numbersTable.addEventListener('click', (e) => {
            const cell = e.target.closest('.number-cell');
            if (cell && this.timeLeft > 0) {
                const num = parseInt(cell.dataset.value);
                if (!this.selectedNumbers.includes(num)) {
                    this.selectedNumbers.push(num);
                    cell.classList.add('selected');

                    if (this.selectedNumbers.length === 2) {
                        this.checkAnswer(this.selectedNumbers);
                    }
                }
            }
        });

        document.getElementById('retryBtn').addEventListener('click', () => {
            this.resetGame();
        });

        document.getElementById('quitBtn').addEventListener('click', () => {
            if (confirm('Quit the game?')) {
                window.location.href = 'banana.php';
            }
        });
    }
}

// Floating icons initialization remains the same
const icons = ['×', '÷', '=', '📐', '🧮', '🔢', '😊', '🌟'];
const container = document.getElementById('icons-container');

for (let i = 0; i < 20; i++) {
    const icon = document.createElement('div');
    icon.className = 'icon';
    icon.textContent = icons[Math.floor(Math.random() * icons.length)];
    icon.style.left = Math.random() * 100 + '%';
    icon.style.top = Math.random() * 100 + '%';
    icon.style.animationDelay = Math.random() * 5 + 's';
    container.appendChild(icon);
}

// Start the game
const game = new MultiplicationGame();

function saveScore(playerName, score) {
    const formData = new FormData();
    formData.append('playerName', playerName);
    formData.append('score', score);

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