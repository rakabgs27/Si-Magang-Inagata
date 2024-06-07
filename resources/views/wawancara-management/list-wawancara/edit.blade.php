@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Wawancara Management</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Wawancara</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Edit Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('list-wawancara.update', $listWawancara->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="divisi">Pilih Divisi</label>
                            <select class="form-control select2 @error('divisi') is-invalid @enderror" id="divisi"
                                name="divisi" placeholder="Pilih Divisi">
                                <option value="" selected>Pilih Divisi</option>
                                @foreach ($divisi as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $listWawancara->pendaftar->divisi_id ? 'selected' : '' }}>
                                        {{ $item->nama_divisi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('divisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6" id="mentor-group">
                                <label for="mentor">Pilih Mentor</label>
                                <select class="form-control select2 @error('mentor') is-invalid @enderror" id="mentor"
                                    name="mentor">
                                    <option value="" selected>Pilih Mentor</option>
                                    @foreach ($mentors as $mentor)
                                        <option value="{{ $mentor['id'] }}"
                                            {{ $mentor['id'] == $listWawancara->divisi_mentor_id ? 'selected' : '' }}>
                                            {{ $mentor['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('mentor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6" id="pendaftar-group">
                                <label for="pendaftar">Pilih Pendaftar</label>
                                <select class="form-control select2 @error('pendaftar') is-invalid @enderror" id="pendaftar"
                                    name="pendaftar" placeholder="Pilih Pendaftar">
                                    <option value="" selected>Pilih Pendaftar</option>
                                    @foreach ($pendaftarSudahDinilai as $pendaftarItem)
                                        <option value="{{ $pendaftarItem['id'] }}"
                                            {{ $pendaftarItem['id'] == $listWawancara->pendaftar_id ? 'selected' : '' }}>
                                            {{ $pendaftarItem['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pendaftar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control summernote @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan Deskripsi">{{ old('deskripsi', $listWawancara->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_wawancara">Tanggal Wawancara</label>
                            <input type="datetime-local"
                                class="form-control @error('tanggal_wawancara') is-invalid @enderror" id="tanggal_wawancara"
                                name="tanggal_wawancara"
                                value="{{ old('tanggal_wawancara', $listWawancara->tanggal_wawancara) }}"
                                placeholder="Pilih Tanggal Wawancara">
                            @error('tanggal_wawancara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Update</button>
                    <a class="btn btn-secondary" href="{{ route('list-wawancara.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: function() {
                    return $(this).attr('placeholder');
                },
                allowClear: true
            });

            $('#deskripsi').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });

            // Event change untuk dropdown divisi
            $('#divisi').change(function() {
                var divisiId = $(this).val();

                if (divisiId) {
                    // Ambil mentor berdasarkan divisi
                    $.ajax({
                        url: "{{ route('mentors-by-divisi') }}",
                        data: { divisi_id: divisiId },
                        dataType: 'json',
                        success: function(data) {
                            $('#mentor').empty().append('<option value="">Pilih Mentor</option>');
                            $.each(data.mentors, function(key, mentor) {
                                $('#mentor').append('<option value="' + mentor.id + '">' + mentor.name + '</option>');
                            });
                            $('#mentor').select2().trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.log('Error fetching mentors: ' + error);
                        }
                    });

                    // Ambil pendaftar berdasarkan divisi
                    $.ajax({
                        url: "{{ route('pendaftar-by-divisi') }}",
                        data: { divisi_id: divisiId },
                        dataType: 'json',
                        success: function(data) {
                            $('#pendaftar').empty().append('<option value="">Pilih Pendaftar</option>');
                            $.each(data.pendaftar, function(key, pendaftar) {
                                $('#pendaftar').append('<option value="' + pendaftar.id + '">' + pendaftar.name + '</option>');
                            });
                            $('#pendaftar').select2().trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.log('Error fetching pendaftar: ' + error);
                        }
                    });
                } else {
                    $('#mentor').empty().append('<option value="">Pilih Mentor</option>');
                    $('#pendaftar').empty().append('<option value="">Pilih Pendaftar</option>');
                    $('#mentor').select2().trigger('change');
                    $('#pendaftar').select2().trigger('change');
                }
            });
        });
    </script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">
    <style>
        .drag-drop-area {
            border: 2px dashed #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            color: #999;
            margin-bottom: 15px;
        }

        .drag-drop-area:hover {
            color: #555;
            border-color: #aaa;
        }

        #fileInput {
            display: none;
        }

        .file-list li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .file-list img {
            margin-right: 10px;
            border-radius: 5px;
        }

        .remove-link {
            margin-left: 10px;
            color: red;
            text-decoration: none;
        }

        .remove-link:hover {
            text-decoration: underline;
        }
    </style>
@endpush
