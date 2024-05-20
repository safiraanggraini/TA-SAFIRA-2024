<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="images/logo.png" style="max-width: 100px;" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') || Request::is('/#') ? 'active' : '' }}"><a href="/#" class="nav-link">Beranda</a></li>
                <li class="nav-item {{ Request::is('/#tentang') ? 'active' : '' }}"><a href="/#tentang" class="nav-link">Tentang Kami</a></li>
                <li class="nav-item {{ Request::is('/#paket') ? 'active' : '' }}" ><a href="/#paket" class="nav-link">Paket Wisata</a></li>
                <li class="nav-item {{ $title == 'Booking' ? 'active' : '' }}"><a href="/booking" class="nav-link">Booking</a></li>
                @if (Cookie::has('token'))
                    @php
                        $userData = json_decode(Cookie::get('user_data'));
                        $userName = explode(' ', $userData->name)[0];
                    @endphp

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle btn btn-primary" data-bs-toggle="dropdown"
                            style="padding: 0.75rem 15px !important; margin: 0.75rem 5px !important; border-radius: 5px !important;">{{ $userName }}</a>
                        <div class="dropdown-menu fade-down m-0">
                            <a href="{{ route('profile.index') }}" class="dropdown-item">User Profile</a>
                            <a href="/logout" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                @else
                    <li class="nav-item"><a href="/login" class="nav-link login btn btn-primary"
                            style="padding: 0.75rem 15px !important; margin: 0.75rem 5px !important;  border-radius: 5px !important;">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>