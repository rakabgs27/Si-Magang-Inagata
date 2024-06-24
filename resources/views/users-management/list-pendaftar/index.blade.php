@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pendaftar</h1>
        </div>
        <div class="section-body">
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
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                            <th>Details</th>
                                        </tr>
                                        @foreach ($listPendaftar as $key => $listItem)
                                            <tr>
                                                <td>{{ $listPendaftar->firstItem() + $key }}</td>
                                                <td>{{ $listItem->user->name }}</td>
                                                <td>{{ $listItem->user->email }}</td>
                                                <td>{{ $listItem->divisi->nama_divisi }}</td>
                                                <td class="status {{
                                                    $listItem->status === 'Pending' ? 'text-dark font-weight-bold' :
                                                    ($listItem->status === 'Terverifikasi' ? 'text-success font-weight-bold' :
                                                    'text-danger font-weight-bold')
                                                }}">
                                                    {{ $listItem->status }}
                                                </td>
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
                                                <td>
                                                    <button class="btn btn-primary btn-sm"
                                                        onclick="toggleDetails({{ $listItem->id }})">View Details</button>
                                                </td>
                                            </tr>
                                            <tr id="details-row-{{ $listItem->id }}" class="details-row collapse">
                                                <td colspan="7">
                                                    <div class="card border-primary">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item"><strong>Nomor
                                                                                WhatsApp:</strong>
                                                                            {{ $listItem->nomor_hp }}</li>
                                                                        <li class="list-group-item"><strong>Nama
                                                                                Instansi:</strong>
                                                                            {{ $listItem->nama_instansi }}</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item"><strong>Nama
                                                                                Jurusan/Prodi:</strong>
                                                                            {{ $listItem->nama_jurusan }}</li>
                                                                        <li class="list-group-item"><strong>NIM:</strong>
                                                                            {{ $listItem->nim }}</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item"><strong>Link
                                                                                CV:</strong> <a
                                                                                href="{{ $listItem->link_cv }}">{{ $listItem->link_cv }}</a>
                                                                        </li>
                                                                        <li class="list-group-item"><strong>Link
                                                                                Portofolio:</strong> <a
                                                                                href="{{ $listItem->link_porto }}">{{ $listItem->link_porto }}</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $listPendaftar->withQueryString()->links() }}
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
        let currentlyOpenDetailsId = null;

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

        function toggleDetails(id) {
            if (currentlyOpenDetailsId !== null && currentlyOpenDetailsId !== id) {
                $('#details-row-' + currentlyOpenDetailsId).removeClass('show').addClass('collapse');
            }
            $('#details-row-' + id).toggleClass('collapse show');
            currentlyOpenDetailsId = $('#details-row-' + id).hasClass('show') ? id : null;
        }
    </script>
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <style>
        .collapse.show {
            display: table-row !important;
        }

        .collapse:not(.show) {
            display: none;
        }

        .card.border-primary {
            border-width: 2px;
        }
    </style>
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
@endpush
