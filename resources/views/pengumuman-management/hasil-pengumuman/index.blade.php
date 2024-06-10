@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Hasil Pengumuman</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if (isset($message))
                        <div class="alert alert-warning" role="alert">
                            {{ $message }}
                        </div>
                    @else
                        @if ($pengumuman)
                            <div class="card card-primary">
                                <div class="card-body">
                                    @if ($pengumuman->status == 'Lolos')
                                        <div class="alert alert-success font-weight-bold" role="alert">
                                            Selamat! Anda lolos.
                                        </div>
                                    @elseif ($pengumuman->status == 'Tidak Lolos')
                                        <div class="alert alert-danger font-weight-bold" role="alert">
                                            Maaf, Anda tidak lolos. Jangan patah semangat!
                                        </div>
                                    @else
                                        <div class="alert alert-warning font-weight-bold" role="alert">
                                            Status Anda masih pending. Harap menunggu pengumuman lebih lanjut.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Tidak ada hasil pengumuman yang ditemukan.
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
