<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interfaces</div>
                <a class="nav-link @if (Route::is('products.*')) active @endif"
                    href="{{ route('products.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                    Products
                </a>
            </div>
        </div>
    </nav>
</div>
