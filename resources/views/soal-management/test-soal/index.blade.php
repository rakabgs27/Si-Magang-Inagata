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
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article article-style-b">
                            <div class="article-header">
                                <div class="article-image small-article-image"
                                    data-background="{{ asset('assets/img/news/images20.png') }}">
                                </div>
                                <div class="article-badge">
                                    <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. </p>
                                <div class="article-cta">
                                    <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('assign-soal.index') }}">Cancel</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('customStyle')
    <style>
        .small-article-image {
            width: 100px;
            height: 100px;
            /* Set your desired height */
            background-size: cover;
            /* Ensure the image covers the entire area */
            background-position: center;
            /* Center the image */
        }
    </style>
@endpush
