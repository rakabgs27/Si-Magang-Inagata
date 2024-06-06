@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Wawancara Management</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Wawancara</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('list-wawancara.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="divisi">Pilih Divisi</label>
                            <select class="form-control select2" id="divisi" name="divisi" placeholder="Pilih Divisi">
                                <option value="" disabled selected>Pilih Divisi</option>
                                @foreach ($divisi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="mentor-group" style="display:none;">
                            <label for="mentor">Pilih Mentor</label>
                            <select class="form-control select2" id="mentor" name="mentor" placeholder="Pilih Mentor">
                                <option value="" disabled selected>Pilih Mentor</option>
                                <!-- Options will be loaded dynamically using JavaScript -->
                            </select>
                        </div>
                        <div class="form-group" id="pendaftar-group" style="display:none;">
                            <label for="pendaftar">Pilih Pendaftar</label>
                            <select class="form-control select2" id="pendaftar" name="pendaftar"
                                placeholder="Pilih Pendaftar">
                                <option value="" disabled selected>Pilih Pendaftar</option>
                                <!-- Options will be loaded dynamically using JavaScript -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control summernote @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_wawancara">Tanggal Wawancara</label>
                            <input type="datetime-local" class="form-control" id="tanggal_wawancara"
                                name="tanggal_wawancara" placeholder="Pilih Tanggal Wawancara">
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
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
                    $(this).data('placeholder');
                }
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

            $('#divisi').change(function() {
                var divisiId = $(this).val();
                if (divisiId) {
                    // Tampilkan form mentor dan pendaftar
                    $('#mentor-group').show();
                    $('#pendaftar-group').show();

                    // Ambil mentor berdasarkan divisi
                    $.ajax({
                        url: '{{ route('get-mentors-by-divisi') }}',
                        type: 'GET',
                        data: {
                            divisi_id: divisiId
                        },
                        success: function(data) {
                            $('#mentor').empty().append(
                                '<option value="" disabled selected>Pilih Mentor</option>');
                            $.each(data.mentors, function(key, mentor) {
                                $('#mentor').append(new Option(mentor.name, mentor.id));
                            });
                        }
                    });

                    // Ambil pendaftar berdasarkan divisi
                    $.ajax({
                        url: '{{ route('get-pendaftar-by-divisi') }}',
                        type: 'GET',
                        data: {
                            divisi_id: divisiId
                        },
                        success: function(data) {
                            $('#pendaftar').empty().append(
                                '<option value="" disabled selected>Pilih Pendaftar</option>'
                                );
                            $.each(data.pendaftar, function(key, pendaftar) {
                                $('#pendaftar').append(new Option(pendaftar.name,
                                    pendaftar.id));
                            });
                        }
                    });
                } else {
                    $('#mentor-group').hide();
                    $('#pendaftar-group').hide();
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
