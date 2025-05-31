const button = document.querySelectorAll('[data-toggle-theme]');
const iconLight = document.getElementById('icon-light');
const iconDark = document.getElementById('icon-dark');
const body = document.body;

function updateIcons() {
    const theme = localStorage.getItem('theme')
    body.setAttribute('data-bs-theme', theme);
    if (theme === 'light') {
        iconLight.classList.remove('d-none');
        iconDark.classList.add('d-none');
    } else {
        iconLight.classList.add('d-none');
        iconDark.classList.remove('d-none');
    }
}

button.forEach((e) => {
    e.addEventListener('click', () => {
        const currentTheme = body.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        localStorage.setItem('theme', newTheme)
        updateIcons();
    });
})
updateIcons();