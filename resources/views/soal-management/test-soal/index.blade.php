@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Soal Tes Pendaftar</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Test Soal Pendaftar</h4>
                </div>
                <div class="card-body">
                    @if ($soalPendaftars->isEmpty())
                        <p class="text-center">Tidak ada soal untuk pendaftar.</p>
                    @else
                        @foreach ($soalPendaftars as $soalPendaftar)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <div class="article-image small-article-image"
                                            data-background="{{ asset('assets/img/news/images20.png') }}">
                                        </div>
                                        <div class="article-badge">
                                            @if ($soalPendaftar->status == 'Sedang Dikerjakan')
                                                <div class="article-badge-item bg-danger"><i class="fas fa-times"></i>
                                                    {{ $soalPendaftar->status }}</div>
                                            @else
                                                <div class="article-badge-item bg-success"><i class="fas fa-check"></i>
                                                    {{ $soalPendaftar->status }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-title">
                                            <h2><a href="#">{{ $soalPendaftar->soal->judul_soal }}</a></h2>
                                        </div>
                                        <p>Klik Kerjakan Untuk Melihat Detail Soal Test</p>
                                        <div class="article-cta">
                                            <a href="{{ route('test-soal.show', $soalPendaftar->id) }}">Kerjakan <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                </div>
                <div class="card-footer">
                    <p class="mb-0">Selamat mengerjakan!</p>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
    <style>
        .article .article-header .article-image {
            background-color: #fbfbfb;
            background-position: center;
            background-size: contain;
            /* Change to 'contain' to fit the image within the container */
            background-repeat: no-repeat;
            width: 100%;
            height: 150px;
            /* Set a specific height to maintain aspect ratio */
        }

        .card-footer {
            background-color: #f8f9fa;
            padding: 1rem;
            border-top: 1px solid #e9ecef;
            text-align: center;
        }
    </style>
@endpush
