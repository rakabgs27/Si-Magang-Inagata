@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Soal Tes Pendaftar</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Soal</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nama Pendaftar:</strong> {{ $testSoal->pendaftar->user->name }}</p>
                    <p><strong>Judul Soal:</strong> {{ $soal->judul_soal }}</p>
                    <p><strong>Deskripsi Tugas:</strong> {{ strip_tags($testSoal->deskripsi_tugas) }}</p>
                    <p><strong>Tanggal Mulai:</strong>
                        {{ \Carbon\Carbon::parse($testSoal->tanggal_mulai)->format('d F Y H:i:s') }}</p>
                    <p><strong>Tanggal Akhir:</strong>
                        {{ \Carbon\Carbon::parse($testSoal->tanggal_akhir)->format('d F Y H:i:s') }}</p>
                    <ul>
                        @foreach ($fileData as $file)
                            <li><a href="{{ $file['url'] }}" target="_blank">{{ $file['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary mr-2" href="{{ route('test-jawaban.show', $testSoal->id) }}">Kumpulkan Jawaban</a>
                    <a class="btn btn-secondary" href="{{ route('test-soal.index') }}">Cancel</a>
                </div>
            </div>
        </div>
    </section>
@endsection
