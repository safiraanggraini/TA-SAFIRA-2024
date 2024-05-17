@extends('layouts.app')

@section('title', __('Curug Pletuk'))

@section('content')
    <div class="hero-wrap" style="background-image: url('images/IMG_20231008_110018.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact
                                Us</span></p>
                        <h1 class="mb-4 bread">Booking</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="client_section layout_padding-bottom mt-5" id="loggedInContent">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h3 class="font-weight-bold">
                    Booking
                </h3>
            </div>
            <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">
                <p class="blue-text">Booking Wisata Curug Pletuk, nikmati wisata </p>
                <form id="bookingForm" class="form-card" method="POST" action="{{ route('booking.store') }}">
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
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Nama<span class="text-danger"> *</span></label>
                            <input type="text" id="nama_pemilik"class="form-control" name="nama_pemilik"
                                placeholder="Atur nama pada pengaturan profil!" value="{{ $userData['name'] }}" readonly>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">No Handphone<span class="text-danger"> *</span></label>
                            <input type="number" id="no_telfon" class="form-control" name="no_telfon"
                                placeholder="Atur nomor handphone!" value="{{ $userData['phone_number'] }}" readonly>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Alamat<span class="text-danger"> *</span></label>
                            <input type="text" id="alamat" class="form-control" name="alamat"
                                placeholder="Atur alamat pada pengaturan profil!" value="{{ $userData['address'] }}"
                                readonly>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Pilih Paket wisata<span class="text-danger">
                                    *</span></label>
                            <select id="paket_wisata" name="paket_wisata" class="form-control" required>
                                <option value="" data-price="0">Pilih Paket</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product['id'] }}" data-price="{{ $product['price'] }}">
                                        {{ $product['package_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Tanggal Booking<span class="text-danger">
                                    *</span></label>
                            <input type="date" id="check_in" class="form-control" name="check_in"
                                placeholder="Masukan Tanggal" required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Jumlah<span class="text-danger"> *</span></label>
                            <input type="number" id="jumlah" class="form-control" name="jumlah"
                                placeholder="Masukan Jumlah Paket" required>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <p class="text-right text-primary">Total Pembayaran <span id="totalAmount"
                                class="ml-4 text-harga">Rp 0</span></p>
                    </div>
                    <div class="row justify-content-end mt-4">
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-primary btn-submit">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paketSelect = document.getElementById('paket_wisata');
            const jumlahInput = document.getElementById('jumlah');
            const totalAmount = document.getElementById('totalAmount');

            function calculateTotal() {
                const selectedOption = paketSelect.options[paketSelect.selectedIndex];
                const price = parseInt(selectedOption.getAttribute('data-price')) || 0;
                const jumlah = parseInt(jumlahInput.value) || 0;
                const total = price * jumlah;
                totalAmount.textContent = 'Rp ' + total.toLocaleString('id-ID');
            }

            paketSelect.addEventListener('change', calculateTotal);
            jumlahInput.addEventListener('input', calculateTotal);
        });
    </script>
@endsection


@push('css')
    <style>
        .btn-submit {
            width: 100%
        }
    </style>
@endpush
