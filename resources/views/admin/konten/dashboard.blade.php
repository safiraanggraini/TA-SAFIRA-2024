@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="{{ asset('admin/vendors/images/banner-img.pn') }}g" alt="" />
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            Selamat Datang kembali
                            <div class="weight-600 font-30 text-blue">Admin!</div>
                        </h4>
                        <p class="font-18 max-width-600">
                            Ini adalah panel kendali untuk mengelola konten dan fitur situs Curug Pletuk. Gunakan menu di
                            sebelah kiri untuk menjelajahi berbagai opsi seperti mengelola pengguna, membuat dan mengedit
                            konten, melihat analitik, serta melakukan pengaturan lainnya.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ $orderCount }}</div>
                                <div class="font-14 text-secondary weight-500">
                                    Pesanan
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#00eccf">
                                    <i class="icon-copy bi bi-journal-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ $userCount }}</div>
                                <div class="font-14 text-secondary weight-500">
                                    User
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#ff5b5b">
                                    <span class="icon-copy bi bi-people"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                    <div class="card-box height-100-p widget-style3">
                        <div class="d-flex flex-wrap">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ $productCount }}</div>
                                <div class="font-14 text-secondary weight-500">
                                    Produk 
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon">
                                    <i class="icon-copy bi-receipt-cutoff" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
