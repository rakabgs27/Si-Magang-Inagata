@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Assign Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title"></h2>
            <div class="card">
                <div class="card-header">
                    <h4>Detail Assign Soal</h4>
                </div>
                <div class="card-body">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article article-style-b">
                          <div class="article-header">
                            <div class="article-image" data-background="assets/img/news/img13.jpg">
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
