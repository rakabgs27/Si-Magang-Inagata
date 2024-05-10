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
                            <label for="pendaftar_id">Pilih Pendaftar</label>
                            <select id="pendaftar_id" name="pendaftar_id"
                                class="form-control select2 @error('pendaftar_id') is-invalid @enderror">
                                <option value="">Pilih Pendaftar</option>
                                @foreach ($listPendaftar as $pendaftar)
                                    <option value="{{ $pendaftar->id }}"
                                        {{ old('pendaftar_id') == $pendaftar->id ? 'selected' : '' }}>
                                        {{ $pendaftar->user ? $pendaftar->user->name : 'No Name Available' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pendaftar_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="soal_id">Pilih Soal</label>
                            <select id="soal_id" name="soal_id" class="form-control select2">
                                <option selected disabled>Select a soal</option>
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
            // Initialize select2 for the soal_id dropdown
            $('#soal_id').select2();

            // Handle changes to the pendaftar_id dropdown
            $('#pendaftar_id').on('change', function() {
                var pendaftarId = $(this).val();
                $('#soal_id').empty().append('<option selected disabled>Select a soal</option>'); // Show placeholder option
                $('#soal_id').select2(); // Reinitialize select2

                // Clear file list when pendaftar changes, especially to "Pilih Pendaftar"
                $('#fileList').empty();

                // Exit if "Pilih Pendaftar" or an invalid option is selected
                if (!pendaftarId || pendaftarId === "") {
                    $('#fileList').html('<p>Please select a pendaftar to see files.</p>');
                    return;
                }

                // Prepare the URL with the selected pendaftarId
                var url = "{{ route('soal-divisi.get', ':pendaftarId') }}";
                url = url.replace(':pendaftarId', pendaftarId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        if (data.length > 0) {
                            $.each(data, function(index, soal) {
                                $('#soal_id').append('<option value="' + soal.id + '">' + soal.judul_soal + '</option>');
                            });
                        } else {
                            $('#soal_id').append('<option disabled>No soals available</option>');
                        }
                        $('#soal_id').select2(); // Reinitialize select2 for updated options
                    },
                    error: function(xhr, status, error) {
                        $('#soal_id').empty().append('<option disabled>Error loading soals</option>'); // Show error in dropdown
                        $('#soal_id').select2();
                        console.error("AJAX error:", status, error);
                    }
                });
            });

            // Event delegation for handling changes to dynamically updated soal_id dropdown
            $(document).on('change', '#soal_id', function() {
                if (!this.value || this.value === "") { // Check if the placeholder or disabled option is selected
                    $('#fileList').empty();
                    return;
                }

                var soalId = $(this).val();
                console.log('Selected soalId:', soalId); // Log the selected soal_id or take other actions

                // Trigger fetching and displaying files here
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
                    },
                    error: function() {
                        $('#fileList').empty();
                        $('#fileList').append($('<li>').text('Error loading files.'));
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
