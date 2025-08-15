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

async function fetchScores() {
    const response = await fetch('getScores.php');
    const scores = await response.json();

    const tbody = document.getElementById('scores');
    tbody.innerHTML = '';

    scores.forEach((player, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${index + 1}</td>
            <td>${player.username}</td>
            <td>${player.total_score}</td>
        `;
        tbody.appendChild(row);
    });
}

window.onload = fetchScores;