<nav class="navbar navbar-expand-md justify-content-end">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navDefault"
            aria-controls="navDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navDefault">
            <ul class="navbar-nav  ms-auto">
                @include('layout.components.nav_item')
                <li class="nav-item">
                    @include('layout.components.button_theme')
                </li>
                <li class="nav-item">
                    <div class="ms-2">
                        @include('layout.components.button_user')
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
