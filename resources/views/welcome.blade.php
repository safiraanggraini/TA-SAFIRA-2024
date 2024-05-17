@extends('layouts.app')

@section('title', __('Curug Pletuk - Profile'))

@include('layouts.additional.Profilestyle')

@section('content')
    <section id="my-profile" class="">
        <div class="container-fluid">
            <div class="container justify-content-center" style="margin-top: 100px; margin-bottom: 100px">
                <div class="profile-container gap-4">
                    <div class="user-tabs">
                        <div class="card" style="width: 14rem;">
                            <div class="card-header text-center bg-main">
                                <img class="rounded-circle pt-2" style="width:100px"
                                    src="{{ $userData['avatar']['image_url'] ?? asset('assets/png/defaultpp.jpeg') }}">
                                <h6 class="pt-2">{{ $userData['name'] ?? 'N/A' }}</h6>
                                <span>{{ $userData['email'] ?? 'N/A' }}</span>
                            </div>
                            <div class="nav flex-column nav-pills p-2 " id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link text-start active" id="v-pills-edit-profile-tab"
                                    data-bs-toggle="pill" data-bs-target="#v-pills-edit-profile" type="button"
                                    role="tab" aria-controls="v-pills-edit-profile" aria-selected="false"><i
                                        class="bi bi-pencil-square"></i> Edit Profil</button></button>
                                <button class="text-start nav-link " id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-archive"></i>
                                    Riwayat Pesanan</button>
                                <button class="nav-link text-start" id="v-pills-change-password-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-change-password" type="button" role="tab"
                                    aria-controls="v-pills-change-password" aria-selected="false"><i
                                        class="ri-lock-2-line"></i>
                                    Ganti Kata Sandi</button></button>
                                <a href="/logout" class="nav-link text-start"><i class="ri-logout-circle-line pr-2"></i>
                                    Keluar</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content konten-tabs" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-edit-profile" role="tabpanel"
                            aria-labelledby="v-pills-edit-profile-tab">
                            <div class="card">
                                <div class="card-header text-center bg-main">Edit Profil
                                </div>
                                <div class="card-body text-center">
                                    <div class="container">
                                        <form class="text-start text-main py-3"
                                            action="{{ route('profile.update', $userData['id'] ?? 0) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="mb-3">
                                                <label for="#image" class="form-label">Ganti Foto Profil</label>
                                                <input type="file" class="form-control" id="image" name="image"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    required value="{{ old('name', $userData['name'] ?? '') }}"
                                                    placeholder="Masukkan nama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="{{ old('address', $userData['address'] ?? '') }}"
                                                    placeholder="Masukkan alamat" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    readonly value="{{ $userData['email'] ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone_number" class="form-label">Nomor Handphone</label>
                                                <input type="tel" class="form-control" id="phone_number"
                                                    name="phone_number"
                                                    value="{{ old('phone_number', $userData['phone_number'] ?? '') }}"
                                                    placeholder="Masukkan nomor handphone" required>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-primary mx-auto button-user"
                                                    type="submit">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- End Card with header and footer -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="card">
                                <div class="card-header text-center bg-main">Riwayat Pesanan</div>
                                <div class="card-body text-center">
                                    <img class="rounded-circle pt-2" style="width:100px"
                                        src="{{ asset('assets/png/defaultpp.jpeg') }}">

                                    <div class="text-start pt-3 bio">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>: </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>: </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>:</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>: </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Nomor Handphone</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>: </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Tempat Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>:</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Agama</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>:</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-7">
                                                <p>:</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-main"> &nbsp
                                </div>
                            </div><!-- End Card with header and footer -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-change-password" role="tabpanel"
                            aria-labelledby="v-pills-change-password-tab">
                            <div class="card">
                                <div class="card-header text-center bg-main">Ganti Password
                                </div>
                                <div class="card-body text-center">
                                    <form action="" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="">
                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password
                                                Baru</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Ulangi
                                                Password Baru</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword_confirmation" type="password"
                                                    class="form-control" id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" style="width: 250px" class="btn btn-primary">Ubah
                                                Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End Card with header and footer -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@include('layouts.additional.Profilescript')
