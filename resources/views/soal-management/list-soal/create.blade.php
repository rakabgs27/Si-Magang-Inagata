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
                    <form action="{{ route ('list-soal.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">Nama Mentor</label>
                            <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id"
                                name="user_id" value="{{ Auth::user()->name }}" readonly>
                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('list-soal.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
@endpush
@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">
@endpush
