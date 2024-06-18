@extends('admin.layout')

@section('title', 'Pesanan')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Daftar Pesanan</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ Request::segment(1) }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Export Datatable start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">List Pesanan </h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover  data-table-export nowrap">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Name</th>
                                    <th>Nama Paket</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status Booking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <th class="table-plus pl-3">{{ $index + 1 }}</th>
                                        <td>{{ $order['name'] }}</td>
                                        <td>{{ $order['package_name'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order['set_date'])->format('d M Y') }}
                                        </td>
                                        <td>{{ $order['amount'] }}</td>
                                        <td>Rp {{ number_format($order['total_payment'], 0, ',', '.') }}
                                        </td>
                                        <td>
                                            @if ($order['is_checked'])
                                                <span class="badge badge-success">Confirmed</span>
                                            @else
                                            <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#confirmation-modal-{{ $order['id'] }}" type="button">
                                                Belum Check In
                                            </a>
                                            <div class="modal fade" id="confirmation-modal-{{ $order['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center font-18">
                                                            <h5 class="padding-top-30 mb-30 weight-500">
                                                                Apakah anda yakin untuk mengubah status?
                                                            </h5>
                                                            <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto">
                                                                <div class="col-6">
                                                                    <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="col-6">
                                                                    <form action="{{ route('orders.check', $order['id']) }}" method="POST">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn">
                                                                            <i class="fa fa-check"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Export Datatable End -->
            </div>
        </div>
    </div>
    </div>
@endsection
