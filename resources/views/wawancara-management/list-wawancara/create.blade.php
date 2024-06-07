@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengelolaan Wawancara</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('list-wawancara.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="divisi">Pilih Divisi</label>
                            <select class="form-control select2 @error('divisi') is-invalid @enderror" id="divisi"
                                name="divisi" placeholder="Pilih Divisi">
                                <option value="" selected>Pilih Divisi</option>
                                @foreach ($divisi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
                                @endforeach
                            </select>
                            @error('divisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6" id="mentor-group" style="display:none;">
                                <label for="mentor">Pilih Mentor</label>
                                <select class="form-control select2 @error('mentor') is-invalid @enderror" id="mentor"
                                    name="mentor" placeholder="Pilih Mentor">
                                    <option value="" selected>Pilih Mentor</option>
                                    <!-- Options will be loaded dynamically using JavaScript -->
                                </select>
                                @error('mentor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6" id="pendaftar-group" style="display:none;">
                                <label for="pendaftar">Pilih Pendaftar</label>
                                <select class="form-control select2 @error('pendaftar') is-invalid @enderror" id="pendaftar"
                                    name="pendaftar" placeholder="Pilih Pendaftar">
                                    <option value="" selected>Pilih Pendaftar</option>
                                    <!-- Options will be loaded dynamically using JavaScript -->
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
                                placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>
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
                                name="tanggal_wawancara" placeholder="Pilih Tanggal Wawancara">
                            @error('tanggal_wawancara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
            function resetSelect(selectElement, placeholder) {
                selectElement.val(null).trigger('change');
                selectElement.html('<option value="" selected>' + placeholder + '</option>');
            }

            $('.select2').select2({
                placeholder: function() {
                    return $(this).data('placeholder');
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

            $('#divisi').change(function() {
                var divisiId = $(this).val();
                if (divisiId) {
                    $('#mentor-group').show();
                    $('#pendaftar-group').show();

                    $.ajax({
                        url: '{{ route('get-mentors-by-divisi') }}',
                        type: 'GET',
                        data: {
                            divisi_id: divisiId
                        },
                        success: function(data) {
                            resetSelect($('#mentor'), 'Pilih Mentor');
                            $.each(data.mentors, function(key, mentor) {
                                $('#mentor').append(new Option(mentor.name, mentor.id));
                            });
                        }
                    });

                    $.ajax({
                        url: '{{ route('get-pendaftar-by-divisi') }}',
                        type: 'GET',
                        data: {
                            divisi_id: divisiId
                        },
                        success: function(data) {
                            resetSelect($('#pendaftar'), 'Pilih Pendaftar');
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

            $('#divisi, #mentor, #pendaftar').on('select2:clear', function() {
                var selectElement = $(this);
                resetSelect(selectElement, selectElement.attr('placeholder'));
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
