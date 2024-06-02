@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Menu Nilai Management</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel List Nilai Pendaftar</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <!-- Form Pilih Divisi -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Pilih Divisi</h4>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('list-nilai.index') }}" class="mb-4">
                                <div class="form-group">
                                    <label for="divisi_id">Divisi</label>
                                    <select class="form-control select2" id="divisi_id" name="divisi_id"
                                        onchange="this.form.submit()">
                                        @foreach ($divisiMentors as $divisiMentor)
                                            <option value="{{ $divisiMentor->divisi_id }}"
                                                {{ $divisiId == $divisiMentor->divisi_id ? 'selected' : '' }}>
                                                {{ $divisiMentor->divisi->nama_divisi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tabel List Nilai -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>List Nilai Pendaftar Divisi:
                                {{ $divisiMentors->where('divisi_id', $divisiId)->first()->divisi->nama_divisi }}</h4>
                            <div class="d-flex flex-row-reverse card-header-action">
                                <div class="card-header-actions">
                                    <a class="btn btn-icon icon-left btn-primary" href="#">Tambah Nilai Pendaftar</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pendaftar</th>
                                            <th>Divisi Pendaftar</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        @foreach ($data as $key => $item)
                                            <tr data-toggle="collapse" data-target="#collapse-{{ $key }}"
                                                class="accordion-toggle">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['pendaftar']->user->name }}</td>
                                                <td>{{ $item['pendaftar']->divisi->nama_divisi }}</td>
                                                <td>{{ $item['status']}}</td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="#" class="btn btn-sm btn-info btn-icon"><i
                                                                class="fas fa-eye"></i> View Detail</a>
                                                        <a href="#" class="btn btn-sm btn-info btn-icon ml-2"><i
                                                                class="fas fa-edit"></i> Edit</a>
                                                        <form action="#" method="POST" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon"
                                                                data-confirm="Hapus Data Pendaftar?|Apakah Kamu Yakin?"
                                                                data-confirm-yes="submitDel({{ $item['pendaftar']->id }})">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="hiddenRow">
                                                    <div id="collapse-{{ $key }}" class="collapse p-3">
                                                        <div class="card border-primary">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        @if ($divisiId == 1)
                                                                            <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                    <strong>Memiliki pengetahuan yang luas
                                                                                        dalam arsitektur software:</strong>
                                                                                    {{ $item['kriteria']['kriteria_1'] ?? 'N/A' }}
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                    <strong>Memahami cara deployment ke
                                                                                        server menjadi nilai
                                                                                        tambah:</strong>
                                                                                    {{ $item['kriteria']['kriteria_2'] ?? 'N/A' }}
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                    <strong>Memahami penggunaan kontrol
                                                                                        versi seperti Git:</strong>
                                                                                    {{ $item['kriteria']['kriteria_3'] ?? 'N/A' }}
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                    <strong>Memiliki pengetahuan tentang
                                                                                        functional dan object oriented
                                                                                        programming:</strong>
                                                                                    {{ $item['kriteria']['kriteria_4'] ?? 'N/A' }}
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                    <strong>Memahami bahasa pemrograman
                                                                                        seperti PHP, dan NodeJS:</strong>
                                                                                    {{ $item['kriteria']['kriteria_5'] ?? 'N/A' }}
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                    <strong>Memahami Sql database:</strong>
                                                                                    {{ $item['kriteria']['kriteria_6'] ?? 'N/A' }}
                                                                                </li>
                                                                            </ul>
                                                                        {{-- @elseif ($divisiId == 2)
                                                                            <ul class="list-group">
                                                                                <!-- Add criteria for divisiId == 2 -->
                                                                                <li class="list-group-item">
                                                                                    <strong>Kriteria 1 untuk Divisi
                                                                                        2:</strong>
                                                                                    {{ $item['kriteria']['kriteria_1'] ?? 'N/A' }}
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                    <strong>Kriteria 2 untuk Divisi
                                                                                        2:</strong>
                                                                                    {{ $item['kriteria']['kriteria_2'] ?? 'N/A' }}
                                                                                </li>
                                                                                <!-- Add more criteria as needed -->
                                                                            </ul>
                                                                        @elseif ($divisiId == 3)
                                                                            <ul class="list-group">
                                                                                <!-- Add criteria for divisiId == 3 -->
                                                                                <li class="list-group-item">
                                                                                    <strong>Kriteria 1 untuk Divisi
                                                                                        3:</strong>
                                                                                    {{ $item['kriteria']['kriteria_1'] ?? 'N/A' }}
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                    <strong>Kriteria 2 untuk Divisi
                                                                                        3:</strong>
                                                                                    {{ $item['kriteria']['kriteria_2'] ?? 'N/A' }}
                                                                                </li>
                                                                                <!-- Add more criteria as needed -->
                                                                            </ul> --}}
                                                                        @else
                                                                            <ul class="list-group">
                                                                                <li class="list-group-item">Tidak ada
                                                                                    kriteria untuk divisi ini.</li>
                                                                            </ul>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="d-flex justify-content-center">
                                    {{ $data->links() }}
                                </div> --}}
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
            $('.select2').select2();
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
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
