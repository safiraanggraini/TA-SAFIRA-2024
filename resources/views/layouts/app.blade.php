<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('layouts.additional.style')

    @stack('css')
</head>

<body>


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
                    @auth
                    <li class="nav-item"><a href="/logout" class="nav-link login btn btn-primary"
                        style="padding: 0.75rem 15px !important; margin: 0.75rem 5px !important;">Logout</a></li>
                    @else
                    <li class="nav-item"><a href="/login" class="nav-link login btn btn-primary"
                        style="padding: 0.75rem 15px !important; margin: 0.75rem 5px !important;">Login</a></li>
                    @endauth                 
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    @yield('content')

    @include('layouts.footer')



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

    @include('layouts.additional.script')
    @stack('js')

    <script>
        function handleLoginStatus() {
            const authToken = localStorage.getItem('token');
            const loggedInContent = document.getElementById('loggedInContent');
            const loggedOutContent = document.getElementById('loggedOutContent');
            console.log(authToken);

            if (authToken) {
                loggedInContent.style.display = 'block';
                loggedOutContent.style.display = 'none';
            } else {
                loggedInContent.style.display = 'none';
                loggedOutContent.style.display = 'block';
            }
        }


        document.addEventListener('DOMContentLoaded', function() {
            handleLoginStatus();
        });
    </script>
</body>

</html>
