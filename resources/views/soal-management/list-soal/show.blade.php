@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ $soal->judul_soal }}</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Deskripsi Soal</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nama Mentor:</strong> {{ $soal->user->name }}</p>
                    <p><strong>Divisi:</strong> {{ $soal->divisi->nama_divisi }}</p>
                    <p><strong>Deskripsi:</strong> {{ $soal->deskripsi_soal }}</p>
                    <p><strong>Tanggal Upload:</strong> {{ \Carbon\Carbon::parse($soal->tanggal_upload)->format('d F Y H:i:s') }}</p>
                    <!-- Tampilkan file jika ada -->
                    @if ($fileSoalUrl)
                        <p><strong>File Soal:</strong> <a href="{{ $fileSoalUrl }}">Download</a></p>
                    @endif
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('list-soal.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </section>
@endsection
