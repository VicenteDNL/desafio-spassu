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
        <ul class="nav nav-underline justify-content-end">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" aria-current="page"
                    href="{{ route('dashboard') }}">Dasboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('books.*') ? 'active' : '' }}"
                    href="{{ route('books.index') }}">Livros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('authors.*') ? 'active' : '' }}"
                    href="{{ route('authors.index') }}">Autores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('subjects.*') ? 'active' : '' }}"
                    href="{{ route('subjects.index') }}">Assuntos</a>
            </li>
            <li class="nav-item">
                <button id="toggle-theme" class="btn btn-primary">
                    <i class="fa-solid fa-moon" id="icon-dark"></i>
                    <i class="fa-solid fa-sun" id="icon-light"></i>
                </button>
            </li>
        </ul>
        @yield('layout')
        @extends('layout.components.toast')
    </div>
</body>

</html>
