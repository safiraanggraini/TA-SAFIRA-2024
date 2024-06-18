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
                                <h4>Daftar User</h4>
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
                        <table class="table hover data-table-export nowrap">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <th class="table-plus pl-3">{{ $index + 1 }}</th>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user['role'] }}</td>
                                        <td>
                                            <div class="d-inline-block">
                                                <a href="#" class="btn btn-primary mb-1" style="width: 80px"
                                                    data-toggle="modal" data-target="#detail-modal-{{ $user['id'] }}"
                                                    type="button" onclick="showUserDetail({{ $user['id'] }})">
                                                    Detail
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="detail-modal-{{ $user['id'] }}" tabindex="-1"
                                        role="dialog" aria-labelledby="detailModalLabel{{ $user['id'] }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="detailModalLabel{{ $user['id'] }}">Detail
                                                        User
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">
                                                        ×
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="modal-body-{{ $user['id'] }}">
                                                    <!-- Detail user akan dimuat di sini -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
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
            </div>
        </div>
    </div>

    <script>
        function showUserDetail(userId) {
            const token = '{{ Cookie::get('token') }}'; // Mendapatkan token dari cookie

            fetch(`https://curug-pletuk.fly.dev/users/${userId}`, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 200) {
                        const user = data.data;
                        const modalBody = document.getElementById(`modal-body-${userId}`);

                        modalBody.innerHTML = `
                        <p><strong>ID:</strong> ${user.id}</p>
                        <p><strong>Nama:</strong> ${user.name}</p>
                        <p><strong>Email:</strong> ${user.email}</p>
                        <p><strong>Address:</strong> ${user.address ?? 'N/A'}</p>
                        <p><strong>Phone Number:</strong> ${user.phone_number ?? 'N/A'}</p>
                        <p><strong>Avatar:</strong></p>
                        <img src="${user.avatar?.image_url ?? 'https://via.placeholder.com/150'}" alt="Avatar" style="width: 150px;">
                    `;
                    } else {
                        alert('Gagal mengambil data pengguna.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data pengguna.');
                });
        }
    </script>
@endsection
