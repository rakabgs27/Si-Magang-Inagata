@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ $soal->judul_soal }}</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Detail Soal</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nama Mentor :</strong> {{ $soal->user->name }}</p>
                    <p><strong>Divisi :</strong> {{ $soal->divisi->nama_divisi }}</p>
                    <p><strong>Deskripsi :</strong> {{ strip_tags($soal->deskripsi_soal) }}</p>
                    <p><strong>Tanggal Upload :</strong>
                        {{ \Carbon\Carbon::parse($soal->tanggal_upload)->format('d F Y H:i:s') }}</p>
                    @if ($fileData->isNotEmpty())
                        <p><strong>File Soal :</strong></p>
                        <ul>
                            @foreach ($fileData as $file)
                                <li><a href="{{ $file['url'] }}">{{ $file['name'] }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('list-soal.index') }}">Cancel</a>
                </div>
            </div>
        </div>
    </section>
@endsection
