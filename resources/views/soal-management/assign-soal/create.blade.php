@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Soal</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Soal</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="divisi_id">Pilih Divisi</label>
                            <select id="divisi_id" name="divisi_id[]"
                                class="form-control @error('divisi_id') is-invalid @enderror">
                            </select>
                            @error('divisi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_tugas">Deskripsi Soal</label>
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
                            <input type="datetime-local" class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                id="tanggal_mulai" name="tanggal_mulai">
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="datetime-local" class="form-control @error('tanggal_akhir') is-invalid @enderror"
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
@endpush
@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">
@endpush
