@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Menu User Management</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel List Pendaftar</h2>

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
                                    <a class="btn btn-icon icon-left btn-primary"
                                        href="{{ route('list-divisi.create') }}">Tambah
                                        Baru Divisi</a>
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
                                                    <td>{{ $listItem->link_cv }}</td>
                                                    <td>{{ $listItem->link_porto }}</td>
                                                    <td class="text-right">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="#"
                                                                class="btn btn-sm btn-info btn-icon "><i
                                                                    class="fas fa-edit"></i>
                                                                Edit</a>
                                                            <form action="#"
                                                                method="POST" class="ml-2" id="del-<?= $listItem->id ?>">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button type="submit" id="#submit"
                                                                    class="btn btn-sm btn-danger btn-icon "
                                                                    data-confirm="Hapus Data Siswa ?|Apakah Kamu Yakin?"
                                                                    data-confirm-yes="submitDel(<?= $listItem->id ?>)"
                                                                    data-id="del-{{ $listItem->id }}">
                                                                    <i class="fas fa-times"> </i> Delete </button>
                                                            </form>
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
            </div>
    </section>
@endsection
@push('customScript')
    <script>
        $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            //ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });

        function submitDel(id) {
            $('#del-' + id).submit()
        }
    </script>
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
