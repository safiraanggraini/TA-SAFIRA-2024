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

                            <form id="loginForm">
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

                                <div id="loginErrorAlert" class="alert alert-danger alert-dismissible fade show"
                                    role="alert" style="display: none;">
                                    <strong>Error!</strong> <span id="loginErrorMessage"></span>
                                </div>
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

                            <a href="#!" class="forgot-password-link">Lupa Password?</a>
                            <p class="login-card-footer-text">Belum Punya Akun? <a href="/register"
                                    class="text-reset">Buat Akun</a></p>
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
        function handleLogin() { // Mendefinisikan fungsi handleLogin untuk menangani proses login
            var email = $("#email").val(); // Mengambil nilai email dari input dengan id 'email'
            var password = $("#password").val(); // Mengambil nilai password dari input dengan id 'password'
            var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Mengambil nilai CSRF token dari meta tag
            
            var formData = {
                email: email,
                password: password,
            }; // Membuat objek formData yang berisi email dan password
            
            $.ajax({ 
                type: "POST", // Menentukan metode HTTP yang digunakan adalah POST
                url: "{{ route('auth.login.process') }}", // URL tujuan dari request POST
                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Menambahkan header CSRF token
                    'Authorization': 'Bearer ' + localStorage.getItem('token') // Menambahkan header Authorization dengan token dari localStorage
                },
                contentType: 'application/json', // Menentukan tipe konten yang dikirim adalah JSON
                data: JSON.stringify(formData), // Mengubah objek formData menjadi string JSON
                success: function(response) { // Fungsi yang dijalankan saat request berhasil
                    var expirationTime = new Date(); // Membuat objek Date untuk menentukan waktu kedaluwarsa token
                    expirationTime.setMinutes(expirationTime.getMinutes() + 30); // Menambahkan 30 menit ke waktu saat ini
                    
                    var token = response.data.token; // Mengambil token dari response
                    var userData = response.data.user; // Mengambil data pengguna dari response

                    localStorage.setItem('userData', JSON.stringify(userData)); // Menyimpan data pengguna di localStorage
                    localStorage.setItem('token', token); // Menyimpan token di localStorage
                    localStorage.setItem('tokenExpiration', expirationTime.getTime()); // Menyimpan waktu kedaluwarsa token di localStorage

                    if (userData.role.toLowerCase() == 'admin') { // Mengecek apakah peran pengguna adalah Admin
                        window.location.href = "{{ route('dashboard.index') }}"; // Mengarahkan pengguna Admin ke halaman dashboard
                    } else {
                        window.location.href = "{{ route('profile.index') }}"; // Mengarahkan pengguna non-Admin ke halaman profil
                    }

                    setTimeout(function() {
                        if (isTokenExpired()) { // Mengecek apakah token sudah kedaluwarsa
                            localStorage.removeItem('token'); // Menghapus token dari localStorage
                            localStorage.removeItem('tokenExpiration'); // Menghapus waktu kedaluwarsa token dari localStorage
                        }
                    }, 30 * 60 * 1000); // Menjalankan fungsi setelah 30 menit
                },
                error: function(error) { // Fungsi yang dijalankan saat request gagal
                    console.log('Login failed', error); // Menampilkan pesan kesalahan di konsol
                    if (error.responseJSON && error.responseJSON.message) { // Mengecek apakah response JSON memiliki pesan kesalahan
                        $('#loginErrorMessage').text(error.responseJSON.message); // Menampilkan pesan kesalahan di elemen dengan id 'loginErrorMessage'
                        $('#loginErrorAlert').show(); // Menampilkan elemen dengan id 'loginErrorAlert'
                    } else {
                        $('#loginErrorMessage').text('An unknown error occurred. Please try again.'); // Menampilkan pesan kesalahan umum
                        $('#loginErrorAlert').show(); // Menampilkan elemen dengan id 'loginErrorAlert'
                    }
                }
            });

            function isTokenExpired() { // Fungsi untuk mengecek apakah token sudah kedaluwarsa
                var expirationTime = localStorage.getItem('tokenExpiration'); // Mengambil waktu kedaluwarsa token dari localStorage
                if (!expirationTime) { // Mengecek apakah waktu kedaluwarsa tidak ada
                    return true; // Mengembalikan nilai true jika tidak ada waktu kedaluwarsa
                }
                return new Date().getTime() > parseInt(expirationTime, 10); // Mengembalikan nilai true jika waktu saat ini melebihi waktu kedaluwarsa
            }

            function getTokenFromLocalStorage() { // Fungsi untuk mengambil token dari localStorage
                return localStorage.getItem('token'); // Mengembalikan token dari localStorage
            }
        }
    </script>
@endpush  