@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Daftar Soal</h1>
        </div>
        @if (!$mentorDivisiId  && !$userManager)
            <div class="alert alert-warning" role="alert">
                Mentor tidak memiliki divisi.
            </div>
        @elseif ($mentorDivisiId || $userManager)
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
                                <h4>List Soal</h4>
                                <div class="d-flex flex-row-reverse card-header-action">
                                    <div class="card-header-actions">
                                        @role('mentor')
                                            <a class="btn btn-icon icon-left btn-primary"
                                                href="{{ route('list-soal.create') }}">Tambah Soal</a>
                                        @endrole
                                        @role('manager')
                                            <a class="btn btn-info btn-primary active import">
                                                <i class="fa fa-filter" aria-hidden="true"></i>
                                                Filter by Divisi</a>
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
                                <div class="show-import" style="display: none">
                                    <div class="custom-file">
                                        <form action="{{ route('list-soal.index') }}" method="GET">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <select class="form-control select2" name="divisi_id">
                                                        <option value="">Select Divisi</option>
                                                        @foreach ($divisis as $divisi)
                                                            <option value="{{ $divisi->id }}"
                                                                {{ $selectedDivisi == $divisi->id ? 'selected' : '' }}>
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
                                                    <a href="{{ route('list-soal.index') }}"
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
                                                <th>Nama Mentor</th>
                                                <th>Nama Divisi</th>
                                                <th>Judul Soal</th>
                                                <th>Tanggal Upload</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            @if ($listSoal->isEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak Ada Data</td>
                                                </tr>
                                            @else
                                                @foreach ($listSoal as $key => $listItem)
                                                    <tr>
                                                        <td>{{ $listSoal->firstItem() + $key }}</td>
                                                        <td>{{ $listItem->name }}</td>
                                                        <td>{{ $listItem->nama_divisi }}</td>
                                                        <td>{{ $listItem->judul_soal }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($listItem->tanggal_upload)->translatedformat('d F Y H:i:s') }}
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
                                                                    <form
                                                                        action="{{ route('list-soal.destroy', $listItem->id) }}"
                                                                        method="POST" class="ml-2"
                                                                        id="del-<?= $listItem->id ?>">
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
                                            @endif
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
            @endif
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
