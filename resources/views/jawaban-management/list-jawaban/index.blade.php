@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>List Jawaban Pendaftar</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Jawaban Management</h2>
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
                                    <a class="btn btn-info btn-primary active import">
                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                        Filter by Divisi</a>
                                </div>
                                <h4></h4>
                                <form class="card-header-form" id="search" method="GET"
                                    action="{{ route('list-jawaban.index') }}">
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Cari Pendaftar" value="{{ $namaUserSearch }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"
                                                    type="submit"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-import" style="display: none">
                                <div class="custom-file">
                                    <form action="{{ route('list-jawaban.index') }}" method="GET">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <select class="form-control select2" name="divisi_id">
                                                    <option value="">Select Divisi</option>
                                                    @foreach ($divisis as $divisi)
                                                        <option value="{{ $divisi->id }}"
                                                            {{ $divisiId == $divisi->id ? 'selected' : '' }}>
                                                            {{ $divisi->nama_divisi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row justify-content-end">
                                            <div class="form-group col-md-2 col-lg-1">
                                                <button type="submit" class="btn btn-primary btn-block">Filter</button>
                                            </div>
                                            <div class="form-group col-md-2 col-lg-1">
                                                <a href="{{ route('list-jawaban.index') }}"
                                                    class="btn btn-secondary btn-block">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br><br><br>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pendaftar</th>
                                            <th>Nama Divisi</th>
                                            <th>Link Jawaban</th>
                                            <th>File Jawaban</th>
                                            <th>Tangal Pengumpulan</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        @if ($jawabanPendaftar->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak Ada Data</td>
                                            </tr>
                                        @else
                                            @foreach ($jawabanPendaftar as $key => $listItem)
                                                <tr>
                                                    <td>{{ $jawabanPendaftar->firstItem() + $key }}</td>
                                                    <td>{{ $listItem->soalPendaftar->pendaftar->user->name }}</td>
                                                    <td>{{ $listItem->soalPendaftar->pendaftar->divisi->nama_divisi }}</td>
                                                    <td>{{ $listItem->link_jawaban }}</td>
                                                    <td>{{ $listItem->file_jawaban }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($listItem->tanggal_pengumpulan)->format('d F Y H:i:s') }}
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="d-flex justify-content-end">
                                                            <span class="mr-2"></span>
                                                            <a href="#" class="btn btn-sm btn-warning btn-icon">
                                                                <i class="fas fa-edit"></i>
                                                                Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $jawabanPendaftar->links() }}
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
    <script src="/assets/js/select2.min.js"></script>
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
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
