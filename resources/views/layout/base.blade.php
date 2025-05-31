<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - {{ $title ?? '*' }}</title>

    @vite(['resources/sass/bootstrap_themes/default.scss', 'resources/js/app.js'])
</head>

<body data-bs-theme="dark" style="height: 100vh;">
    <div class="container-md pt-2 h-100">
        <div class="d-flex flex-column h-100">
            <div>
                @include('layout.components.header')
            </div>
            <div>
                @yield('layout')
            </div>
            <div class="d-flex h-100 align-items-end justify-content-center">
                @include('layout.components.footer')
            </div>
        </div>
        @extends('layout.components.toast')
    </div>
</body>

</html>
