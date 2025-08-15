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

// Toggle between login and registration forms
function toggleForms() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const switchText = document.getElementById('switchText');
    const switchLink = document.getElementById('switchLink');

    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'flex';
        registerForm.style.display = 'none';
        switchText.textContent = "Don't have an account? ";
        switchLink.textContent = "Register here";
    } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'flex';
        switchText.textContent = "Already have an account? ";
        switchLink.textContent = "Login here";
    }
}

// Form submission handling
document.getElementById('loginForm').addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Logging in...');
    // Add actual login logic here
});

document.getElementById('registerForm').addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Registering...');
    // Add actual registration logic here
});


