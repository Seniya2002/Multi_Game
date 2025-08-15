// Create floating icons
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



