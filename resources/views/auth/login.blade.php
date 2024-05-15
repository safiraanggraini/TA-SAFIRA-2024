@extends('layouts.auth.app')

@section('title', __('Curug Pletuk - Login'))

@section('content')
    <!-- Section: Design Block -->
    <main class="d-flex align-items-center min-vh-100 py-5 mt-5 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{ asset('images/IMG_20240418_111944.jpg') }}" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{ asset('images/logo-curug.png') }}" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Login</p>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{ session('success') }}
                                </div>
                            @endif

                            @if (session('failed'))
                                @if (is_array(session('failed')))
                                    @foreach (session('failed') as $error)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error!</strong> {{ $error }}
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> {{ session('failed') }}
                                    </div>
                                @endif
                            @endif

                            <form id="loginForm">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="***********">
                                </div>
                                <button class="btn btn-block login-btn mb-4" type="button"
                                    onclick="handleLogin()">Login</button>
                            </form>

                            <a href="#!" class="forgot-password-link">Forgot password?</a>
                            <p class="login-card-footer-text">Don't have an account? <a href="/register"
                                    class="text-reset">Register here</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="/">Kembali ke Beranda</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        function handleLogin() {
            var email = $("#email").val();
            var password = $("#password").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var formData = {
                email: email,
                password: password,
            };

            $.ajax({
                type: "POST",

                url: "{{ route('auth.login.process') }}",
                // url: "https://curug-pletuk.fly.dev/auth/login",

                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Add CSRF token to headers
                    'Authorization': 'Bearer ' + localStorage.getItem('token') // Add token to headers
                },
                contentType: 'application/json',
                data: JSON.stringify(formData),
                success: function(response) {
                    // console.log('Login berhasil', response);

                    // Menyimpan token di localStorage dengan waktu kadaluwarsa 30 menit
                    var expirationTime = new Date();
                    expirationTime.setMinutes(expirationTime.getMinutes() + 30); // Tambahkan 30 menit

                    var token = response.data.token;
                    var userData = response.data.user;

                    // Store user data in session or local storage
                    localStorage.setItem('userData', JSON.stringify(userData));
                    localStorage.setItem('token', token);
                    localStorage.setItem('tokenExpiration', expirationTime
                        .getTime()); // Simpan waktu kadaluwarsa

                    // Redirect ke halaman tertentu setelah berhasil login
                    // window.location.href = "{{ route('admin.dashboard') }}";
                    if (userData.role.toLowerCase() == 'admin') {
                        window.location.href = "{{ route('admin.dashboard') }}";
                    } else {
                        window.location.href = "{{ route('home.index') }}";
                    }

                    // Set timeout untuk memeriksa dan hapus token setelah 30 menit
                    setTimeout(function() {
                        if (isTokenExpired()) {
                            // Token telah kadaluwarsa, hapus dari localStorage dan cookies
                            localStorage.removeItem('token');
                            localStorage.removeItem('tokenExpiration');
                        }
                    }, 30 * 60 * 1000); // Setelah 30 menit
                },
                error: function(error) {
                    console.log('Login gagal', error);
                }
            });

            function isTokenExpired() {
                var expirationTime = localStorage.getItem('tokenExpiration');
                if (!expirationTime) {
                    return true; // Token tidak ada atau waktu kadaluwarsa tidak diset
                }

                // Bandingkan waktu saat ini dengan waktu kadaluwarsa
                return new Date().getTime() > parseInt(expirationTime, 10);
            }

            function getTokenFromLocalStorage() {
                return localStorage.getItem('token');
            }
        }
    </script>
@endpush
