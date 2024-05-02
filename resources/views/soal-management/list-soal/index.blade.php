@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>List Soal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Soal Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>List Soal</h4>
                            <div class="d-flex flex-row-reverse card-header-action">
                                <div class="card-header-actions">
                                    @role('mentor')
                                    <a class="btn btn-icon icon-left btn-primary"
                                        href="{{ route('list-soal.create') }}">Tambah Soal</a>
                                    @endrole
                                    @role('manager')
                                        <a class="btn btn-icon icon-left btn-primary" href="#">Assign Soal Pendaftar</a>
                                    @endrole
                                </div>
                                <h4></h4>
                                <form class="card-header-form" id="search" method="GET"
                                    action="{{ route('list-soal.index') }}">
                                    <div class="input-group">
                                        <input type="text" name="judul_soal" class="form-control"
                                            placeholder="Cari Judul Soal" value="{{ $judulSoalSearch }}">
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
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mentor</th>
                                            <th>Nama Divisi</th>
                                            <th>Judul Soal</th>
                                            <th>Tanggal Upload</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        @foreach ($listSoal as $key => $listItem)
                                            <tr>
                                                <td>{{ $listSoal->firstItem() + $key }}</td>
                                                <td>{{ $listItem->name }}</td>
                                                <td>{{ $listItem->nama_divisi }}</td>
                                                <td>{{ $listItem->judul_soal }}</td>
                                                <td>{{ \Carbon\Carbon::parse($listItem->tanggal_upload)->format('d F Y H:i:s') }}
                                                </td>
                                                @role('mentor')
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('list-soal.edit', $listItem->id) }}"
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit</a>
                                                        <span class="mr-2"></span>
                                                        <a href="{{ route('list-soal.show', $listItem->id) }}"
                                                            class="btn btn-sm btn-warning btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Detail</a>
                                                        <form action="{{ route('list-soal.destroy', $listItem->id) }}"
                                                            method="POST" class="ml-2" id="del-<?= $listItem->id ?>">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button type="submit" id="#submit"
                                                                class="btn btn-sm btn-danger btn-icon"
                                                                data-confirm="Hapus Data Soal ?|Apakah Kamu Yakin?"
                                                                data-confirm-yes="submitDel(<?= $listItem->id ?>)"
                                                                data-id="del-{{ $listItem->id }}">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                @endrole
                                                @role('manager')
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="mr-2"></span>
                                                        <a href="{{ route('list-soal.show', $listItem->id) }}"
                                                            class="btn btn-sm btn-warning btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Detail</a>
                                                    </div>
                                                </td>
                                                @endrole
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $listSoal->links() }}
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
@endpush

@push('customStyle')
@endpush
