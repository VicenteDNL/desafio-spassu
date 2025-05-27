<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - {{ $title ?? '*' }}</title>

    @vite(['resources/sass/bootstrap_themes/default.scss', 'resources/js/app.js'])
</head>

<body data-bs-theme="dark">
    <div class="container pt-2">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dasboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('books.index') }}">Livros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('authors.index') }}">Autores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('subjects.index') }}">Assuntos</a>
            </li>
            <li class="nav-item">
                <button id="toggle-theme" class="btn btn-primary">
                    <i class="fa-solid fa-moon" id="icon-dark"></i>
                    <i class="fa-solid fa-sun" id="icon-light"></i>
                </button>
            </li>
        </ul>

        @yield('layout')
    </div>
</body>
<script>
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
</script>

</html>
