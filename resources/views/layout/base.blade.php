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
            @if (Auth::check())
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
            @endif
            <li class="nav-item">
                <button id="toggle-theme" class="btn btn-primary text-light">
                    <i class="fa-solid fa-moon" id="icon-dark"></i>
                    <i class="fa-solid fa-sun" id="icon-light"></i>
                </button>
            </li>
            <li>
                <div class="">
                    <a class="btn text-emphasis btn-secondary" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-3 mx-3">
                        <div class="d-flex flex-column align-items-center mb-3">
                            <div class="es-avatar-circle">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex flex-column align-items-center text-body-secondary">
                                <small>
                                    <span
                                        class="lh-0">{{ Auth::check() ? auth()->user()->name : '(Visitante)' }}</span>
                                </small>
                                <small>
                                    <small>
                                        <span
                                            class="lh-0">{{ Auth::check() ? auth()->user()->email : 'Entrou ou Registra-se' }}</span>
                                    </small>
                                </small>
                            </div>
                        </div>
                        <div class="text-secondary">
                            <hr>
                        </div>
                        @if (Auth::check())
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <div class="d-grid gap-1 mx-2">
                                    <button class="btn  btn-primary text-light btn-sm" type="submit">
                                        <i class="fa-solid fa-right-from-bracket me-1"></i>
                                        Sair
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="d-flex flex-column">
                                <a class="btn  btn-primary text-light btn-sm" href="{{ route('login') }}">
                                    <i class="fa-solid fa-right-from-bracket me-1"></i>
                                    Entrar
                                </a>
                                <a class="btn  btn-secondary text-light btn-sm mt-2"
                                    href="{{ route('register.create') }}">
                                    <i class="fa-solid fa-right-from-bracket me-1"></i>
                                    Registra-se
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </li>
        </ul>
        @yield('layout')
        @extends('layout.components.toast')
    </div>
</body>

</html>
