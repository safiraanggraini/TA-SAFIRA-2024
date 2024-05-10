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
                <img src="assets/images/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Login</p>
              <form action="#!">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="/register" class="text-reset">Register here</a></p>
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
