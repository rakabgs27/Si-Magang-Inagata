@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Assign Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ $assignSoal->soal->judul_soal  }}</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Detail Assign Soal</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nama Pendaftar:</strong> {{ $assignSoal->pendaftar->user->name }}</p>
                    <p><strong>Judul Soal:</strong> {{ $assignSoal->soal->judul_soal }}</p>
                    <p><strong>Deskripsi Tugas:</strong> {{ strip_tags($assignSoal->deskripsi_tugas) }}</p>
                    <p><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($assignSoal->tanggal_mulai)->format('d F Y H:i:s') }}</p>
                    <p><strong>Tanggal Akhir:</strong> {{ \Carbon\Carbon::parse($assignSoal->tanggal_akhir)->format('d F Y H:i:s') }}</p>
                    <ul>
                        @foreach ($fileData as $file)
                            <li><a href="{{ $file['url'] }}" target="_blank">{{ $file['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('assign-soal.index') }}">Cancel</a>
                </div>
            </div>
        </div>
    </section>
@endsection
