@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Nilai Pendaftar</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Nilai</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('list-nilai.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="divisi_id" value="{{ $divisiId }}">
                        <div class="form-group">
                            <label for="pendaftar_id">Pendaftar</label>
                            <select name="pendaftar_id" id="pendaftar_id" class="form-control select2" required>
                                <option value="">Pilih Pendaftar</option>
                                @foreach ($pendaftars as $pendaftar)
                                    <option value="{{ $pendaftar->id }}">
                                        {{ $pendaftar->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @switch($divisiId)
                            @case(1)
                                <div id="kriteria-backend">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_1">Memiliki pengetahuan yang luas dalam arsitektur
                                                    software</label>
                                                <input type="number" name="kriteria_1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_2">Memahami cara deployment ke server menjadi nilai
                                                    tambah</label>
                                                <input type="number" name="kriteria_2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_3">Memahami penggunaan kontrol versi seperti Git</label>
                                                <input type="number" name="kriteria_3" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_4">Memiliki pengetahuan tentang functional dan object oriented
                                                    programming</label>
                                                <input type="number" name="kriteria_4" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_5">Memahami bahasa pemrograman seperti PHP, dan NodeJS</label>
                                                <input type="number" name="kriteria_5" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_6">Memahami Sql database</label>
                                                <input type="number" name="kriteria_6" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(2)
                                <div id="kriteria-frontend">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_7">Memahami HTML, CSS, dan
                                                    Javascript</label>
                                                <input type="number" name="kriteria_7" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_8">Memahami cara menggunakan control
                                                    versi seperti Git</label>
                                                <input type="number" name="kriteria_8" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_9">Memahami konsep REST API</label>
                                                <input type="number" name="kriteria_9" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_10">Memahami beberapa framework yang
                                                    sering digunakan seperti Taliwind
                                                    Boostrap, VueJS atau ReactJS</label>
                                                <input type="number" name="kriteria_10" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_10">Memahami proses pembuatan website
                                                    dengan menggunakan metode responsive web
                                                    design</label>
                                                <input type="number" name="kriteria_11" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(3)
                                <div id="kriteria-divisi-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_12">Memiliki pengalaman dengan Library dan API</label>
                                                <input type="number" name="kriteria_12" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_13">Mampu memecahkan masalah dengan baik</label>
                                                <input type="number" name="kriteria_13" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_14">Mampu menafsirkan dan mengikuti rencana teknis</label>
                                                <input type="number" name="kriteria_14" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_15">Memahami penggunaan Flutter, Android Studio, dll</label>
                                                <input type="number" name="kriteria_15" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(4)
                                <div id="kriteria-divisi-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_16">Melakukan riset untuk user experience yang baik</label>
                                                <input type="number" name="kriteria_16" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_17">Memahami perilaku android dan iOS dan Web</label>
                                                <input type="number" name="kriteria_17" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_18">Kompeten dalam pembuatan user flow pada sebuah aplikasi</label>
                                                <input type="number" name="kriteria_18" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_19">Membuat solusi desain dengan memerhatikan fungsional, keindahan, dan interaktif</label>
                                                <input type="number" name="kriteria_19" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_20">Familiar dan bisa menggunakan design tools seperti Figma, Adobe XD</label>
                                                <input type="number" name="kriteria_20" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_21">Melakukan usability testing & mempresentasikan hasil test design kepada stakeholder</label>
                                                <input type="number" name="kriteria_21" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(5)
                                <div id="kriteria-divisi-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_22">Memiliki kemampuan problem solving & komunikasi yang baik</label>
                                                <input type="number" name="kriteria_22" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_23">Memiliki pemahaman yang kuat tentang statistik dan matematika</label>
                                                <input type="number" name="kriteria_23" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_24">Memiliki pemahaman terkait model data, pengembangan design database, teknik data mining dan segmentasi</label>
                                                <input type="number" name="kriteria_24" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_25">Memiliki kemampuan dalam menyajikan informasi melalui bagan dan grafik dengan menggunakan tools seperti Tableau dan lain-lain</label>
                                                <input type="number" name="kriteria_25" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_26">Mampu menggunakan tools analisis seperti SQL, XML, JavaScript dan sebagainya</label>
                                                <input type="number" name="kriteria_26" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_27">Pemahaman bahasa pemrograman menjadi nilai tambah</label>
                                                <input type="number" name="kriteria_27" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(6)
                                <div id="kriteria-divisi-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_28">Good Personality</label>
                                                <input type="number" name="kriteria_28" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_29">Tegas dan Bijak dalam menentukan suatu keputusan</label>
                                                <input type="number" name="kriteria_29" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_30">Cepat dalam menjalankan tugas dan kewajiban</label>
                                                <input type="number" name="kriteria_30" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_31">Memiliki komitmen dan pendirian yang kuat</label>
                                                <input type="number" name="kriteria_31" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_32">Memiliki komunikasi yang sangat bagus</label>
                                                <input type="number" name="kriteria_32" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_33">Memiliki relasi yang cukup luas</label>
                                                <input type="number" name="kriteria_33" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_34">Mampu untuk berpikir kritis</label>
                                                <input type="number" name="kriteria_34" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(7)
                                <div id="kriteria-divisi-7">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_35">Mampu mengembangkan ide secara komunikatif, strategis & inovatif</label>
                                                <input type="number" name="kriteria_35" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_36">Memahami penggunaan social media terkini seperti Instagram, TikTok, YouTube, LinkedIn, dll.</label>
                                                <input type="number" name="kriteria_36" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_37">Memiliki analytical thinking dan problem solving yang baik</label>
                                                <input type="number" name="kriteria_37" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_38">Mengetahui SEO/SEM</label>
                                                <input type="number" name="kriteria_38" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_39">Mengetahui dan mampu menggunakan tools pendukung sesuai kebutuhan seperti Google Workspace, Trello, Web Analytics, SEO tools, dll.</label>
                                                <input type="number" name="kriteria_39" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_40">Memiliki salah satu skill yang dibutuhkan, antara lain Konten Kreator, Video Editing, Copywriting, atau Digital marketing Ads.</label>
                                                <input type="number" name="kriteria_40" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(8)
                                <div id="kriteria-divisi-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_41">Mampu mengembangkan ide secara komunikatif, strategis & inovatif</label>
                                                <input type="number" name="kriteria_41" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_42">Memahami penggunaan social media terkini seperti Instagram, TikTok, YouTube, LinkedIn, dll.</label>
                                                <input type="number" name="kriteria_42" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_43">Memiliki analytical thinking dan problem solving yang baik</label>
                                                <input type="number" name="kriteria_43" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_44">Mengetahui SEO/SEM</label>
                                                <input type="number" name="kriteria_44" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_45">Mengetahui dan mampu menggunakan tools pendukung sesuai kebutuhan seperti Google Workspace, Trello, Web Analytics, SEO tools, dll.</label>
                                                <input type="number" name="kriteria_45" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kriteria_46">Memiliki salah satu skill yang dibutuhkan, antara lain Konten Kreator, Video Editing, Copywriting, atau Digital marketing Ads.</label>
                                                <input type="number" name="kriteria_46" class="form-control">
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
