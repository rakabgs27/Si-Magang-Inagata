@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengelolaan Divisi</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form action="{{ route('list-divisi.update', $list_divisi) }}" method="POST">
                    <div class="card-header">
                        <h4>Validasi Edit Data Divisi</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror"
                                id="nama_divisi" name="nama_divisi" value="{{ $list_divisi->nama_divisi }}">
                            @error('nama_divisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('list-divisi.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
