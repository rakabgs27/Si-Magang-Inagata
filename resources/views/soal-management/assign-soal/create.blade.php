@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Assign Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Assign Soal</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Assign Soal</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('assign-soal.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="divisi_id">Pilih Divisi</label>
                            <select id="divisi_id" name="divisi_id" class="form-control select2">
                                <option selected disabled>Pilih Divisi</option>
                                @foreach ($listDivisi as $divisi)
                                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pendaftar_id">Pilih Pendaftar</label>
                            <select id="pendaftar_id" name="pendaftar_id[]" class="form-control select2" multiple
                                data-placeholder="Pilih Pendaftar">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="soal_id">Pilih Soal</label>
                            <select id="soal_id" name="soal_id" class="form-control select2">
                                <option selected disabled>Pilih Soal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <ul id="fileList"></ul>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_tugas">Deskripsi Tugas</label>
                            <textarea name="deskripsi_tugas" id="deskripsi"
                                class="text-dark form-control summernote
                                @error('deskripsi_tugas') is-invalid @enderror"
                                value="{{ old('deskripsi_tugas') }}" data-id="deskripsi_tugas"></textarea>
                            @error('deskripsi_tugas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="datetime-local"
                                class="form-control tanggal-input @error('tanggal_mulai') is-invalid @enderror"
                                id="tanggal_mulai" name="tanggal_mulai">
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="datetime-local"
                                class="form-control tanggal-input @error('tanggal_akhir') is-invalid @enderror"
                                id="tanggal_akhir" name="tanggal_akhir">
                            @error('tanggal_akhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('assign-soal.index') }}">Cancel</a>
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
        var deskripsiSummernote = $('#deskripsi')
        deskripsiSummernote.summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: function() {
                    $(this).data('placeholder');
                }
            });

            $('#divisi_id').change(function() {
                var divisiId = $(this).val();

                // Clear pendaftar and soal selections and file list
                $('#pendaftar_id').empty().select2({
                    placeholder: 'Pilih Pendaftar'
                });
                $('#soal_id').empty().append('<option selected disabled>Pilih Soal</option>').select2();
                $('#fileList').html('<p>Pilih Soal Untuk Melihat File Soal</p>');

                // Fetch pendaftars based on selected divisi
                $.ajax({
                    url: '{{ route('divisi-pendaftar.get', ':divisiId') }}'.replace(':divisiId',
                        divisiId),
                    type: 'GET',
                    success: function(data) {
                        var pendaftarSelect = $('#pendaftar_id');
                        pendaftarSelect.empty();
                        pendaftarSelect.append('<option></option>');
                        $.each(data.pendaftars, function(key, value) {
                            pendaftarSelect.append('<option value="' + value.id + '">' +
                                value.user.name + '</option>');
                        });
                        pendaftarSelect.select2({
                            placeholder: 'Pilih Pendaftar'
                        });
                        console.log("Pendaftars loaded:", data.pendaftars);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", status, error);
                    }
                });
            });

            $('#pendaftar_id').change(function() {
                var pendaftarId = $(this).val();
                $('#soal_id').empty().append('<option selected disabled>Pilih Soal</option>').select2();
                $('#fileList').empty();

                if (!pendaftarId || pendaftarId === "") {
                    $('#fileList').html('<p>Pilih Soal Untuk Melihat File Soal</p>');
                    return;
                }

                var url = "{{ route('soal-divisi.get', ':pendaftarId') }}";
                url = url.replace(':pendaftarId', pendaftarId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        if (data.length > 0) {
                            $.each(data, function(index, soal) {
                                $('#soal_id').append('<option value="' + soal.id +
                                    '">' + soal.judul_soal + '</option>');
                            });
                        } else {
                            $('#soal_id').append(
                            '<option disabled>No soals available</option>');
                        }
                        $('#soal_id').select2();
                        console.log("Soals loaded:", data);
                    },
                    error: function(xhr, status, error) {
                        $('#soal_id').empty().append(
                            '<option disabled>Error loading soals</option>').select2();
                        console.error("AJAX error:", status, error);
                    }
                });
            });

            $(document).on('change', '#soal_id', function() {
                if (!this.value || this.value === "") {
                    $('#fileList').empty();
                    return;
                }

                var soalId = $(this).val();
                console.log('Selected soalId:', soalId);

                var fileUrl = "{{ route('file-soal.get', ['soalId' => ':soalId']) }}";
                fileUrl = fileUrl.replace(':soalId', soalId);
                $.ajax({
                    url: fileUrl,
                    type: 'GET',
                    success: function(files) {
                        $('#fileList').empty();
                        if (files.length > 0) {
                            files.forEach(function(file) {
                                $('#fileList').append($('<li>').text(file.basename));
                            });
                        } else {
                            $('#fileList').html('<p>No files found for this soal.</p>');
                        }
                        console.log("Files loaded:", files);
                    },
                    error: function() {
                        $('#fileList').empty();
                        $('#fileList').append($('<li>').text('Error loading files.'));
                        console.error("AJAX error loading files");
                    }
                });
            });
        });
    </script>
@endpush
@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">
@endpush
