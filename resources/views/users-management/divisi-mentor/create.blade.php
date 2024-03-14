@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Divisi Mentor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Divisi Mentor</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('divisi-mentor.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="users">Pilih Mentor</label>
                            <select id="users" name="users"
                                class="form-control select2 @error('users') is-invalid @enderror">
                                <option value="">-- Pilih Mentor --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('users') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('users')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="divisis">Pilih Divisi</label>
                            <select id="divisis" name="divisis[]"
                                class="form-control select2 @error('divisis') is-invalid @enderror" multiple>
                                @foreach ($divisis as $divisi)
                                    <option value="{{ $divisi->id }}"
                                        {{ in_array($divisi->id, old('divisis', [])) ? 'selected' : '' }}>
                                        {{ $divisi->nama_divisi }}</option>
                                @endforeach
                            </select>
                            @error('divisis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('divisi-mentor.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users').select2({
                placeholder: "Pilih Mentor",
                allowClear: true
            });

            $('#divisis').select2({
                placeholder: "Pilih satu atau lebih Divisi",
                allowClear: true
            });
        });
    </script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
