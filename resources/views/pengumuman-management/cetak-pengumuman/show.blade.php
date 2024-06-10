@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pengumuman</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ $simpanHasilAkhirRecords->created_at->translatedFormat('d F Y') }}</h2>

            <div class="card">
                <div class="card-header d-print-none">
                    <div class="d-flex justify-content-between" style="width: 100%">
                        <h4>Hasil Pengumuman</h4>
                        <button class="btn btn-primary" onclick="window.print()">Print</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Nama Divisi</th>
                                    <th>Status Pengumuman</th>
                                </tr>
                                @foreach ($listPengumuman as $key => $listItem)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $listItem->pendaftar->user->name }}</td>
                                        <td>{{ $listItem->pendaftar->divisi->nama_divisi }}</td>
                                        <td
                                            class="status {{ $listItem->status === 'Tidak Lolos' ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">
                                            {{ $listItem->status }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-print-none">
                    <a class="btn btn-secondary" href="{{ route('cetak-pengumuman.index') }}">Cancel</a>
                </div>
            </div>
        </div>
    </section>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .section-body,
            .section-body * {
                visibility: visible;
            }

            .section-body {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: auto;
            }
        }
    </style>
@endsection
