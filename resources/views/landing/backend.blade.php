@extends('layouts.master') 
@section('title', 'Handbook')
@section('content')
<br/>
    <div class="text-center p-2">
        <img src="{{ url('assetsLanding/img/3.png') }}" width="100" height="100" alt="...">
    </div>
<main class="container">
        <div class="row ml-4 mb-3">
            <div class="col-md-3">
                <button type="button" class="btn btn-light button-handbook"><span style="color: #EB2227; font-weight: bold;"> Our Intern Handbook</span></button>
               <!-- Tabs nav -->
               <!--<a class="one">--> 
                @include('component.list')
               <!--  </a> -->
            </div>
            <div class="col-md-9 jarak-mh">
               <!-- Tabs content -->
               <div class="tab-content handbook-content" data-handbook="backend" id="v-pills-tabContent">
                  <div class="tab-pane show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class="mb-2" style="font-weight: bold;">Backend Development</h3>
                        <p class="mb-2" style="line-height: 32px;">
                            Back-End developer merupakan bidang yang bertanggung jawab dalam pengembangan sebuah website. 
                            Back-End Developer bertugas untuk merancang perangkat lunak dari sisi server yang berhubungan 
                            dengan logika dan database dengan menggunakan bahasa pemrograman khusus agar fungsi dan sistem 
                            website dapat berjalan. Bidang ini beroperasi pada website yang mencakup  server, database, 
                            keamanan dan arsitektur website. Secara umum, bahasa pemrograman yang digunakan pada Back-End 
                            yaitu PHP, Javascript, dll.
                        </p>
                        <h3 class="mt-5" style="font-weight: bold;">Skill Yang Dibutuhkan</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki pengetahuan yang luas dalam arsitektur software.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami cara deployment ke server menjadi nilai tambah.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami penggunaan kontrol versi seperti Git.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki pengetahuan tentang functional dan object oriented programming.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami bahasa pemrograman  seperti PHP, dan NodeJS.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami Sql database.</td>
                            </tr>
                        </table>
                         <h3 class="mt-5" style="font-weight: bold;">Tanggung Jawab</h3>
                         <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Menganalisis masalah dan memperbaiki kelemahan pada website.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Menciptakan, mempertahankan, mengelola dan meningkatkan performa website.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Merancang dan membuat keamanan pada website.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mengimplementasikan rancangan struktur data ke dalam kode dengan bahasa pemrograman yang dikuasai.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Merancang struktur model data dengan pemikiran skalabilitas.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Mentor</h3>
                        <h6>#GrowthTogether</h6>
                        <div class="row mb-5 mt-5">
                            <div class="col-md-4 text-center">
                                <img src="{{ url('assetsLanding/img/mentor_sherdan.png') }}" alt="" class="card__logo" />
                                <div class="card__heading">Ahmad Sherdhan S</div>
                                <h6 style="opacity: 0.5;">Backend Developer</h6>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="{{ url('assetsLanding/img/mentor_zakarsyi.png') }}" alt="" class="card__logo" />
                                <div class="card__heading">Zarkasyi Mati’in</div>
                                <h6 style="opacity: 0.5;">Backend Developer</h6>
                            </div>
                        </div>
                        <h3 class="mt-5" style="font-weight: bold;">Aplikasi Yang sering digunakan</h3>
                        <ul class="listings__grid" style="padding-left:5px;">
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/codeigniter.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://codeigniter.com/" target="_blank" rel="nofollow">CI</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/laravel.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://laravel.com/" target="_blank" rel="nofollow">Laravel</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/nodejs.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://nodejs.org/en/" target="_blank" rel="nofollow">Node JS</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/javascript.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://www.javascript.com/" target="_blank" rel="nofollow">JavaScript</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                        </ul>
                    </div>
                  <h3 class="mt-5" style="font-weight:bold;"> Kurikulum </h3>
                  <button type="button" class="btn btn-success button-hd"><img src="{{ url('assetsLanding/img/Combined-Shape.png') }}">&nbsp;&nbsp; Download Kurikulum</button>
               </div>
            </div>
        </div>
    </main>
@endsection