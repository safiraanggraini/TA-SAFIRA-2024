@extends('layouts.app')

@section('title', __('Curug Pletuk - Profile'))


@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <h1 class="text-center">Terima Kasih !</h1>
            <div class="border border-3 border-success"></div>
            <div class="card  bg-white shadow p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h3>Pemesanan tiket anda telah dikonfirmasi</h3>
                    <p class="mt-2">Silahkan lakukan pembayaran melalui transfer dan lakukan konfirmasi melalui
                        WhatsApp admin Curug Pletuk , Anda dapat meilihat riwayat pesanan anda di halam profile</p>
                    <div class="d-flex justify-content-between font-weight-bold">
                        <div class="ml-4">
                            <p class="mb-0">BCA: 006212345</p>
                            <p>Dana: 0812345678</p>
                        </div>
                        <div class="mr-4">WhatsApp admin: 0878-4841-4339</div>
                    </div>
                    <button class="btn btn-primary w-full">Kembali ke Beranda</button>
                </div>
            </div>
        </div>
    </div>
@endsection
