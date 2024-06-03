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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kriteria_1" style="font-size: 14px">Memiliki pengetahuan yang luas dalam
                                                    arsitektur
                                                    software</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_1_1" name="kriteria_1" value="kurang">
                                                    <label for="kriteria_1_1">Kurang</label>

                                                    <input type="radio" id="kriteria_1_2" name="kriteria_1" value="cukup">
                                                    <label for="kriteria_1_2">Cukup</label>

                                                    <input type="radio" id="kriteria_1_3" name="kriteria_1" value="memuaskan">
                                                    <label for="kriteria_1_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_1_4" name="kriteria_1" value="baik sekali">
                                                    <label for="kriteria_1_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_1_5" name="kriteria_1" value="luar biasa">
                                                    <label for="kriteria_1_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_2" style="font-size: 14px">Memahami cara deployment ke server
                                                    menjadi nilai
                                                    tambah</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_2_1" name="kriteria_2" value="kurang">
                                                    <label for="kriteria_2_1">Kurang</label>

                                                    <input type="radio" id="kriteria_2_2" name="kriteria_2" value="cukup">
                                                    <label for="kriteria_2_2">Cukup</label>

                                                    <input type="radio" id="kriteria_2_3" name="kriteria_2" value="memuaskan">
                                                    <label for="kriteria_2_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_2_4" name="kriteria_2" value="baik sekali">
                                                    <label for="kriteria_2_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_2_5" name="kriteria_2" value="luar biasa">
                                                    <label for="kriteria_2_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group" style="font-size: 14px">
                                                <label for="kriteria_3">Memahami penggunaan kontrol versi seperti Git</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_3_1" name="kriteria_3" value="kurang">
                                                    <label for="kriteria_3_1">Kurang</label>

                                                    <input type="radio" id="kriteria_3_2" name="kriteria_3" value="cukup">
                                                    <label for="kriteria_3_2">Cukup</label>

                                                    <input type="radio" id="kriteria_3_3" name="kriteria_3" value="memuaskan">
                                                    <label for="kriteria_3_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_3_4" name="kriteria_3"
                                                        value="baik sekali">
                                                    <label for="kriteria_3_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_3_5" name="kriteria_3"
                                                        value="luar biasa">
                                                    <label for="kriteria_3_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_4" style="font-size: 14px">Memiliki pengetahuan tentang
                                                    functional dan object oriented
                                                    programming</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_4_1" name="kriteria_4" value="kurang">
                                                    <label for="kriteria_4_1">Kurang</label>

                                                    <input type="radio" id="kriteria_4_2" name="kriteria_4" value="cukup">
                                                    <label for="kriteria_4_2">Cukup</label>

                                                    <input type="radio" id="kriteria_4_3" name="kriteria_4" value="memuaskan">
                                                    <label for="kriteria_4_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_4_4" name="kriteria_4"
                                                        value="baik sekali">
                                                    <label for="kriteria_4_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_4_5" name="kriteria_4"
                                                        value="luar biasa">
                                                    <label for="kriteria_4_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_5" style="font-size: 14px">Memahami bahasa pemrograman
                                                    seperti PHP, dan NodeJS</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_5_1" name="kriteria_5" value="kurang">
                                                    <label for="kriteria_5_1">Kurang</label>

                                                    <input type="radio" id="kriteria_5_2" name="kriteria_5" value="cukup">
                                                    <label for="kriteria_5_2">Cukup</label>

                                                    <input type="radio" id="kriteria_5_3" name="kriteria_5" value="memuaskan">
                                                    <label for="kriteria_5_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_5_4" name="kriteria_5"
                                                        value="baik sekali">
                                                    <label for="kriteria_5_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_5_5" name="kriteria_5"
                                                        value="luar biasa">
                                                    <label for="kriteria_5_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_6" style="font-size: 14px">Memahami SQL database</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_6_1" name="kriteria_6" value="kurang">
                                                    <label for="kriteria_6_1">Kurang</label>

                                                    <input type="radio" id="kriteria_6_2" name="kriteria_6" value="cukup">
                                                    <label for="kriteria_6_2">Cukup</label>

                                                    <input type="radio" id="kriteria_6_3" name="kriteria_6" value="memuaskan">
                                                    <label for="kriteria_6_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_6_4" name="kriteria_6"
                                                        value="baik sekali">
                                                    <label for="kriteria_6_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_6_5" name="kriteria_6"
                                                        value="luar biasa">
                                                    <label for="kriteria_6_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(2)
                                <div id="kriteria-frontend">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kriteria_7" style="font-size: 14px">Memahami HTML, CSS, dan
                                                    Javascript</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_7_1" name="kriteria_7" value="kurang">
                                                    <label for="kriteria_7_1">Kurang</label>

                                                    <input type="radio" id="kriteria_7_2" name="kriteria_7" value="cukup">
                                                    <label for="kriteria_7_2">Cukup</label>

                                                    <input type="radio" id="kriteria_7_3" name="kriteria_7" value="memuaskan">
                                                    <label for="kriteria_7_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_7_4" name="kriteria_7"
                                                        value="baik sekali">
                                                    <label for="kriteria_7_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_7_5" name="kriteria_7"
                                                        value="luar biasa">
                                                    <label for="kriteria_7_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_8" style="font-size: 14px">Memahami cara menggunakan control
                                                    versi seperti Git</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_8_1" name="kriteria_8" value="kurang">
                                                    <label for="kriteria_8_1">Kurang</label>

                                                    <input type="radio" id="kriteria_8_2" name="kriteria_8" value="cukup">
                                                    <label for="kriteria_8_2">Cukup</label>

                                                    <input type="radio" id="kriteria_8_3" name="kriteria_8" value="memuaskan">
                                                    <label for="kriteria_8_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_8_4" name="kriteria_8"
                                                        value="baik sekali">
                                                    <label for="kriteria_8_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_8_5" name="kriteria_8"
                                                        value="luar biasa">
                                                    <label for="kriteria_8_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group" style="font-size: 14px">
                                                <label for="kriteria_9">Memahami konsep REST API</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_9_1" name="kriteria_9" value="kurang">
                                                    <label for="kriteria_9_1">Kurang</label>

                                                    <input type="radio" id="kriteria_9_2" name="kriteria_9" value="cukup">
                                                    <label for="kriteria_9_2">Cukup</label>

                                                    <input type="radio" id="kriteria_9_3" name="kriteria_9" value="memuaskan">
                                                    <label for="kriteria_9_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_9_4" name="kriteria_9"
                                                        value="baik sekali">
                                                    <label for="kriteria_9_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_9_5" name="kriteria_9"
                                                        value="luar biasa">
                                                    <label for="kriteria_9_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_10" style="font-size: 14px">Memahami beberapa framework yang
                                                    sering digunakan seperti Tailwind, Bootstrap, VueJS atau ReactJS</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_10_1" name="kriteria_10" value="kurang">
                                                    <label for="kriteria_10_1">Kurang</label>

                                                    <input type="radio" id="kriteria_10_2" name="kriteria_10" value="cukup">
                                                    <label for="kriteria_10_2">Cukup</label>

                                                    <input type="radio" id="kriteria_10_3" name="kriteria_10"
                                                        value="memuaskan">
                                                    <label for="kriteria_10_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_10_4" name="kriteria_10"
                                                        value="baik sekali">
                                                    <label for="kriteria_10_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_10_5" name="kriteria_10"
                                                        value="luar biasa">
                                                    <label for="kriteria_10_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_11" style="font-size: 14px">Memahami proses pembuatan website
                                                    dengan menggunakan metode responsive web design</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_11_1" name="kriteria_11" value="kurang">
                                                    <label for="kriteria_11_1">Kurang</label>

                                                    <input type="radio" id="kriteria_11_2" name="kriteria_11" value="cukup">
                                                    <label for="kriteria_11_2">Cukup</label>

                                                    <input type="radio" id="kriteria_11_3" name="kriteria_11"
                                                        value="memuaskan">
                                                    <label for="kriteria_11_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_11_4" name="kriteria_11"
                                                        value="baik sekali">
                                                    <label for="kriteria_11_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_11_5" name="kriteria_11"
                                                        value="luar biasa">
                                                    <label for="kriteria_11_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(3)
                                <div id="kriteria-mobile-development">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kriteria_12" style="font-size: 14px">Memiliki pengalaman dengan
                                                    Library dan API</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_12_1" name="kriteria_12" value="kurang">
                                                    <label for="kriteria_12_1">Kurang</label>

                                                    <input type="radio" id="kriteria_12_2" name="kriteria_12" value="cukup">
                                                    <label for="kriteria_12_2">Cukup</label>

                                                    <input type="radio" id="kriteria_12_3" name="kriteria_12"
                                                        value="memuaskan">
                                                    <label for="kriteria_12_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_12_4" name="kriteria_12"
                                                        value="baik sekali">
                                                    <label for="kriteria_12_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_12_5" name="kriteria_12"
                                                        value="luar biasa">
                                                    <label for="kriteria_12_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_13" style="font-size: 14px">Mampu memecahkan masalah dengan
                                                    baik</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_13_1" name="kriteria_13" value="kurang">
                                                    <label for="kriteria_13_1">Kurang</label>

                                                    <input type="radio" id="kriteria_13_2" name="kriteria_13" value="cukup">
                                                    <label for="kriteria_13_2">Cukup</label>

                                                    <input type="radio" id="kriteria_13_3" name="kriteria_13"
                                                        value="memuaskan">
                                                    <label for="kriteria_13_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_13_4" name="kriteria_13"
                                                        value="baik sekali">
                                                    <label for="kriteria_13_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_13_5" name="kriteria_13"
                                                        value="luar biasa">
                                                    <label for="kriteria_13_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group" style="font-size: 14px">
                                                <label for="kriteria_14">Mampu menafsirkan dan mengikuti rencana teknis</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_14_1" name="kriteria_14" value="kurang">
                                                    <label for="kriteria_14_1">Kurang</label>

                                                    <input type="radio" id="kriteria_14_2" name="kriteria_14" value="cukup">
                                                    <label for="kriteria_14_2">Cukup</label>

                                                    <input type="radio" id="kriteria_14_3" name="kriteria_14"
                                                        value="memuaskan">
                                                    <label for="kriteria_14_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_14_4" name="kriteria_14"
                                                        value="baik sekali">
                                                    <label for="kriteria_14_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_14_5" name="kriteria_14"
                                                        value="luar biasa">
                                                    <label for="kriteria_14_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_15" style="font-size: 14px">Memahami penggunaan Flutter,
                                                    Android Studio, dll</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_15_1" name="kriteria_15" value="kurang">
                                                    <label for="kriteria_15_1">Kurang</label>

                                                    <input type="radio" id="kriteria_15_2" name="kriteria_15" value="cukup">
                                                    <label for="kriteria_15_2">Cukup</label>

                                                    <input type="radio" id="kriteria_15_3" name="kriteria_15"
                                                        value="memuaskan">
                                                    <label for="kriteria_15_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_15_4" name="kriteria_15"
                                                        value="baik sekali">
                                                    <label for="kriteria_15_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_15_5" name="kriteria_15"
                                                        value="luar biasa">
                                                    <label for="kriteria_15_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(4)
                                <div id="kriteria-uiux">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kriteria_16" style="font-size: 14px">Melakukan riset untuk user
                                                    experience yang baik</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_16_1" name="kriteria_16" value="kurang">
                                                    <label for="kriteria_16_1">Kurang</label>

                                                    <input type="radio" id="kriteria_16_2" name="kriteria_16" value="cukup">
                                                    <label for="kriteria_16_2">Cukup</label>

                                                    <input type="radio" id="kriteria_16_3" name="kriteria_16"
                                                        value="memuaskan">
                                                    <label for="kriteria_16_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_16_4" name="kriteria_16"
                                                        value="baik sekali">
                                                    <label for="kriteria_16_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_16_5" name="kriteria_16"
                                                        value="luar biasa">
                                                    <label for="kriteria_16_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_17" style="font-size: 14px">Memahami perilaku android dan iOS
                                                    dan Web</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_17_1" name="kriteria_17" value="kurang">
                                                    <label for="kriteria_17_1">Kurang</label>

                                                    <input type="radio" id="kriteria_17_2" name="kriteria_17" value="cukup">
                                                    <label for="kriteria_17_2">Cukup</label>

                                                    <input type="radio" id="kriteria_17_3" name="kriteria_17"
                                                        value="memuaskan">
                                                    <label for="kriteria_17_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_17_4" name="kriteria_17"
                                                        value="baik sekali">
                                                    <label for="kriteria_17_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_17_5" name="kriteria_17"
                                                        value="luar biasa">
                                                    <label for="kriteria_17_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group" style="font-size: 14px">
                                                <label for="kriteria_18">Kompeten dalam pembuatan user flow pada sebuah
                                                    aplikasi</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_18_1" name="kriteria_18" value="kurang">
                                                    <label for="kriteria_18_1">Kurang</label>

                                                    <input type="radio" id="kriteria_18_2" name="kriteria_18" value="cukup">
                                                    <label for="kriteria_18_2">Cukup</label>

                                                    <input type="radio" id="kriteria_18_3" name="kriteria_18"
                                                        value="memuaskan">
                                                    <label for="kriteria_18_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_18_4" name="kriteria_18"
                                                        value="baik sekali">
                                                    <label for="kriteria_18_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_18_5" name="kriteria_18"
                                                        value="luar biasa">
                                                    <label for="kriteria_18_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_19" style="font-size: 14px">Membuat solusi desain dengan
                                                    memerhatikan fungsional, keindahan, dan interaktif</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_19_1" name="kriteria_19" value="kurang">
                                                    <label for="kriteria_19_1">Kurang</label>

                                                    <input type="radio" id="kriteria_19_2" name="kriteria_19" value="cukup">
                                                    <label for="kriteria_19_2">Cukup</label>

                                                    <input type="radio" id="kriteria_19_3" name="kriteria_19"
                                                        value="memuaskan">
                                                    <label for="kriteria_19_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_19_4" name="kriteria_19"
                                                        value="baik sekali">
                                                    <label for="kriteria_19_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_19_5" name="kriteria_19"
                                                        value="luar biasa">
                                                    <label for="kriteria_19_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_20" style="font-size: 14px">Familiar dan bisa menggunakan
                                                    design tools seperti Figma, Adobe XD</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_20_1" name="kriteria_20" value="kurang">
                                                    <label for="kriteria_20_1">Kurang</label>

                                                    <input type="radio" id="kriteria_20_2" name="kriteria_20" value="cukup">
                                                    <label for="kriteria_20_2">Cukup</label>

                                                    <input type="radio" id="kriteria_20_3" name="kriteria_20"
                                                        value="memuaskan">
                                                    <label for="kriteria_20_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_20_4" name="kriteria_20"
                                                        value="baik sekali">
                                                    <label for="kriteria_20_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_20_5" name="kriteria_20"
                                                        value="luar biasa">
                                                    <label for="kriteria_20_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_21" style="font-size: 14px">Melakukan usability testing &
                                                    mempresentasikan hasil test design kepada stakeholder</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_21_1" name="kriteria_21" value="kurang">
                                                    <label for="kriteria_21_1">Kurang</label>

                                                    <input type="radio" id="kriteria_21_2" name="kriteria_21" value="cukup">
                                                    <label for="kriteria_21_2">Cukup</label>

                                                    <input type="radio" id="kriteria_21_3" name="kriteria_21"
                                                        value="memuaskan">
                                                    <label for="kriteria_21_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_21_4" name="kriteria_21"
                                                        value="baik sekali">
                                                    <label for="kriteria_21_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_21_5" name="kriteria_21"
                                                        value="luar biasa">
                                                    <label for="kriteria_21_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(5)
                                <div id="kriteria-system-analyst">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kriteria_22" style="font-size: 14px">Memiliki kemampuan problem
                                                    solving & komunikasi yang baik</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_22_1" name="kriteria_22" value="kurang">
                                                    <label for="kriteria_22_1">Kurang</label>

                                                    <input type="radio" id="kriteria_22_2" name="kriteria_22" value="cukup">
                                                    <label for="kriteria_22_2">Cukup</label>

                                                    <input type="radio" id="kriteria_22_3" name="kriteria_22"
                                                        value="memuaskan">
                                                    <label for="kriteria_22_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_22_4" name="kriteria_22"
                                                        value="baik sekali">
                                                    <label for="kriteria_22_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_22_5" name="kriteria_22"
                                                        value="luar biasa">
                                                    <label for="kriteria_22_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_23" style="font-size: 14px">Memiliki pemahaman yang kuat
                                                    tentang statistik dan matematika</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_23_1" name="kriteria_23" value="kurang">
                                                    <label for="kriteria_23_1">Kurang</label>

                                                    <input type="radio" id="kriteria_23_2" name="kriteria_23" value="cukup">
                                                    <label for="kriteria_23_2">Cukup</label>

                                                    <input type="radio" id="kriteria_23_3" name="kriteria_23"
                                                        value="memuaskan">
                                                    <label for="kriteria_23_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_23_4" name="kriteria_23"
                                                        value="baik sekali">
                                                    <label for="kriteria_23_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_23_5" name="kriteria_23"
                                                        value="luar biasa">
                                                    <label for="kriteria_23_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group" style="font-size: 14px">
                                                <label for="kriteria_24">Memiliki pemahaman terkait model data, pengembangan design
                                                    database, teknik data mining dan segmentasi</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_24_1" name="kriteria_24" value="kurang">
                                                    <label for="kriteria_24_1">Kurang</label>

                                                    <input type="radio" id="kriteria_24_2" name="kriteria_24" value="cukup">
                                                    <label for="kriteria_24_2">Cukup</label>

                                                    <input type="radio" id="kriteria_24_3" name="kriteria_24"
                                                        value="memuaskan">
                                                    <label for="kriteria_24_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_24_4" name="kriteria_24"
                                                        value="baik sekali">
                                                    <label for="kriteria_24_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_24_5" name="kriteria_24"
                                                        value="luar biasa">
                                                    <label for="kriteria_24_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_25" style="font-size: 14px">Memiliki kemampuan dalam
                                                    menyajikan informasi melalui bagan dan grafik dengan menggunakan tools seperti
                                                    Tableau dan lain-lain</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_25_1" name="kriteria_25" value="kurang">
                                                    <label for="kriteria_25_1">Kurang</label>

                                                    <input type="radio" id="kriteria_25_2" name="kriteria_25" value="cukup">
                                                    <label for="kriteria_25_2">Cukup</label>

                                                    <input type="radio" id="kriteria_25_3" name="kriteria_25"
                                                        value="memuaskan">
                                                    <label for="kriteria_25_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_25_4" name="kriteria_25"
                                                        value="baik sekali">
                                                    <label for="kriteria_25_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_25_5" name="kriteria_25"
                                                        value="luar biasa">
                                                    <label for="kriteria_25_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_26" style="font-size: 14px">Mampu menggunakan tools analisis
                                                    seperti SQL, XML, JavaScript dan sebagainya</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_26_1" name="kriteria_26" value="kurang">
                                                    <label for="kriteria_26_1">Kurang</label>

                                                    <input type="radio" id="kriteria_26_2" name="kriteria_26" value="cukup">
                                                    <label for="kriteria_26_2">Cukup</label>

                                                    <input type="radio" id="kriteria_26_3" name="kriteria_26"
                                                        value="memuaskan">
                                                    <label for="kriteria_26_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_26_4" name="kriteria_26"
                                                        value="baik sekali">
                                                    <label for="kriteria_26_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_26_5" name="kriteria_26"
                                                        value="luar biasa">
                                                    <label for="kriteria_26_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_27" style="font-size: 14px">Pemahaman bahasa pemrograman
                                                    menjadi nilai tambah</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_27_1" name="kriteria_27" value="kurang">
                                                    <label for="kriteria_27_1">Kurang</label>

                                                    <input type="radio" id="kriteria_27_2" name="kriteria_27" value="cukup">
                                                    <label for="kriteria_27_2">Cukup</label>

                                                    <input type="radio" id="kriteria_27_3" name="kriteria_27"
                                                        value="memuaskan">
                                                    <label for="kriteria_27_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_27_4" name="kriteria_27"
                                                        value="baik sekali">
                                                    <label for="kriteria_27_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_27_5" name="kriteria_27"
                                                        value="luar biasa">
                                                    <label for="kriteria_27_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(6)
                                <div id="kriteria-management">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kriteria_28" style="font-size: 14px">Good Personality</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_28_1" name="kriteria_28" value="kurang">
                                                    <label for="kriteria_28_1">Kurang</label>

                                                    <input type="radio" id="kriteria_28_2" name="kriteria_28" value="cukup">
                                                    <label for="kriteria_28_2">Cukup</label>

                                                    <input type="radio" id="kriteria_28_3" name="kriteria_28"
                                                        value="memuaskan">
                                                    <label for="kriteria_28_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_28_4" name="kriteria_28"
                                                        value="baik sekali">
                                                    <label for="kriteria_28_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_28_5" name="kriteria_28"
                                                        value="luar biasa">
                                                    <label for="kriteria_28_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_29" style="font-size: 14px">Tegas dan Bijak dalam menentukan
                                                    suatu keputusan</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_29_1" name="kriteria_29" value="kurang">
                                                    <label for="kriteria_29_1">Kurang</label>

                                                    <input type="radio" id="kriteria_29_2" name="kriteria_29" value="cukup">
                                                    <label for="kriteria_29_2">Cukup</label>

                                                    <input type="radio" id="kriteria_29_3" name="kriteria_29"
                                                        value="memuaskan">
                                                    <label for="kriteria_29_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_29_4" name="kriteria_29"
                                                        value="baik sekali">
                                                    <label for="kriteria_29_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_29_5" name="kriteria_29"
                                                        value="luar biasa">
                                                    <label for="kriteria_29_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group" style="font-size: 14px">
                                                <label for="kriteria_30">Cepat dalam menjalankan tugas dan kewajiban</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_30_1" name="kriteria_30" value="kurang">
                                                    <label for="kriteria_30_1">Kurang</label>

                                                    <input type="radio" id="kriteria_30_2" name="kriteria_30" value="cukup">
                                                    <label for="kriteria_30_2">Cukup</label>

                                                    <input type="radio" id="kriteria_30_3" name="kriteria_30"
                                                        value="memuaskan">
                                                    <label for="kriteria_30_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_30_4" name="kriteria_30"
                                                        value="baik sekali">
                                                    <label for="kriteria_30_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_30_5" name="kriteria_30"
                                                        value="luar biasa">
                                                    <label for="kriteria_30_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_31" style="font-size: 14px">Memiliki komitmen dan pendirian
                                                    yang kuat</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_31_1" name="kriteria_31" value="kurang">
                                                    <label for="kriteria_31_1">Kurang</label>

                                                    <input type="radio" id="kriteria_31_2" name="kriteria_31" value="cukup">
                                                    <label for="kriteria_31_2">Cukup</label>

                                                    <input type="radio" id="kriteria_31_3" name="kriteria_31"
                                                        value="memuaskan">
                                                    <label for="kriteria_31_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_31_4" name="kriteria_31"
                                                        value="baik sekali">
                                                    <label for="kriteria_31_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_31_5" name="kriteria_31"
                                                        value="luar biasa">
                                                    <label for="kriteria_31_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_32" style="font-size: 14px">Memiliki komunikasi yang sangat
                                                    bagus</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_32_1" name="kriteria_32" value="kurang">
                                                    <label for="kriteria_32_1">Kurang</label>

                                                    <input type="radio" id="kriteria_32_2" name="kriteria_32" value="cukup">
                                                    <label for="kriteria_32_2">Cukup</label>

                                                    <input type="radio" id="kriteria_32_3" name="kriteria_32"
                                                        value="memuaskan">
                                                    <label for="kriteria_32_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_32_4" name="kriteria_32"
                                                        value="baik sekali">
                                                    <label for="kriteria_32_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_32_5" name="kriteria_32"
                                                        value="luar biasa">
                                                    <label for="kriteria_32_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_33" style="font-size: 14px">Memiliki relasi yang cukup
                                                    luas</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_33_1" name="kriteria_33" value="kurang">
                                                    <label for="kriteria_33_1">Kurang</label>

                                                    <input type="radio" id="kriteria_33_2" name="kriteria_33" value="cukup">
                                                    <label for="kriteria_33_2">Cukup</label>

                                                    <input type="radio" id="kriteria_33_3" name="kriteria_33"
                                                        value="memuaskan">
                                                    <label for="kriteria_33_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_33_4" name="kriteria_33"
                                                        value="baik sekali">
                                                    <label for="kriteria_33_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_33_5" name="kriteria_33"
                                                        value="luar biasa">
                                                    <label for="kriteria_33_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_34" style="font-size: 14px">Mampu untuk berpikir
                                                    kritis</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_34_1" name="kriteria_34"
                                                        value="kurang">
                                                    <label for="kriteria_34_1">Kurang</label>

                                                    <input type="radio" id="kriteria_34_2" name="kriteria_34"
                                                        value="cukup">
                                                    <label for="kriteria_34_2">Cukup</label>

                                                    <input type="radio" id="kriteria_34_3" name="kriteria_34"
                                                        value="memuaskan">
                                                    <label for="kriteria_34_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_34_4" name="kriteria_34"
                                                        value="baik sekali">
                                                    <label for="kriteria_34_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_34_5" name="kriteria_34"
                                                        value="luar biasa">
                                                    <label for="kriteria_34_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(7)
                                <div id="kriteria-media-advertising">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kriteria_35" style="font-size: 14px">Mampu mengembangkan ide secara
                                                    komunikatif, strategis & inovatif</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_35_1" name="kriteria_35"
                                                        value="kurang">
                                                    <label for="kriteria_35_1">Kurang</label>

                                                    <input type="radio" id="kriteria_35_2" name="kriteria_35"
                                                        value="cukup">
                                                    <label for="kriteria_35_2">Cukup</label>

                                                    <input type="radio" id="kriteria_35_3" name="kriteria_35"
                                                        value="memuaskan">
                                                    <label for="kriteria_35_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_35_4" name="kriteria_35"
                                                        value="baik sekali">
                                                    <label for="kriteria_35_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_35_5" name="kriteria_35"
                                                        value="luar biasa">
                                                    <label for="kriteria_35_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_36" style="font-size: 14px">Memahami penggunaan social
                                                    media terkini seperti Instagram, TikTok, YouTube, LinkedIn, dll.</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_36_1" name="kriteria_36"
                                                        value="kurang">
                                                    <label for="kriteria_36_1">Kurang</label>

                                                    <input type="radio" id="kriteria_36_2" name="kriteria_36"
                                                        value="cukup">
                                                    <label for="kriteria_36_2">Cukup</label>

                                                    <input type="radio" id="kriteria_36_3" name="kriteria_36"
                                                        value="memuaskan">
                                                    <label for="kriteria_36_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_36_4" name="kriteria_36"
                                                        value="baik sekali">
                                                    <label for="kriteria_36_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_36_5" name="kriteria_36"
                                                        value="luar biasa">
                                                    <label for="kriteria_36_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group" style="font-size: 14px">
                                                <label for="kriteria_37">Memiliki analytical thinking dan problem solving yang
                                                    baik</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_37_1" name="kriteria_37"
                                                        value="kurang">
                                                    <label for="kriteria_37_1">Kurang</label>

                                                    <input type="radio" id="kriteria_37_2" name="kriteria_37"
                                                        value="cukup">
                                                    <label for="kriteria_37_2">Cukup</label>

                                                    <input type="radio" id="kriteria_37_3" name="kriteria_37"
                                                        value="memuaskan">
                                                    <label for="kriteria_37_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_37_4" name="kriteria_37"
                                                        value="baik sekali">
                                                    <label for="kriteria_37_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_37_5" name="kriteria_37"
                                                        value="luar biasa">
                                                    <label for="kriteria_37_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_38" style="font-size: 14px">Mengetahui SEO/SEM</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_38_1" name="kriteria_38"
                                                        value="kurang">
                                                    <label for="kriteria_38_1">Kurang</label>

                                                    <input type="radio" id="kriteria_38_2" name="kriteria_38"
                                                        value="cukup">
                                                    <label for="kriteria_38_2">Cukup</label>

                                                    <input type="radio" id="kriteria_38_3" name="kriteria_38"
                                                        value="memuaskan">
                                                    <label for="kriteria_38_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_38_4" name="kriteria_38"
                                                        value="baik sekali">
                                                    <label for="kriteria_38_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_38_5" name="kriteria_38"
                                                        value="luar biasa">
                                                    <label for="kriteria_38_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_39" style="font-size: 14px">Mengetahui dan mampu
                                                    menggunakan tools pendukung sesuai kebutuhan seperti Google Workspace, Trello,
                                                    Web Analytics, SEO tools, dll.</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_39_1" name="kriteria_39"
                                                        value="kurang">
                                                    <label for="kriteria_39_1">Kurang</label>

                                                    <input type="radio" id="kriteria_39_2" name="kriteria_39"
                                                        value="cukup">
                                                    <label for="kriteria_39_2">Cukup</label>

                                                    <input type="radio" id="kriteria_39_3" name="kriteria_39"
                                                        value="memuaskan">
                                                    <label for="kriteria_39_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_39_4" name="kriteria_39"
                                                        value="baik sekali">
                                                    <label for="kriteria_39_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_39_5" name="kriteria_39"
                                                        value="luar biasa">
                                                    <label for="kriteria_39_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_40" style="font-size: 14px">Memiliki salah satu skill yang
                                                    dibutuhkan, antara lain Konten Kreator, Video Editing, Copywriting, atau Digital
                                                    marketing Ads.</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_40_1" name="kriteria_40"
                                                        value="kurang">
                                                    <label for="kriteria_40_1">Kurang</label>

                                                    <input type="radio" id="kriteria_40_2" name="kriteria_40"
                                                        value="cukup">
                                                    <label for="kriteria_40_2">Cukup</label>

                                                    <input type="radio" id="kriteria_40_3" name="kriteria_40"
                                                        value="memuaskan">
                                                    <label for="kriteria_40_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_40_4" name="kriteria_40"
                                                        value="baik sekali">
                                                    <label for="kriteria_40_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_40_5" name="kriteria_40"
                                                        value="luar biasa">
                                                    <label for="kriteria_40_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case(8)
                            <div id="kriteria-icon-illustration">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kriteria_41" style="font-size: 14px">Memiliki kemampuan problem solving & komunikasi yang baik</label>
                                            <div class="radio-container">
                                                <input type="radio" id="kriteria_41_1" name="kriteria_41" value="kurang">
                                                <label for="kriteria_41_1">Kurang</label>

                                                <input type="radio" id="kriteria_41_2" name="kriteria_41" value="cukup">
                                                <label for="kriteria_41_2">Cukup</label>

                                                <input type="radio" id="kriteria_41_3" name="kriteria_41" value="memuaskan">
                                                <label for="kriteria_41_3">Memuaskan</label>

                                                <input type="radio" id="kriteria_41_4" name="kriteria_41" value="baik sekali">
                                                <label for="kriteria_41_4">Baik Sekali</label>

                                                <input type="radio" id="kriteria_41_5" name="kriteria_41" value="luar biasa">
                                                <label for="kriteria_41_5">Luar Biasa</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kriteria_42" style="font-size: 14px">Memiliki pemahaman dasar mengenai prinsip desain</label>
                                            <div class="radio-container">
                                                <input type="radio" id="kriteria_42_1" name="kriteria_42" value="kurang">
                                                <label for="kriteria_42_1">Kurang</label>

                                                <input type="radio" id="kriteria_42_2" name="kriteria_42" value="cukup">
                                                <label for="kriteria_42_2">Cukup</label>

                                                <input type="radio" id="kriteria_42_3" name="kriteria_42" value="memuaskan">
                                                <label for="kriteria_42_3">Memuaskan</label>

                                                <input type="radio" id="kriteria_42_4" name="kriteria_42" value="baik sekali">
                                                <label for="kriteria_42_4">Baik Sekali</label>

                                                <input type="radio" id="kriteria_42_5" name="kriteria_42" value="luar biasa">
                                                <label for="kriteria_42_5">Luar Biasa</label>
                                            </div>
                                        </div>
                                        <div class="form-group" style="font-size: 14px">
                                            <label for="kriteria_43">Mampu memahami dan membuat blueprint sesuai dengan kebutuhan user</label>
                                            <div class="radio-container">
                                                <input type="radio" id="kriteria_43_1" name="kriteria_43" value="kurang">
                                                <label for="kriteria_43_1">Kurang</label>

                                                <input type="radio" id="kriteria_43_2" name="kriteria_43" value="cukup">
                                                <label for="kriteria_43_2">Cukup</label>

                                                <input type="radio" id="kriteria_43_3" name="kriteria_43" value="memuaskan">
                                                <label for="kriteria_43_3">Memuaskan</label>

                                                <input type="radio" id="kriteria_43_4" name="kriteria_43" value="baik sekali">
                                                <label for="kriteria_43_4">Baik Sekali</label>

                                                <input type="radio" id="kriteria_43_5" name="kriteria_43" value="luar biasa">
                                                <label for="kriteria_43_5">Luar Biasa</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kriteria_44" style="font-size: 14px">Mampu menggunakan software grafis Adobe illustrator, photoshop dan Figma</label>
                                            <div class="radio-container">
                                                <input type="radio" id="kriteria_44_1" name="kriteria_44" value="kurang">
                                                <label for="kriteria_44_1">Kurang</label>

                                                <input type="radio" id="kriteria_44_2" name="kriteria_44" value="cukup">
                                                <label for="kriteria_44_2">Cukup</label>

                                                <input type="radio" id="kriteria_44_3" name="kriteria_44" value="memuaskan">
                                                <label for="kriteria_44_3">Memuaskan</label>

                                                <input type="radio" id="kriteria_44_4" name="kriteria_44" value="baik sekali">
                                                <label for="kriteria_44_4">Baik Sekali</label>

                                                <input type="radio" id="kriteria_44_5" name="kriteria_44" value="luar biasa">
                                                <label for="kriteria_44_5">Luar Biasa</label>
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
        .radio-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .radio-container input[type="radio"] {
            display: none;
        }

        .radio-container label {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            border: 2px solid #007bff;
            border-radius: 4px;
            background-color: white;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
            height: 40px;
            width: 150px;
        }

        .radio-container input[type="radio"]:checked+label {
            background-color: #007bff;
            /* Warna background saat dipilih */
            color: white;
            border-color: #007bff;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
