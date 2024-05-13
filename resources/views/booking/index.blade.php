@extends('layouts.app')

@section('title', __('Curug Pletuk'))


@section('content')
<div class="hero-wrap" style="background-image: url('images/IMG_20231008_110018.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
            <div class="text">
              <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact Us</span></p>
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
                <form class="form-card">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Nama<span class="text-danger"> *</span></label> <input
                                type="text" id="nama_pemilik" name="nama_pemilik"
                                placeholder="Atur nama pada pengaturan profil!"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">No
                                Handphone<span class="text-danger"> *</span></label> <input type="number"
                                id="no_telfon" name="no_telfon" placeholder="Atur nomor handphone!"
                                onblur="validate(2)">
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Alamat<span class="text-danger"> *</span></label>
                            <input type="text" id="alamat" name="alamat" placeholder="Atur alamat pada pengaturan profil!"
                                onblur="validate(3)">
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Pilih Paket wisata<span class="text-danger">
                                    *</span></label> <input type="text" id="ciri_khusus_hewan"
                                name="ciri_khusus_hewan" placeholder="" onblur="validate(4)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Tanggal Booking<span class="text-danger">
                                    *</span></label> <input type="date" id="check_in" name="check_in"
                                placeholder="Enter your first name" onblur="validate(1)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Jumlah<span class="text-danger">
                                    *</span></label> <input type="number" id="check_out" name="check_out"
                                placeholder="Enter your last name" onblur="validate(2)"> </div>
                    </div>
                    <div class="row text-left">
                        <div class="checkbox-wrapper-1 form-group col-sm-4 flex-column d-flex" id="catServiceOptions">
                            <!-- Options will be dynamically added here -->
                        </div>
                    </div>
                    <hr>
                    <div>
                        <p class="text-right">Total Pembayaran <span id="totalAmount" class="ml-4 text-harga">Rp
                                0</span></p>
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="form-group col-sm-6"><button type="submit"
                                class="btn btn-primary btn-submit">Next</button></div>
                    </div>
                </form>
        </div>
    </div>
    </div>
</section>
@endsection

@push('css')
<style>
    .btn-submit {
        width: 100%
    }
</style>
@endpush