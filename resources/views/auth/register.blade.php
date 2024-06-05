@extends('layouts.auth.app')

@section('title', __('Curug Pletuk - Login'))

@section('content')
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
                            <p class="login-card-description">Register</p>
                            <form action="{{ route('auth.register.process') }}" method="POST">
                                @csrf
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
                                <div class="form-group">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="name" name="name" id="name" class="form-control"
                                        placeholder="Full Name">
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
                                <input name="regsiter" id="regsiter" class="btn btn-block login-btn mb-4" type="submit"
                                    value="register">
                            </form>
                            <a href="#!" class="forgot-password-link">Lupa Password?</a>
                            <p class="login-card-footer-text">Sudah Punya Akun? <a href="{{ route('auth.login') }}"
                                    class="text-reset">Login Disini</a></p>
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
