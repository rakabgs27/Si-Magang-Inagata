@extends('layouts.master')
@section('title', 'Handbook')
@section('content')
    <br />
    <div class="text-center p-2">
        <img src="{{ url('assetsLanding/img/3.png') }}" width="100" height="100" alt="...">
    </div>
    <main class="container">
        <div class="row ml-4 mb-3">
            <div class="col-md-3">
                <button type="button" class="btn btn-light button-handbook"><span style="color: #EB2227; font-weight: bold;">
                        Our Intern Handbook</span></button>
                <!-- Tabs nav -->
                <!--<a class="one">-->
                @include('component.list')
                <!--  </a> -->
            </div>
            <div class="col-md-9 jarak-mh">
                <!-- Tabs content -->
                <div class="tab-content handbook-content" data-handbook="handbook" id="v-pills-tabContent">
                    <div class="tab-pane show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class="mb-2" style="font-weight: bold;">Frontend Development</h3>
                        <p class="mt-2" style="line-height: 32px;">
                            Front-End Developer merupakan bidang yang memiliki tanggung jawab dalam pembuatan tampilan dari
                            sebuah website.
                            Fokus utama dari tugas seorang Front-End Developer yakni, memastikan bahwa setiap bagian dari
                            website dapat dilihat
                            dan berinteraksi secara langsung dengan pengguna (User). Pekerjaan ini mencakup tata letak,
                            design web, hingga
                            bagaimana perilaku dari pengalaman seorang pengguna. Hal dasar yang perlu dipahami oleh
                            Front-End developer yaitu
                            pemahaman HTML, CSS dan JavaScript.
                        </p>
                        <h3 class="mt-5" style="font-weight: bold;">Skill Yang Dibutuhkan</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami HTML, CSS, dan Javascript.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami cara menggunakan control versi seperti Git.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami konsep REST API.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami beberapa framework yang sering digunakan seperti Taliwind Boostrap, VueJS atau
                                    ReactJS.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami proses pembuatan website dengan menggunakan metode responsive web design.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Tanggung Jawab</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Kooordinasi dengan team Back-End Developer dalam hal maintance atau troubleshooting.
                                </td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memastikan website dapat di akses, baik melalui dekstop atau mobile.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memastikan optimasi design website yang mampu memaksimalkan user experiance(UX).</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mampu implementasi konsep design website ke dalam sebuah kode dengan dukungan bahasa
                                    pemrograman dan framework yang dikuasai.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Merancang kerangka website yang sesuai dengan design yang sudah ada.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Mentor</h3>
                        <h6>#GrowthTogether</h6>
                        <div class="row mb-5 mt-5">
                            <div class="col-md-4 text-center">
                                <img src="{{ url('assetsLanding/img/mentor_denny.png') }}" alt=""
                                    class="card__logo" />
                                <div class="card__heading">Denny Setia W</div>
                                <h6 style="opacity: 0.5;">Frontend Developer</h6>
                            </div>
                        </div>
                        <h3 class="mt-5" style="font-weight: bold;">Aplikasi Yang sering digunakan</h3>
                        <ul class="listings__grid" style="padding-left:5px;">
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/vscode.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://code.visualstudio.com/" target="_blank"
                                    rel="nofollow" style="text-decoration:none;">Visual Studio Code</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo postman.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.postman.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Postman Client</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo figma.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.figma.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Figma</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/github.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://github.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Github</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo gitlab.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://gitlab.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Gitlab</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo netifly.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.netlify.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Netlify</a>
                                <h6>Software Gratis </h6>
                            </li>
                        </ul>
                    </div>
                    <h3 class="mt-5" style="font-weight:bold;"> Kurikulum </h3>
                    <button type="button" class="btn btn-success button-hd"><img
                            src="{{ url('assetsLanding/img/Combined-Shape.png') }}">&nbsp;&nbsp; Download
                        Kurikulum</button>
                </div>
            </div>
        </div>
    </main>
@endsection
