@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Test Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Soal Management</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Detail Test Soal</h4>
                </div>
                <div class="card-body">
                    @foreach ($soalPendaftars as $soalPendaftar)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <article class="article article-style-b">
                                <div class="article-header">
                                    <div class="article-image small-article-image"
                                        data-background="{{ asset('assets/img/news/images20.png') }}">
                                    </div>
                                    <div class="article-badge">
                                        <div class="article-badge-item bg-danger"><i class="fas fa-times"></i>Sedang Dikerjakan</div>
                                    </div>
                                </div>
                                <div class="article-details">
                                    <div class="article-title">
                                        <h2><a href="#">{{ $soalPendaftar->soal->judul_soal }}</a></h2>
                                    </div>
                                    <p>{{ strip_tags($soalPendaftar->deskripsi_tugas) }}</p>
                                    <div class="article-cta">
                                        <a href="#">Kerjakan <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                </div>
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
    </style>
@endpush
