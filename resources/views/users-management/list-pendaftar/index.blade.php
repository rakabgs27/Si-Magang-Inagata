@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Pendaftar</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">User Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>List Pendaftar</h4>
                            <div class="d-flex flex-row-reverse card-header-action">
                                <div class="card-header-actions">
                                    {{-- <a class="btn btn-icon icon-left btn-primary"
                                    href="{{ route('list-divisi.create') }}">Tambah
                                    Baru Divisi</a> --}}
                                </div>
                                <h4></h4>
                                <form class="card-header-form" id="search" method="GET"
                                    action="{{ route('list-pendaftar.index') }}">
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Cari Nama Pendaftar" value="{{ $namaUserSearch }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"
                                                    type="submit"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Divisi</th>
                                            <th>Nomor WhatsApp</th>
                                            <th>Nama Instansi</th>
                                            <th>Nama Jurusan/Prodi</th>
                                            <th>NIM</th>
                                            <th>Link CV</th>
                                            <th>Link Portofolio</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        @foreach ($listPendaftar as $key => $listItem)
                                            <tr>
                                                <td>{{ $listPendaftar->firstItem() + $key }}</td>
                                                <td>{{ $listItem->user->name }}</td>
                                                <td>{{ $listItem->user->email }}</td>
                                                <td>{{ $listItem->divisi->nama_divisi }}</td>
                                                <td>{{ $listItem->nomor_hp }}</td>
                                                <td>{{ $listItem->nama_instansi }}</td>
                                                <td>{{ $listItem->nama_jurusan }}</td>
                                                <td>{{ $listItem->nim }}</td>
                                                <td><a href="{{ $listItem->link_cv }}">{{ $listItem->link_cv }}</a></td>
                                                <td><a href="{{ $listItem->link_porto }}">{{ $listItem->link_porto }}</a>
                                                </td>
                                                <td>{{ $listItem->status }}</td>
                                                <td class="text-right">
                                                    <div class="d-flex flex-column flex-md-row justify-content-end">
                                                        @if ($listItem->status == 'Pending')
                                                            <button class="btn btn-sm btn-success btn-icon mb-2 mb-md-0"
                                                                onclick="changeStatus({{ $listItem->id }}, 'Terverifikasi')"><i
                                                                    class="fas fa-check"></i> Verifikasi</button>
                                                            <button class="btn btn-sm btn-danger btn-icon ml-md-2"
                                                                onclick="changeStatus({{ $listItem->id }}, 'Tertolak')"><i
                                                                    class="fas fa-ban"></i> Tolak</button>
                                                        @elseif ($listItem->status == 'Terverifikasi')
                                                            <button class="btn btn-sm btn-danger btn-icon ml-md-2"
                                                                onclick="changeStatus({{ $listItem->id }}, 'Tertolak')"><i
                                                                    class="fas fa-ban"></i> Tolak Verif</button>
                                                        @elseif ($listItem->status == 'Tertolak')
                                                            <button class="btn btn-sm btn-success btn-icon mb-2 mb-md-0"
                                                                onclick="changeStatus({{ $listItem->id }}, 'Terverifikasi')"><i
                                                                    class="fas fa-check"></i> Verifikasi Ulang</button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{-- {{ $listDivisi->withQueryString()->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('customScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function changeStatus(id, status) {
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to change the status to ${status}.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('list-pendaftar.changeStatus') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id,
                            status: status
                        },
                        success: function(response) {
                            iziToast.success({
                                title: 'Success',
                                message: response.message,
                                position: 'topRight'
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        },
                        error: function(response) {
                            iziToast.error({
                                title: 'Error',
                                message: response.responseJSON.message,
                                position: 'topRight'
                            });
                        }
                    });
                }
            });
        }
    </script>
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
@endpush
