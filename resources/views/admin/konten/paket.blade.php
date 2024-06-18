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
                                <h4>Daftar Paket Wisata</h4>
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
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal">
                                Tambah
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Export Datatable start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">List Produk </h4>
                    </div>
                    <div class="pb-20">
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
                        <table class="table hover data-table-export nowrap">
                            <colgroup>
                                <col style="width: 5%;">
                                <col style="width: 25%;">
                                <col style="width: 15%;">
                                <col style="width: 35%;">
                                <col style="width: 15%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product['package_name'] }}</td>
                                        <td>Rp {{ number_format($product['price'], 0, ',', '.') }}</td>
                                        <td>{{ Str::limit($product['description'], 60) }}</td>
                                        <td>
                                            <div class="d-inline-block">
                                                <a href="#" class="btn btn-warning mb-1" style="width: 80px"
                                                    data-toggle="modal" data-target="#edit-modal-{{ $product['id'] }}">
                                                    Edit
                                                </a>
                                                <a href="#" class="btn btn-danger mb-1" style="width: 80px"
                                                    data-toggle="modal" data-target="#hapus-modal-{{ $product['id'] }}">
                                                    Hapus
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit-modal-{{ $product['id'] }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editModalLabel{{ $product['id'] }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editModalLabel{{ $product['id'] }}">Edit
                                                        Produk</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                </div>
                                                <form class="text-main py-3"
                                                    action="{{ route('paket-wisata.update', $product['id']) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="package_name" class="form-label">Nama Produk</label>
                                                            <input type="text" class="form-control" id="package_name"
                                                                name="package_name" required
                                                                value="{{ old('package_name', $product['package_name']) }}"
                                                                placeholder="Masukkan nama produk">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Harga</label>
                                                            <input type="number" class="form-control" id="price"
                                                                name="price" required
                                                                value="{{ old('price', $product['price']) }}"
                                                                placeholder="Masukkan harga">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" id="description" name="description" placeholder="Masukkan deskripsi">{{ old('description', $product['description']) }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hapus Modal -->
                                    <div class="modal fade" id="hapus-modal-{{ $product['id'] }}" tabindex="-1"
                                        role="dialog" aria-labelledby="hapusModalLabel{{ $product['id'] }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="hapusModalLabel{{ $product['id'] }}">
                                                        Hapus Produk</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus produk ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form action="{{ route('paket-wisata.destroy', $product['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Export Datatable End -->

                <!-- Tambah Produk Modal -->
                <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Tambah Produk</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form class="text-main py-3" action="{{ route('paket-wisata.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="package_name" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="package_name" name="package_name"
                                            required placeholder="Masukkan nama produk">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Harga</label>
                                        <input type="number" class="form-control" id="price" name="price"
                                            placeholder="Masukkan harga">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            placeholder="Masukkan deskripsi">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
