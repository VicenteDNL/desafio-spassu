<nav class="navbar bg-secondary fixed-top">
    <div class="container-fluid">

        <button class="btn text-emphasis btn-secondary" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav  ms-auto">
                    @include('layout.components.nav_item')
                </ul>
            </div>
        </div>
        <div>
            @include('layout.components.button_user')
            @include('layout.components.button_theme')
        </div>

    </div>
