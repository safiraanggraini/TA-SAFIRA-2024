<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="images/logo.png" style="max-width: 100px;" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/#" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a href="/#tentang" class="nav-link">Tentang Kami</a></li>
                <li class="nav-item"><a href="/#paket" class="nav-link">Paket Wisata</a></li>
                <li class="nav-item"><a href="/booking" class="nav-link">Booking</a></li>
                @if (session('token'))
                    <li class="nav-item"><a href="/logout" class="nav-link login btn btn-primary" id="loggedInContent"
                            style="padding: 0.75rem 15px !important; margin: 0.75rem 5px !important;">Logout</a></li>
                @else
                    <li class="nav-item"><a href="/login" class="nav-link login btn btn-primary" id="loggedoutContent"
                            style="padding: 0.75rem 15px !important; margin: 0.75rem 5px !important;">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
