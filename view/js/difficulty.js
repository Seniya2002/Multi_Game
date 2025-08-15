// Floating icons initialization
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

// Difficulty selection logic
let selectedDifficulty = '';
const difficultyButtons = document.querySelectorAll('.difficulty-btn');
const startBtn = document.querySelector('.start-game-btn');

difficultyButtons.forEach(button => {
    button.addEventListener('click', () => {
        difficultyButtons.forEach(btn => btn.classList.remove('selected'));
        button.classList.add('selected');
        selectedDifficulty = button.textContent.toLowerCase();
    });
});

startBtn.addEventListener('click', () => {
    if (selectedDifficulty) {
        let time = 60; // Default for Easy
        if (selectedDifficulty === 'medium') time = 45;
        if (selectedDifficulty === 'high') time = 30;

        window.location.href = `loadgame.php?difficulty=${selectedDifficulty}&time=${time}`;
    } else {
        alert('Please select a difficulty level!');
    }
});