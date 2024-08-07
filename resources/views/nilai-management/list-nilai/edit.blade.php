@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Nilai Pendaftar</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Validasi Edit Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('list-nilai.update', $listNilai->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="divisi_id" value="{{ $divisiId }}">
                        <div class="form-group">
                            <label for="pendaftar_id">Pendaftar</label>
                            <select name="pendaftar_id_disabled" id="pendaftar_id" class="form-control select2" required
                                disabled>
                                <option value="{{ $pendaftar->id }}" selected>{{ $pendaftar->user->name }}</option>
                            </select>
                            <input type="hidden" name="pendaftar_id" value="{{ $pendaftar->id }}">

                        </div>
                        @php
                            $kriteria = [
                                1 => [
                                    'Memiliki pengetahuan yang luas dalam arsitektur software',
                                    'Memahami cara deployment ke server menjadi nilai tambah',
                                    'Memahami penggunaan kontrol versi seperti Git',
                                    'Memiliki pengetahuan tentang functional dan object oriented programming',
                                    'Memahami bahasa pemrograman seperti PHP, dan NodeJS',
                                    'Memahami SQL database',
                                ],
                                2 => [
                                    'Memahami HTML, CSS, dan Javascript',
                                    'Memahami cara menggunakan control versi seperti Git',
                                    'Memahami konsep REST API',
                                    'Memahami beberapa framework yang sering digunakan seperti Tailwind, Bootstrap, VueJS atau ReactJS',
                                    'Memahami proses pembuatan website dengan menggunakan metode responsive web design',
                                ],
                                3 => [
                                    'Memiliki pengalaman dengan Library dan API',
                                    'Mampu memecahkan masalah dengan baik',
                                    'Mampu menafsirkan dan mengikuti rencana teknis',
                                    'Memahami penggunaan Flutter, Android Studio, dll',
                                ],
                                4 => [
                                    'Melakukan riset untuk user experience yang baik',
                                    'Memahami perilaku android dan iOS dan Web',
                                    'Kompeten dalam pembuatan user flow pada sebuah aplikasi',
                                    'Membuat solusi desain dengan memerhatikan fungsional, keindahan, dan interaktif',
                                    'Familiar dan bisa menggunakan design tools seperti Figma, Adobe XD',
                                    'Melakukan usability testing & mempresentasikan hasil test design kepada stakeholder',
                                ],
                                5 => [
                                    'Memiliki kemampuan problem solving & komunikasi yang baik',
                                    'Memiliki pemahaman yang kuat tentang statistik dan matematika',
                                    'Memiliki pemahaman terkait model data, pengembangan design database, teknik data mining dan segmentasi',
                                    'Memiliki kemampuan dalam menyajikan informasi melalui bagan dan grafik dengan menggunakan tools seperti Tableau dan lain-lain',
                                    'Mampu menggunakan tools analisis seperti SQL, XML, JavaScript dan sebagainya',
                                    'Pemahaman bahasa pemrograman menjadi nilai tambah',
                                ],
                                6 => [
                                    'Good Personality',
                                    'Tegas dan Bijak dalam menentukan suatu keputusan',
                                    'Cepat dalam menjalankan tugas dan kewajiban',
                                    'Memiliki komitmen dan pendirian yang kuat',
                                    'Memiliki komunikasi yang sangat bagus',
                                    'Memiliki relasi yang cukup luas',
                                    'Mampu untuk berpikir kritis',
                                ],
                                7 => [
                                    'Mampu mengembangkan ide secara komunikatif, strategis & inovatif',
                                    'Memahami penggunaan social media terkini seperti Instagram, TikTok, YouTube, LinkedIn, dll.',
                                    'Memiliki analytical thinking dan problem solving yang baik',
                                    'Mengetahui SEO/SEM',
                                    'Mengetahui dan mampu menggunakan tools pendukung sesuai kebutuhan seperti Google Workspace, Trello, Web Analytics, SEO tools, dll.',
                                    'Memiliki salah satu skill yang dibutuhkan, antara lain Konten Kreator, Video Editing, Copywriting, atau Digital marketing Ads.',
                                ],
                                8 => [
                                    'Memiliki kemampuan problem solving & komunikasi yang baik',
                                    'Memiliki pemahaman dasar mengenai prinsip desain',
                                    'Mampu memahami dan membuat blueprint sesuai dengan kebutuhan user',
                                    'Mampu menggunakan software grafis Adobe illustrator, photoshop dan Figma',
                                ],
                            ];

                            $indexCounter = 0;
                        @endphp

                        @switch($divisiId)
                            @case(1)
                                @php $indexCounter = 0; @endphp
                                <div id="kriteria-backend">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @foreach ($kriteria[1] as $index => $kriteriaLabel)
                                                @php $indexCounter++; @endphp
                                                <section class="kriteria-section">
                                                    <div class="form-group">
                                                        <label for="kriteria_{{ $indexCounter }}"
                                                            style="font-size: 14px">{{ $kriteriaLabel }}</label>
                                                        <input type="number" id="kriteria_{{ $indexCounter }}"
                                                            name="kriteria_{{ $indexCounter }}" class="form-control" min="0"
                                                            max="100" required
                                                            value="{{ $listNilai->{'kriteria_' . $indexCounter} }}">
                                                    </div>
                                                </section>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4 grading-scale">
                                            <div class="form-group" style="font-size: 14px;">
                                                <div
                                                    style="border: 2px solid #007bff; padding: 10px; border-radius: 5px; text-align: justify;">
                                                    <label for="nilai_1" style="font-size: 14px; font-weight: bold;">Keterangan
                                                        Nilai:</label>
                                                    <div>
                                                        <ul>
                                                            <li><strong>
                                                                    < 60:</strong> Kurang</li>
                                                            <li><strong>61-70:</strong> Cukup</li>
                                                            <li><strong>71-80:</strong> Memuaskan</li>
                                                            <li><strong>81-90:</strong> Baik Sekali</li>
                                                            <li><strong>91-100:</strong> Luar Biasa</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(2)
                                @php $indexCounter = 6; @endphp
                                <div id="kriteria-frontend">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @foreach ($kriteria[2] as $index => $kriteriaLabel)
                                                @php $indexCounter++; @endphp
                                                <section class="kriteria-section">
                                                    <div class="form-group">
                                                        <label for="kriteria_{{ $indexCounter }}"
                                                            style="font-size: 14px">{{ $kriteriaLabel }}</label>
                                                        <input type="number" id="kriteria_{{ $indexCounter }}"
                                                            name="kriteria_{{ $indexCounter }}" class="form-control" min="0"
                                                            max="100" required
                                                            value="{{ $listNilai->{'kriteria_' . $indexCounter} }}">
                                                    </div>
                                                </section>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4 grading-scale">
                                            <div class="form-group" style="font-size: 14px;">
                                                <div
                                                    style="border: 2px solid #007bff; padding: 10px; border-radius: 5px; text-align: justify;">
                                                    <label for="nilai_1" style="font-size: 14px; font-weight: bold;">Keterangan
                                                        Nilai:</label>
                                                    <div>
                                                        <ul>
                                                            <li><strong>
                                                                    < 60:</strong> Kurang</li>
                                                            <li><strong>61-70:</strong> Cukup</li>
                                                            <li><strong>71-80:</strong> Memuaskan</li>
                                                            <li><strong>81-90:</strong> Baik Sekali</li>
                                                            <li><strong>91-100:</strong> Luar Biasa</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(3)
                                @php $indexCounter = 11; @endphp
                                <div id="kriteria-mobile-development">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @foreach ($kriteria[3] as $index => $kriteriaLabel)
                                                @php $indexCounter++; @endphp
                                                <section class="kriteria-section">
                                                    <div class="form-group">
                                                        <label for="kriteria_{{ $indexCounter }}"
                                                            style="font-size: 14px">{{ $kriteriaLabel }}</label>
                                                        <input type="number" id="kriteria_{{ $indexCounter }}"
                                                            name="kriteria_{{ $indexCounter }}" class="form-control" min="0"
                                                            max="100" required
                                                            value="{{ $listNilai->{'kriteria_' . $indexCounter} }}">
                                                    </div>
                                                </section>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4 grading-scale">
                                            <div class="form-group" style="font-size: 14px;">
                                                <div
                                                    style="border: 2px solid #007bff; padding: 10px; border-radius: 5px; text-align: justify;">
                                                    <label for="nilai_1" style="font-size: 14px; font-weight: bold;">Keterangan
                                                        Nilai:</label>
                                                    <div>
                                                        <ul>
                                                            <li><strong>
                                                                    < 60:</strong> Kurang</li>
                                                            <li><strong>61-70:</strong> Cukup</li>
                                                            <li><strong>71-80:</strong> Memuaskan</li>
                                                            <li><strong>81-90:</strong> Baik Sekali</li>
                                                            <li><strong>91-100:</strong> Luar Biasa</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(4)
                                @php $indexCounter = 15; @endphp
                                <div id="kriteria-uiux">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @foreach ($kriteria[4] as $index => $kriteriaLabel)
                                                @php $indexCounter++; @endphp
                                                <section class="kriteria-section">
                                                    <div class="form-group">
                                                        <label for="kriteria_{{ $indexCounter }}"
                                                            style="font-size: 14px">{{ $kriteriaLabel }}</label>
                                                        <input type="number" id="kriteria_{{ $indexCounter }}"
                                                            name="kriteria_{{ $indexCounter }}" class="form-control" min="0"
                                                            max="100" required
                                                            value="{{ $listNilai->{'kriteria_' . $indexCounter} }}">
                                                    </div>
                                                </section>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4 grading-scale">
                                            <div class="form-group" style="font-size: 14px;">
                                                <div
                                                    style="border: 2px solid #007bff; padding: 10px; border-radius: 5px; text-align: justify;">
                                                    <label for="nilai_1" style="font-size: 14px; font-weight: bold;">Keterangan
                                                        Nilai:</label>
                                                    <div>
                                                        <ul>
                                                            <li><strong>
                                                                    < 60:</strong> Kurang</li>
                                                            <li><strong>61-70:</strong> Cukup</li>
                                                            <li><strong>71-80:</strong> Memuaskan</li>
                                                            <li><strong>81-90:</strong> Baik Sekali</li>
                                                            <li><strong>91-100:</strong> Luar Biasa</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(5)
                                @php $indexCounter = 21; @endphp
                                <div id="kriteria-system-analyst">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @foreach ($kriteria[5] as $index => $kriteriaLabel)
                                                @php $indexCounter++; @endphp
                                                <section class="kriteria-section">
                                                    <div class="form-group">
                                                        <label for="kriteria_{{ $indexCounter }}"
                                                            style="font-size: 14px">{{ $kriteriaLabel }}</label>
                                                        <input type="number" id="kriteria_{{ $indexCounter }}"
                                                            name="kriteria_{{ $indexCounter }}" class="form-control"
                                                            min="0" max="100" required
                                                            value="{{ $listNilai->{'kriteria_' . $indexCounter} }}">
                                                    </div>
                                                </section>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4 grading-scale">
                                            <div class="form-group" style="font-size: 14px;">
                                                <div
                                                    style="border: 2px solid #007bff; padding: 10px; border-radius: 5px; text-align: justify;">
                                                    <label for="nilai_1" style="font-size: 14px; font-weight: bold;">Keterangan
                                                        Nilai:</label>
                                                    <div>
                                                        <ul>
                                                            <li><strong>
                                                                    < 60:</strong> Kurang</li>
                                                            <li><strong>61-70:</strong> Cukup</li>
                                                            <li><strong>71-80:</strong> Memuaskan</li>
                                                            <li><strong>81-90:</strong> Baik Sekali</li>
                                                            <li><strong>91-100:</strong> Luar Biasa</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(6)
                                @php $indexCounter = 27; @endphp
                                <div id="kriteria-management">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @foreach ($kriteria[6] as $index => $kriteriaLabel)
                                                @php $indexCounter++; @endphp
                                                <section class="kriteria-section">
                                                    <div class="form-group">
                                                        <label for="kriteria_{{ $indexCounter }}"
                                                            style="font-size: 14px">{{ $kriteriaLabel }}</label>
                                                        <input type="number" id="kriteria_{{ $indexCounter }}"
                                                            name="kriteria_{{ $indexCounter }}" class="form-control"
                                                            min="0" max="100" required
                                                            value="{{ $listNilai->{'kriteria_' . $indexCounter} }}">
                                                    </div>
                                                </section>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4 grading-scale">
                                            <div class="form-group" style="font-size: 14px;">
                                                <div
                                                    style="border: 2px solid #007bff; padding: 10px; border-radius: 5px; text-align: justify;">
                                                    <label for="nilai_1" style="font-size: 14px; font-weight: bold;">Keterangan
                                                        Nilai:</label>
                                                    <div>
                                                        <ul>
                                                            <li><strong>
                                                                    < 60:</strong> Kurang</li>
                                                            <li><strong>61-70:</strong> Cukup</li>
                                                            <li><strong>71-80:</strong> Memuaskan</li>
                                                            <li><strong>81-90:</strong> Baik Sekali</li>
                                                            <li><strong>91-100:</strong> Luar Biasa</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(7)
                                @php $indexCounter = 34; @endphp
                                <div id="kriteria-media-advertising">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @foreach ($kriteria[7] as $index => $kriteriaLabel)
                                                @php $indexCounter++; @endphp
                                                <section class="kriteria-section">
                                                    <div class="form-group">
                                                        <label for="kriteria_{{ $indexCounter }}"
                                                            style="font-size: 14px">{{ $kriteriaLabel }}</label>
                                                        <input type="number" id="kriteria_{{ $indexCounter }}"
                                                            name="kriteria_{{ $indexCounter }}" class="form-control"
                                                            min="0" max="100" required
                                                            value="{{ $listNilai->{'kriteria_' . $indexCounter} }}">
                                                    </div>
                                                </section>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4 grading-scale">
                                            <div class="form-group" style="font-size: 14px;">
                                                <div
                                                    style="border: 2px solid #007bff; padding: 10px; border-radius: 5px; text-align: justify;">
                                                    <label for="nilai_1" style="font-size: 14px; font-weight: bold;">Keterangan
                                                        Nilai:</label>
                                                    <div>
                                                        <ul>
                                                            <li><strong>
                                                                    < 60:</strong> Kurang</li>
                                                            <li><strong>61-70:</strong> Cukup</li>
                                                            <li><strong>71-80:</strong> Memuaskan</li>
                                                            <li><strong>81-90:</strong> Baik Sekali</li>
                                                            <li><strong>91-100:</strong> Luar Biasa</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(8)
                                @php $indexCounter = 40; @endphp
                                <div id="kriteria-icon-illustration">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @foreach ($kriteria[8] as $index => $kriteriaLabel)
                                                @php $indexCounter++; @endphp
                                                <section class="kriteria-section">
                                                    <div class="form-group">
                                                        <label for="kriteria_{{ $indexCounter }}"
                                                            style="font-size: 14px">{{ $kriteriaLabel }}</label>
                                                        <input type="number" id="kriteria_{{ $indexCounter }}"
                                                            name="kriteria_{{ $indexCounter }}" class="form-control"
                                                            min="0" max="100" required
                                                            value="{{ $listNilai->{'kriteria_' . $indexCounter} }}">
                                                    </div>
                                                </section>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4 grading-scale">
                                            <div class="form-group" style="font-size: 14px;">
                                                <div
                                                    style="border: 2px solid #007bff; padding: 10px; border-radius: 5px; text-align: justify;">
                                                    <label for="nilai_1" style="font-size: 14px; font-weight: bold;">Keterangan
                                                        Nilai:</label>
                                                    <div>
                                                        <ul>
                                                            <li><strong>
                                                                    < 60:</strong> Kurang</li>
                                                            <li><strong>61-70:</strong> Cukup</li>
                                                            <li><strong>71-80:</strong> Memuaskan</li>
                                                            <li><strong>81-90:</strong> Baik Sekali</li>
                                                            <li><strong>91-100:</strong> Luar Biasa</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @default
                                <div>Tidak ada kriteria untuk divisi ini.</div>
                        @endswitch

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary"
                                href="{{ route('list-nilai.index', ['divisi_id' => $divisiId]) }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.select2').select2();
        });
    </script>
@endpush

@push('customStyle')
    <style>
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .kriteria-section {
            margin-bottom: 30px;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 10px;
        }

        .kriteria-section:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
