@extends('layouts.app')

@section('title', __('Curug Pletuk - Profile'))

@include('layouts.additional.css')

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
                                            @method('PUT')
                                            @csrf
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                @if (is_array(session('error')))
                                                    <div class="alert alert-danger">
                                                        @foreach (session('error') as $errorMessage)
                                                            <p>{{ $errorMessage }}</p>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="alert alert-danger">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif
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
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    required value="{{ old('name', $userData['name'] ?? '') }}"
                                                    placeholder="Masukkan nama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="{{ old('address', $userData['address'] ?? '') }}"
                                                    placeholder="Masukkan alamat">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    readonly value="{{ $userData['email'] ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone_number" class="form-label">Nomor Handphone</label>
                                                <input type="number" class="form-control" id="phone_number"
                                                    name="phone_number"
                                                    value="{{ old('phone_number', $userData['phone_number'] ?? '') }}"
                                                    placeholder="Masukkan nomor handphone">
                                            </div>
                                            <div class="mb-3">
                                                <label for="#image" class="form-label">Ganti Foto Profil</label>
                                                <input type="file" name="image" id="image" class="form-control input-lg" tabindex="6">
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-primary mx-auto" type="submit">Simpan</button>
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
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Paket</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Total Pembayaran</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Status Booking</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userOrder as $index => $order)
                                                    <tr>
                                                        <th scope="row">{{ $index + 1 }}</th>
                                                        <td>{{ $order['package_name'] }}</td>
                                                        <td>{{ $order['amount'] }}</td>
                                                        <td>Rp {{ number_format($order['total_payment'], 0, ',', '.') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($order['set_date'])->format('d M Y') }}
                                                        </td>
                                                        <td>
                                                            @if ($order['is_checked'])
                                                                <span class="badge badge-success">Confirmed</span>
                                                            @else
                                                                <span class="badge badge-warning">Belum Check In</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

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
                                    <form id="changePasswordForm"
                                        action="{{ route('profile.changePassword', ['id' => $userData['id']]) }}"
                                        method="POST">
                                        @method('PUT')
                                        @csrf
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('error'))
                                            @if (is_array(session('error')))
                                                <div class="alert alert-danger">
                                                    @foreach (session('error') as $errorMessage)
                                                        <p>{{ $errorMessage }}</p>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
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

                                        <div class="row mb-3">
                                            <label for="current_password"
                                                class="col-md-4 col-lg-3 col-form-label">Password lama</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password" class="form-control"
                                                    id="current_password" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-lg-3 col-form-label">Password
                                                Baru</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="password" required>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" style="width: 100%" class="btn btn-primary mx-auto">Ubah
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

@include('layouts.additional.js')
