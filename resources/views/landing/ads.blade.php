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
                <div class="tab-content handbook-content" data-handbook="ads" id="v-pills-tabContent">
                    <div class="tab-pane show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class="mb-2" style="font-weight: bold;">Media & Ads</h3>
                        <p class="mb-2" style="line-height: 32px;">
                            Media merupakan bidang yang bertanggung jawab untuk menghimpun, mengelola dan mempublikasikan
                            sebuah konten yang berisikan sebuah informasi dalam bentuk gambar, foto maupun video untuk
                            mempromosikan
                            sebuah produk, jasa, trend, news dan sebagainya melalui berbagai platform (digital/fisik) yang
                            dikemas secara
                            menarik sesuai dengan target audiens yang dituju.
                        </p>
                        <h3 class="mt-5" style="font-weight: bold;">Skill Yang Dibutuhkan</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mampu mengembangkan ide secara komunikatif, strategis & inovatif.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami penggunaan social media terkini seperti Instagram, TikTok, You Tube, LinkedIn,
                                    dll.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki analytical thinking dan problem solving yang baik.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mengetahui SEO/SEM.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mengetahui dan mampu menggunakan tools pendukung sesuai kebutuhan seperti Google
                                    Workspace, Trello, Web Analytics, SEO tools, dll.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki salah satu skill yang dibutuhkan, antara lain Konten Kreator, Video Editing,
                                    Copywriting, atau Digital marketing Ads.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Tanggung Jawab</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Melakukan riset channel digital yang berpotensi sebagai media promosi potensial.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Bekerja sama dengan tim dan klien terkait brainstorming konsep, design, distribusi.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Menentukan campaign meliputi awareness, engagement, conversion, dll dengan tim
                                    operations sebagai implementer.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Merencanakan dan membuat konten dengan memahami target audience.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Brainstorming dengan team terkait konsep konten dan visualisasi.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Menulis konten secara baik dan benar sesuai dengan pedoman pada aturan bahasa/standar.
                                </td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memperluas wawasan dengan selalu update berita dan informasi terbaru.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mendokumentasikan setiap event kantor berupa foto dan video.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Mentor</h3>
                        <h6>#GrowthTogether</h6>
                        <div class="row mb-5 mt-5">
                            <div class="col-md-4 text-center">
                                <img src="{{ url('assetsLanding/img/mentor_gita.png') }}" alt=""
                                    class="card__logo" />
                                <div class="card__heading">Berlian Gita Cahyani</div>
                                <h6 style="opacity: 0.5;">Social Media Strategist</h6>
                            </div>
                        </div>
                        <h3 class="mt-5" style="font-weight: bold;">Aplikasi Yang sering digunakan</h3>
                        <ul class="listings__grid" style="padding-left:5px;">
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo adobe-photoshop.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.adobe.com/products/photoshop.html"
                                    target="_blank" rel="nofollow" style="text-decoration:none;">Photoshop</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo canva.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.canva.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Canva</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo flimora.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://filmora.wondershare.co.id/" target="_blank"
                                    rel="nofollow" style="text-decoration:none;">Filmora</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo adobe-premiere.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.adobe.com/products/premiere.html"
                                    target="_blank" rel="nofollow" style="text-decoration:none;">Adobe Premier</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo wordpress.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://wordpress.com/id/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Wordpress</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
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
