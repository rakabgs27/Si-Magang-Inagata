@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Nilai Pendaftar</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Nilai</h2>
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
                            <select name="pendaftar_id" id="pendaftar_id" class="form-control select2" required>
                                <option value="">Pilih Pendaftar</option>
                                @foreach ($pendaftars as $pendaftar)
                                    <option value="{{ $pendaftar->id }}" {{ $listNilai->pendaftar_id == $pendaftar->id ? 'selected' : '' }}>
                                        {{ $pendaftar->user->name }}
                                    </option>
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
                                                    arsitektur software</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_1_1" name="kriteria_1" value="kurang"
                                                        {{ $listNilai->kriteria_1 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_1_1">Kurang</label>

                                                    <input type="radio" id="kriteria_1_2" name="kriteria_1" value="cukup"
                                                        {{ $listNilai->kriteria_1 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_1_2">Cukup</label>

                                                    <input type="radio" id="kriteria_1_3" name="kriteria_1" value="memuaskan"
                                                        {{ $listNilai->kriteria_1 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_1_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_1_4" name="kriteria_1" value="baik sekali"
                                                        {{ $listNilai->kriteria_1 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_1_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_1_5" name="kriteria_1" value="luar biasa"
                                                        {{ $listNilai->kriteria_1 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_1_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_2" style="font-size: 14px">Memahami cara deployment ke server
                                                    menjadi nilai tambah</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_2_1" name="kriteria_2" value="kurang"
                                                        {{ $listNilai->kriteria_2 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_2_1">Kurang</label>

                                                    <input type="radio" id="kriteria_2_2" name="kriteria_2" value="cukup"
                                                        {{ $listNilai->kriteria_2 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_2_2">Cukup</label>

                                                    <input type="radio" id="kriteria_2_3" name="kriteria_2" value="memuaskan"
                                                        {{ $listNilai->kriteria_2 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_2_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_2_4" name="kriteria_2" value="baik sekali"
                                                        {{ $listNilai->kriteria_2 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_2_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_2_5" name="kriteria_2" value="luar biasa"
                                                        {{ $listNilai->kriteria_2 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_2_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_3" style="font-size: 14px">Memahami penggunaan kontrol versi
                                                    seperti Git</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_3_1" name="kriteria_3" value="kurang"
                                                        {{ $listNilai->kriteria_3 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_3_1">Kurang</label>

                                                    <input type="radio" id="kriteria_3_2" name="kriteria_3" value="cukup"
                                                        {{ $listNilai->kriteria_3 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_3_2">Cukup</label>

                                                    <input type="radio" id="kriteria_3_3" name="kriteria_3" value="memuaskan"
                                                        {{ $listNilai->kriteria_3 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_3_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_3_4" name="kriteria_3" value="baik sekali"
                                                        {{ $listNilai->kriteria_3 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_3_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_3_5" name="kriteria_3" value="luar biasa"
                                                        {{ $listNilai->kriteria_3 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_3_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_4" style="font-size: 14px">Memiliki pengetahuan tentang
                                                    functional dan object oriented programming</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_4_1" name="kriteria_4" value="kurang"
                                                        {{ $listNilai->kriteria_4 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_4_1">Kurang</label>

                                                    <input type="radio" id="kriteria_4_2" name="kriteria_4" value="cukup"
                                                        {{ $listNilai->kriteria_4 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_4_2">Cukup</label>

                                                    <input type="radio" id="kriteria_4_3" name="kriteria_4" value="memuaskan"
                                                        {{ $listNilai->kriteria_4 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_4_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_4_4" name="kriteria_4"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_4 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_4_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_4_5" name="kriteria_4" value="luar biasa"
                                                        {{ $listNilai->kriteria_4 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_4_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_5" style="font-size: 14px">Memahami bahasa pemrograman
                                                    seperti PHP, dan NodeJS</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_5_1" name="kriteria_5" value="kurang"
                                                        {{ $listNilai->kriteria_5 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_5_1">Kurang</label>

                                                    <input type="radio" id="kriteria_5_2" name="kriteria_5" value="cukup"
                                                        {{ $listNilai->kriteria_5 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_5_2">Cukup</label>

                                                    <input type="radio" id="kriteria_5_3" name="kriteria_5" value="memuaskan"
                                                        {{ $listNilai->kriteria_5 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_5_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_5_4" name="kriteria_5"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_5 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_5_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_5_5" name="kriteria_5" value="luar biasa"
                                                        {{ $listNilai->kriteria_5 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_5_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_6" style="font-size: 14px">Memahami SQL database</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_6_1" name="kriteria_6" value="kurang"
                                                        {{ $listNilai->kriteria_6 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_6_1">Kurang</label>

                                                    <input type="radio" id="kriteria_6_2" name="kriteria_6" value="cukup"
                                                        {{ $listNilai->kriteria_6 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_6_2">Cukup</label>

                                                    <input type="radio" id="kriteria_6_3" name="kriteria_6" value="memuaskan"
                                                        {{ $listNilai->kriteria_6 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_6_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_6_4" name="kriteria_6"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_6 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_6_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_6_5" name="kriteria_6" value="luar biasa"
                                                        {{ $listNilai->kriteria_6 == 'luar biasa' ? 'checked' : '' }}>
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
                                                    <input type="radio" id="kriteria_7_1" name="kriteria_7" value="kurang"
                                                        {{ $listNilai->kriteria_7 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_7_1">Kurang</label>

                                                    <input type="radio" id="kriteria_7_2" name="kriteria_7" value="cukup"
                                                        {{ $listNilai->kriteria_7 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_7_2">Cukup</label>

                                                    <input type="radio" id="kriteria_7_3" name="kriteria_7" value="memuaskan"
                                                        {{ $listNilai->kriteria_7 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_7_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_7_4" name="kriteria_7"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_7 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_7_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_7_5" name="kriteria_7" value="luar biasa"
                                                        {{ $listNilai->kriteria_7 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_7_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_8" style="font-size: 14px">Memahami cara menggunakan control
                                                    versi seperti Git</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_8_1" name="kriteria_8" value="kurang"
                                                        {{ $listNilai->kriteria_8 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_8_1">Kurang</label>

                                                    <input type="radio" id="kriteria_8_2" name="kriteria_8" value="cukup"
                                                        {{ $listNilai->kriteria_8 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_8_2">Cukup</label>

                                                    <input type="radio" id="kriteria_8_3" name="kriteria_8" value="memuaskan"
                                                        {{ $listNilai->kriteria_8 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_8_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_8_4" name="kriteria_8"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_8 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_8_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_8_5" name="kriteria_8" value="luar biasa"
                                                        {{ $listNilai->kriteria_8 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_8_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_9" style="font-size: 14px">Memahami konsep REST API</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_9_1" name="kriteria_9" value="kurang"
                                                        {{ $listNilai->kriteria_9 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_9_1">Kurang</label>

                                                    <input type="radio" id="kriteria_9_2" name="kriteria_9" value="cukup"
                                                        {{ $listNilai->kriteria_9 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_9_2">Cukup</label>

                                                    <input type="radio" id="kriteria_9_3" name="kriteria_9" value="memuaskan"
                                                        {{ $listNilai->kriteria_9 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_9_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_9_4" name="kriteria_9"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_9 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_9_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_9_5" name="kriteria_9" value="luar biasa"
                                                        {{ $listNilai->kriteria_9 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_9_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_10" style="font-size: 14px">Memahami beberapa framework yang
                                                    sering digunakan seperti Tailwind, Bootstrap, VueJS atau ReactJS</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_10_1" name="kriteria_10" value="kurang"
                                                        {{ $listNilai->kriteria_10 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_10_1">Kurang</label>

                                                    <input type="radio" id="kriteria_10_2" name="kriteria_10" value="cukup"
                                                        {{ $listNilai->kriteria_10 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_10_2">Cukup</label>

                                                    <input type="radio" id="kriteria_10_3" name="kriteria_10"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_10 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_10_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_10_4" name="kriteria_10"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_10 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_10_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_10_5" name="kriteria_10"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_10 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_10_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_11" style="font-size: 14px">Memahami proses pembuatan website
                                                    dengan menggunakan metode responsive web design</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_11_1" name="kriteria_11" value="kurang"
                                                        {{ $listNilai->kriteria_11 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_11_1">Kurang</label>

                                                    <input type="radio" id="kriteria_11_2" name="kriteria_11" value="cukup"
                                                        {{ $listNilai->kriteria_11 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_11_2">Cukup</label>

                                                    <input type="radio" id="kriteria_11_3" name="kriteria_11"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_11 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_11_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_11_4" name="kriteria_11"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_11 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_11_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_11_5" name="kriteria_11"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_11 == 'luar biasa' ? 'checked' : '' }}>
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
                                                    <input type="radio" id="kriteria_12_1" name="kriteria_12" value="kurang"
                                                        {{ $listNilai->kriteria_12 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_12_1">Kurang</label>

                                                    <input type="radio" id="kriteria_12_2" name="kriteria_12" value="cukup"
                                                        {{ $listNilai->kriteria_12 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_12_2">Cukup</label>

                                                    <input type="radio" id="kriteria_12_3" name="kriteria_12"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_12 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_12_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_12_4" name="kriteria_12"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_12 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_12_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_12_5" name="kriteria_12"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_12 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_12_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_13" style="font-size: 14px">Mampu memecahkan masalah dengan
                                                    baik</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_13_1" name="kriteria_13" value="kurang"
                                                        {{ $listNilai->kriteria_13 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_13_1">Kurang</label>

                                                    <input type="radio" id="kriteria_13_2" name="kriteria_13" value="cukup"
                                                        {{ $listNilai->kriteria_13 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_13_2">Cukup</label>

                                                    <input type="radio" id="kriteria_13_3" name="kriteria_13"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_13 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_13_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_13_4" name="kriteria_13"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_13 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_13_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_13_5" name="kriteria_13"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_13 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_13_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_14" style="font-size: 14px">Mampu menafsirkan dan mengikuti
                                                    rencana teknis</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_14_1" name="kriteria_14" value="kurang"
                                                        {{ $listNilai->kriteria_14 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_14_1">Kurang</label>

                                                    <input type="radio" id="kriteria_14_2" name="kriteria_14" value="cukup"
                                                        {{ $listNilai->kriteria_14 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_14_2">Cukup</label>

                                                    <input type="radio" id="kriteria_14_3" name="kriteria_14"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_14 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_14_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_14_4" name="kriteria_14"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_14 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_14_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_14_5" name="kriteria_14"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_14 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_14_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_15" style="font-size: 14px">Memahami penggunaan Flutter,
                                                    Android Studio, dll</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_15_1" name="kriteria_15" value="kurang"
                                                        {{ $listNilai->kriteria_15 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_15_1">Kurang</label>

                                                    <input type="radio" id="kriteria_15_2" name="kriteria_15" value="cukup"
                                                        {{ $listNilai->kriteria_15 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_15_2">Cukup</label>

                                                    <input type="radio" id="kriteria_15_3" name="kriteria_15"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_15 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_15_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_15_4" name="kriteria_15"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_15 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_15_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_15_5" name="kriteria_15"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_15 == 'luar biasa' ? 'checked' : '' }}>
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
                                                    <input type="radio" id="kriteria_16_1" name="kriteria_16" value="kurang"
                                                        {{ $listNilai->kriteria_16 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_16_1">Kurang</label>

                                                    <input type="radio" id="kriteria_16_2" name="kriteria_16" value="cukup"
                                                        {{ $listNilai->kriteria_16 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_16_2">Cukup</label>

                                                    <input type="radio" id="kriteria_16_3" name="kriteria_16"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_16 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_16_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_16_4" name="kriteria_16"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_16 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_16_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_16_5" name="kriteria_16"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_16 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_16_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_17" style="font-size: 14px">Memahami perilaku android dan iOS
                                                    dan Web</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_17_1" name="kriteria_17" value="kurang"
                                                        {{ $listNilai->kriteria_17 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_17_1">Kurang</label>

                                                    <input type="radio" id="kriteria_17_2" name="kriteria_17" value="cukup"
                                                        {{ $listNilai->kriteria_17 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_17_2">Cukup</label>

                                                    <input type="radio" id="kriteria_17_3" name="kriteria_17"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_17 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_17_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_17_4" name="kriteria_17"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_17 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_17_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_17_5" name="kriteria_17"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_17 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_17_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_18" style="font-size: 14px">Kompeten dalam pembuatan user
                                                    flow pada sebuah aplikasi</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_18_1" name="kriteria_18" value="kurang"
                                                        {{ $listNilai->kriteria_18 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_18_1">Kurang</label>

                                                    <input type="radio" id="kriteria_18_2" name="kriteria_18" value="cukup"
                                                        {{ $listNilai->kriteria_18 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_18_2">Cukup</label>

                                                    <input type="radio" id="kriteria_18_3" name="kriteria_18"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_18 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_18_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_18_4" name="kriteria_18"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_18 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_18_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_18_5" name="kriteria_18"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_18 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_18_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_19" style="font-size: 14px">Membuat solusi desain dengan
                                                    memerhatikan fungsional, keindahan, dan interaktif</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_19_1" name="kriteria_19" value="kurang"
                                                        {{ $listNilai->kriteria_19 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_19_1">Kurang</label>

                                                    <input type="radio" id="kriteria_19_2" name="kriteria_19" value="cukup"
                                                        {{ $listNilai->kriteria_19 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_19_2">Cukup</label>

                                                    <input type="radio" id="kriteria_19_3" name="kriteria_19"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_19 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_19_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_19_4" name="kriteria_19"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_19 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_19_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_19_5" name="kriteria_19"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_19 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_19_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_20" style="font-size: 14px">Familiar dan bisa menggunakan
                                                    design tools seperti Figma, Adobe XD</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_20_1" name="kriteria_20" value="kurang"
                                                        {{ $listNilai->kriteria_20 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_20_1">Kurang</label>

                                                    <input type="radio" id="kriteria_20_2" name="kriteria_20" value="cukup"
                                                        {{ $listNilai->kriteria_20 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_20_2">Cukup</label>

                                                    <input type="radio" id="kriteria_20_3" name="kriteria_20"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_20 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_20_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_20_4" name="kriteria_20"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_20 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_20_4">Baik Sekali</label>
                                                    <input type="radio" id="kriteria_20_5" name="kriteria_20"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_20 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_20_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_21" style="font-size: 14px">Melakukan usability testing &
                                                    mempresentasikan hasil test design kepada stakeholder</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_21_1" name="kriteria_21" value="kurang"
                                                        {{ $listNilai->kriteria_21 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_21_1">Kurang</label>

                                                    <input type="radio" id="kriteria_21_2" name="kriteria_21" value="cukup"
                                                        {{ $listNilai->kriteria_21 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_21_2">Cukup</label>

                                                    <input type="radio" id="kriteria_21_3" name="kriteria_21"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_21 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_21_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_21_4" name="kriteria_21"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_21 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_21_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_21_5" name="kriteria_21"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_21 == 'luar biasa' ? 'checked' : '' }}>
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
                                                    <input type="radio" id="kriteria_22_1" name="kriteria_22" value="kurang"
                                                        {{ $listNilai->kriteria_22 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_22_1">Kurang</label>

                                                    <input type="radio" id="kriteria_22_2" name="kriteria_22" value="cukup"
                                                        {{ $listNilai->kriteria_22 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_22_2">Cukup</label>

                                                    <input type="radio" id="kriteria_22_3" name="kriteria_22"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_22 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_22_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_22_4" name="kriteria_22"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_22 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_22_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_22_5" name="kriteria_22"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_22 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_22_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_23" style="font-size: 14px">Memiliki pemahaman yang kuat
                                                    tentang statistik dan matematika</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_23_1" name="kriteria_23" value="kurang"
                                                        {{ $listNilai->kriteria_23 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_23_1">Kurang</label>

                                                    <input type="radio" id="kriteria_23_2" name="kriteria_23" value="cukup"
                                                        {{ $listNilai->kriteria_23 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_23_2">Cukup</label>

                                                    <input type="radio" id="kriteria_23_3" name="kriteria_23"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_23 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_23_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_23_4" name="kriteria_23"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_23 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_23_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_23_5" name="kriteria_23"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_23 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_23_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_24" style="font-size: 14px">Memiliki pemahaman terkait model
                                                    data, pengembangan design database, teknik data mining dan segmentasi</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_24_1" name="kriteria_24" value="kurang"
                                                        {{ $listNilai->kriteria_24 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_24_1">Kurang</label>

                                                    <input type="radio" id="kriteria_24_2" name="kriteria_24" value="cukup"
                                                        {{ $listNilai->kriteria_24 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_24_2">Cukup</label>

                                                    <input type="radio" id="kriteria_24_3" name="kriteria_24"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_24 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_24_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_24_4" name="kriteria_24"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_24 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_24_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_24_5" name="kriteria_24"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_24 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_24_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_25" style="font-size: 14px">Memiliki kemampuan dalam
                                                    menyajikan informasi melalui bagan dan grafik dengan menggunakan tools seperti
                                                    Tableau dan lain-lain</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_25_1" name="kriteria_25" value="kurang"
                                                        {{ $listNilai->kriteria_25 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_25_1">Kurang</label>

                                                    <input type="radio" id="kriteria_25_2" name="kriteria_25" value="cukup"
                                                        {{ $listNilai->kriteria_25 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_25_2">Cukup</label>

                                                    <input type="radio" id="kriteria_25_3" name="kriteria_25"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_25 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_25_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_25_4" name="kriteria_25"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_25 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_25_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_25_5" name="kriteria_25"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_25 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_25_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_26" style="font-size: 14px">Mampu menggunakan tools analisis
                                                    seperti SQL, XML, JavaScript dan sebagainya</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_26_1" name="kriteria_26" value="kurang"
                                                        {{ $listNilai->kriteria_26 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_26_1">Kurang</label>

                                                    <input type="radio" id="kriteria_26_2" name="kriteria_26" value="cukup"
                                                        {{ $listNilai->kriteria_26 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_26_2">Cukup</label>

                                                    <input type="radio" id="kriteria_26_3" name="kriteria_26"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_26 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_26_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_26_4" name="kriteria_26"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_26 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_26_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_26_5" name="kriteria_26"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_26 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_26_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_27" style="font-size: 14px">Pemahaman bahasa pemrograman
                                                    menjadi nilai tambah</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_27_1" name="kriteria_27" value="kurang"
                                                        {{ $listNilai->kriteria_27 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_27_1">Kurang</label>

                                                    <input type="radio" id="kriteria_27_2" name="kriteria_27" value="cukup"
                                                        {{ $listNilai->kriteria_27 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_27_2">Cukup</label>

                                                    <input type="radio" id="kriteria_27_3" name="kriteria_27"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_27 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_27_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_27_4" name="kriteria_27"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_27 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_27_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_27_5" name="kriteria_27"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_27 == 'luar biasa' ? 'checked' : '' }}>
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
                                                    <input type="radio" id="kriteria_28_1" name="kriteria_28" value="kurang"
                                                        {{ $listNilai->kriteria_28 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_28_1">Kurang</label>

                                                    <input type="radio" id="kriteria_28_2" name="kriteria_28" value="cukup"
                                                        {{ $listNilai->kriteria_28 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_28_2">Cukup</label>

                                                    <input type="radio" id="kriteria_28_3" name="kriteria_28"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_28 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_28_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_28_4" name="kriteria_28"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_28 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_28_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_28_5" name="kriteria_28"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_28 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_28_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_29" style="font-size: 14px">Tegas dan Bijak dalam menentukan
                                                    suatu keputusan</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_29_1" name="kriteria_29" value="kurang"
                                                        {{ $listNilai->kriteria_29 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_29_1">Kurang</label>

                                                    <input type="radio" id="kriteria_29_2" name="kriteria_29" value="cukup"
                                                        {{ $listNilai->kriteria_29 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_29_2">Cukup</label>

                                                    <input type="radio" id="kriteria_29_3" name="kriteria_29"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_29 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_29_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_29_4" name="kriteria_29"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_29 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_29_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_29_5" name="kriteria_29"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_29 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_29_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_30" style="font-size: 14px">Cepat dalam menjalankan tugas dan
                                                    kewajiban</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_30_1" name="kriteria_30" value="kurang"
                                                        {{ $listNilai->kriteria_30 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_30_1">Kurang</label>

                                                    <input type="radio" id="kriteria_30_2" name="kriteria_30" value="cukup"
                                                        {{ $listNilai->kriteria_30 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_30_2">Cukup</label>

                                                    <input type="radio" id="kriteria_30_3" name="kriteria_30"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_30 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_30_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_30_4" name="kriteria_30"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_30 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_30_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_30_5" name="kriteria_30"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_30 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_30_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_31" style="font-size: 14px">Memiliki komitmen dan pendirian
                                                    yang kuat</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_31_1" name="kriteria_31" value="kurang"
                                                        {{ $listNilai->kriteria_31 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_31_1">Kurang</label>

                                                    <input type="radio" id="kriteria_31_2" name="kriteria_31" value="cukup"
                                                        {{ $listNilai->kriteria_31 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_31_2">Cukup</label>

                                                    <input type="radio" id="kriteria_31_3" name="kriteria_31"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_31 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_31_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_31_4" name="kriteria_31"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_31 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_31_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_31_5" name="kriteria_31"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_31 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_31_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_32" style="font-size: 14px">Memiliki komunikasi yang sangat
                                                    bagus</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_32_1" name="kriteria_32" value="kurang"
                                                        {{ $listNilai->kriteria_32 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_32_1">Kurang</label>

                                                    <input type="radio" id="kriteria_32_2" name="kriteria_32" value="cukup"
                                                        {{ $listNilai->kriteria_32 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_32_2">Cukup</label>

                                                    <input type="radio" id="kriteria_32_3" name="kriteria_32"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_32 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_32_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_32_4" name="kriteria_32"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_32 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_32_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_32_5" name="kriteria_32"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_32 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_32_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_33" style="font-size: 14px">Memiliki relasi yang cukup
                                                    luas</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_33_1" name="kriteria_33" value="kurang"
                                                        {{ $listNilai->kriteria_33 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_33_1">Kurang</label>

                                                    <input type="radio" id="kriteria_33_2" name="kriteria_33" value="cukup"
                                                        {{ $listNilai->kriteria_33 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_33_2">Cukup</label>

                                                    <input type="radio" id="kriteria_33_3" name="kriteria_33"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_33 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_33_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_33_4" name="kriteria_33"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_33 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_33_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_33_5" name="kriteria_33"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_33 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_33_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_34" style="font-size: 14px">Mampu untuk berpikir
                                                    kritis</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_34_1" name="kriteria_34" value="kurang"
                                                        {{ $listNilai->kriteria_34 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_34_1">Kurang</label>

                                                    <input type="radio" id="kriteria_34_2" name="kriteria_34"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_34 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_34_2">Cukup</label>

                                                    <input type="radio" id="kriteria_34_3" name="kriteria_34"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_34 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_34_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_34_4" name="kriteria_34"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_34 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_34_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_34_5" name="kriteria_34"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_34 == 'luar biasa' ? 'checked' : '' }}>
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
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_35 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_35_1">Kurang</label>

                                                    <input type="radio" id="kriteria_35_2" name="kriteria_35"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_35 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_35_2">Cukup</label>

                                                    <input type="radio" id="kriteria_35_3" name="kriteria_35"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_35 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_35_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_35_4" name="kriteria_35"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_35 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_35_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_35_5" name="kriteria_35"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_35 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_35_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_36" style="font-size: 14px">Memahami penggunaan social
                                                    media terkini seperti Instagram, TikTok, YouTube, LinkedIn, dll.</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_36_1" name="kriteria_36"
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_36 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_36_1">Kurang</label>

                                                    <input type="radio" id="kriteria_36_2" name="kriteria_36"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_36 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_36_2">Cukup</label>

                                                    <input type="radio" id="kriteria_36_3" name="kriteria_36"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_36 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_36_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_36_4" name="kriteria_36"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_36 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_36_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_36_5" name="kriteria_36"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_36 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_36_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_37" style="font-size: 14px">Memiliki analytical thinking
                                                    dan problem solving yang baik</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_37_1" name="kriteria_37"
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_37 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_37_1">Kurang</label>

                                                    <input type="radio" id="kriteria_37_2" name="kriteria_37"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_37 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_37_2">Cukup</label>

                                                    <input type="radio" id="kriteria_37_3" name="kriteria_37"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_37 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_37_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_37_4" name="kriteria_37"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_37 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_37_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_37_5" name="kriteria_37"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_37 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_37_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_38" style="font-size: 14px">Mengetahui SEO/SEM</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_38_1" name="kriteria_38"
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_38 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_38_1">Kurang</label>

                                                    <input type="radio" id="kriteria_38_2" name="kriteria_38"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_38 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_38_2">Cukup</label>

                                                    <input type="radio" id="kriteria_38_3" name="kriteria_38"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_38 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_38_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_38_4" name="kriteria_38"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_38 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_38_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_38_5" name="kriteria_38"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_38 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_38_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_39" style="font-size: 14px">Mengetahui dan mampu
                                                    menggunakan tools pendukung sesuai kebutuhan seperti Google Workspace, Trello,
                                                    Web Analytics, SEO tools, dll.</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_39_1" name="kriteria_39"
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_39 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_39_1">Kurang</label>

                                                    <input type="radio" id="kriteria_39_2" name="kriteria_39"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_39 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_39_2">Cukup</label>

                                                    <input type="radio" id="kriteria_39_3" name="kriteria_39"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_39 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_39_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_39_4" name="kriteria_39"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_39 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_39_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_39_5" name="kriteria_39"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_39 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_39_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_40" style="font-size: 14px">Memiliki salah satu skill yang
                                                    dibutuhkan, antara lain Konten Kreator, Video Editing, Copywriting, atau Digital
                                                    marketing Ads.</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_40_1" name="kriteria_40"
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_40 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_40_1">Kurang</label>

                                                    <input type="radio" id="kriteria_40_2" name="kriteria_40"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_40 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_40_2">Cukup</label>

                                                    <input type="radio" id="kriteria_40_3" name="kriteria_40"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_40 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_40_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_40_4" name="kriteria_40"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_40 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_40_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_40_5" name="kriteria_40"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_40 == 'luar biasa' ? 'checked' : '' }}>
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
                                                <label for="kriteria_41" style="font-size: 14px">Memiliki kemampuan problem
                                                    solving & komunikasi yang baik</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_41_1" name="kriteria_41"
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_41 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_41_1">Kurang</label>

                                                    <input type="radio" id="kriteria_41_2" name="kriteria_41"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_41 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_41_2">Cukup</label>

                                                    <input type="radio" id="kriteria_41_3" name="kriteria_41"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_41 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_41_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_41_4" name="kriteria_41"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_41 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_41_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_41_5" name="kriteria_41"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_41 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_41_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_42" style="font-size: 14px">Memiliki pemahaman dasar
                                                    mengenai prinsip desain</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_42_1" name="kriteria_42"
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_42 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_42_1">Kurang</label>

                                                    <input type="radio" id="kriteria_42_2" name="kriteria_42"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_42 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_42_2">Cukup</label>

                                                    <input type="radio" id="kriteria_42_3" name="kriteria_42"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_42 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_42_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_42_4" name="kriteria_42"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_42 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_42_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_42_5" name="kriteria_42"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_42 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_42_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_43" style="font-size: 14px">Mampu memahami dan membuat
                                                    blueprint sesuai dengan kebutuhan user</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_43_1" name="kriteria_43"
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_43 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_43_1">Kurang</label>

                                                    <input type="radio" id="kriteria_43_2" name="kriteria_43"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_43 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_43_2">Cukup</label>

                                                    <input type="radio" id="kriteria_43_3" name="kriteria_43"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_43 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_43_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_43_4" name="kriteria_43"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_43 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_43_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_43_5" name="kriteria_43"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_43 == 'luar biasa' ? 'checked' : '' }}>
                                                    <label for="kriteria_43_5">Luar Biasa</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kriteria_44" style="font-size: 14px">Mampu menggunakan software
                                                    grafis Adobe illustrator, photoshop dan Figma</label>
                                                <div class="radio-container">
                                                    <input type="radio" id="kriteria_44_1" name="kriteria_44"
                                                        value="kurang"
                                                        {{ $listNilai->kriteria_44 == 'kurang' ? 'checked' : '' }}>
                                                    <label for="kriteria_44_1">Kurang</label>

                                                    <input type="radio" id="kriteria_44_2" name="kriteria_44"
                                                        value="cukup"
                                                        {{ $listNilai->kriteria_44 == 'cukup' ? 'checked' : '' }}>
                                                    <label for="kriteria_44_2">Cukup</label>

                                                    <input type="radio" id="kriteria_44_3" name="kriteria_44"
                                                        value="memuaskan"
                                                        {{ $listNilai->kriteria_44 == 'memuaskan' ? 'checked' : '' }}>
                                                    <label for="kriteria_44_3">Memuaskan</label>

                                                    <input type="radio" id="kriteria_44_4" name="kriteria_44"
                                                        value="baik sekali"
                                                        {{ $listNilai->kriteria_44 == 'baik sekali' ? 'checked' : '' }}>
                                                    <label for="kriteria_44_4">Baik Sekali</label>

                                                    <input type="radio" id="kriteria_44_5" name="kriteria_44"
                                                        value="luar biasa"
                                                        {{ $listNilai->kriteria_44 == 'luar biasa' ? 'checked' : '' }}>
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
            border: 2px solid #6778ed;
            border-radius: 4px;
            background-color: white;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
            height: 40px;
            width: 150px;
        }

        .radio-container input[type="radio"]:checked+label {
            background-color: #6778ed;
            color: white;
            border-color: #6778ed;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
