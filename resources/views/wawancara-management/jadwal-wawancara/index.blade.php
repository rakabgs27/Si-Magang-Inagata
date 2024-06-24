@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Jadwal Wawancara</h1>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if ($listWawancara->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Tidak Ada Data Wawancara.
                        </div>
                    @else
                        @foreach ($listWawancara as $listItem)
                            <div class="card card-primary">
                                <div class="card-body">
                                    <fieldset class="detail-box">
                                        <legend>Detail Wawancara Pendaftar</legend>
                                        <div class="d-flex justify-content-around p-3">
                                            <div>
                                                <strong style="font-size: 16px;">
                                                    <i class="fas fa-calendar-week"></i> Tanggal Wawancara:
                                                </strong>
                                                <span style="font-size: 16px;">{{ \Carbon\Carbon::parse($listItem->tanggal_wawancara)->translatedFormat('d F Y \J\a\m H:i') }}</span>
                                            </div>
                                            <div>
                                                <strong style="font-size: 16px;">Deskripsi:</strong>
                                                <span style="font-size: 16px;">{{ strip_tags($listItem->deskripsi) }}</span>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
    <style>
        .detail-box {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            margin-top: -10px;
            /* Tambahkan margin negatif untuk menggeser ke atas */
        }

        .detail-box legend {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            padding: 0 10px;
            margin-bottom: 10px;
        }

        .detail-box .p-3 {
            font-size: 16px;
        }

        @media (max-width: 767px) {
            .detail-box {
                margin: 5px 0;
                padding: 10px;
            }
        }
    </style>
@endpush
