<li class="nav-item">
    <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" aria-current="page"
        href="{{ route('dashboard') }}">Dasboard</a>
</li>
@if (Auth::check())
    <li class="nav-item">
        <a class="nav-link {{ Route::is('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">Livros</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('authors.*') ? 'active' : '' }}" href="{{ route('authors.index') }}">Autores</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('subjects.*') ? 'active' : '' }}"
            href="{{ route('subjects.index') }}">Assuntos</a>
    </li>
@endif
