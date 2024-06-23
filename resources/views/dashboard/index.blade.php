@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="row">
            @role('manager')
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pendaftar Terverifikasi</h4>
                            </div>
                            <div class="card-body">
                                <h4>{{ number_format($totalTerverifikasi, 0, '.', '.') }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pendaftar Pending</h4>
                            </div>
                            <div class="card-body">
                                <h4>{{ number_format($totalPending, 0, '.', '.') }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pendaftar Tertolak</h4>
                            </div>
                            <div class="card-body">
                                <h4>{{ number_format($totalTertolak, 0, '.', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endrole
            @role('mentor')
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pendaftar Sudah Dinilai</h4>
                            </div>
                            <div class="card-body">
                                <h4>{{ number_format($totalSudahDinilai, 0, '.', '.') }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pendaftar Belum Dinilai</h4>
                            </div>
                            <div class="card-body">
                                <h4>{{ number_format($totalBelumDinilai, 0, '.', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endrole
        </div>
        {{-- <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Line Chart Penggunaan Riwayat</h4>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center" style="height: 300px;">
                        <canvas id="myChart" width="400" height="300" class="d-none"></canvas>
                        <div id="lineChartEmpty" class="text-center text-muted" style="font-size: 1.5em;">Data Kosong</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Klasifikasi Penyakit</h4>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center" style="height: 300px;">
                        <canvas id="myPieChart" width="400" height="400" class="d-none"></canvas>
                        <div id="pieChartEmpty" class="text-center text-muted" style="font-size: 1.5em;">Data Kosong</div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
@endsection
@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
{{-- @push('customScript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lineChartEmpty = document.getElementById('lineChartEmpty');
            var myChartCanvas = document.getElementById('myChart');
            var pieChartEmpty = document.getElementById('pieChartEmpty');
            var myPieChartCanvas = document.getElementById('myPieChart');

            // Line Chart
            var lineChartData = @json($jumlahLineChart);
            if (lineChartData.length > 0 && lineChartData.some(value => value !== 0)) {
                lineChartEmpty.classList.add('d-none');
                myChartCanvas.classList.remove('d-none');

                var ctx = myChartCanvas.getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($tanggalLineChart),
                        datasets: [{
                            label: 'Aktivitas Diagnosa 10 Hari Terakhir',
                            data: lineChartData,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            var pieChartData = @json($dataPieChart);
            if (pieChartData.length > 0 && pieChartData.some(value => value !== 0)) {
                pieChartEmpty.classList.add('d-none');
                myPieChartCanvas.classList.remove('d-none');

                var ctxPie = myPieChartCanvas.getContext('2d');
                var myPieChart = new Chart(ctxPie, {
                    type: 'pie',
                    data: {
                        labels: @json($labelPieChart),
                        datasets: [{
                            label: 'Disease Frequency',
                            data: pieChartData,
                            backgroundColor: [
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 159, 64, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Klasifikasi Penyakit berdasarkan Nama Penyakit'
                            }
                        }
                    }
                });
            }
        });
    </script>
@endpush --}}
