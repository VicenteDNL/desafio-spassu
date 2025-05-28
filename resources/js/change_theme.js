const button = document.getElementById('toggle-theme');
const iconLight = document.getElementById('icon-light');
const iconDark = document.getElementById('icon-dark');
const body = document.body;

function updateIcons() {
    const theme = body.getAttribute('data-bs-theme');
    if (theme === 'light') {
        iconLight.classList.remove('d-none');
        iconDark.classList.add('d-none');
    } else {
        iconLight.classList.add('d-none');
        iconDark.classList.remove('d-none');
    }
}

button.addEventListener('click', () => {
    const currentTheme = body.getAttribute('data-bs-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    body.setAttribute('data-bs-theme', newTheme);
    updateIcons();
});
updateIcons();