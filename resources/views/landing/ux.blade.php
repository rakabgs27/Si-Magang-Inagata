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
                <div class="tab-content handbook-content" data-handbook="ux" id="v-pills-tabContent">
                    <div class="tab-pane show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class="mb-2" style="font-weight: bold;">UI/UX Design</h3>
                        <p class="mb-2" style="line-height: 32px;">
                            Secara umum pada dunia profesional, User Experience Designer (UXD) & User Interface Design
                            merupakan dua bidang berbeda secara tugas,
                            namun sangat berdampingan dan dapat dilakukan secara bersamaan. Tugas dari UI/UX Designer adalah
                            bertanggung jawab dalam menganalisis,
                            meningkatkan produktivitas sebuah aplikasi mobile atau website dengan cara membuat rancangan
                            produk yang bermanfaat dan membangun sebuah
                            tampilan antarmuka aplikasi mobile atau website (UI) yang interaktif berdasarkan prinsip UX
                            sehingga mudah digunakan dan dapat memberikan
                            pengalaman terbaik kepada pengguna atau user. Fokus utama bagi UI/UX Designer adalah menciptakan
                            kepuasan user terhadap aplikasi yang diterjemahkan
                            dalam UI yang menarik dan mudah diterima oleh user.
                        </p>
                        <h3 class="mt-5" style="font-weight: bold;">Skill Yang Dibutuhkan</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Melakukan riset untuk user experience yang baik.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami perilaku android dan iOS dan Web.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Kompeten dalam pembuatan user flow pada sebuah aplikasi.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Membuat solusi desain dengan memerhatikan fungsional, keindahan, dan interaktif.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Familiar dan bisa menggunakan design tools seperti Figma, Adobe XD.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Melakukan usability testing & mempresentasikan hasil test design kepada stakeholder.
                                </td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Tanggung Jawab</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Menganalisis kebutuhan dan pengalaman user terhadap produk yang akan dibuat.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Melakukan kerjasama dengan Front-End Developer dalam mengembangkan UI.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Membuat wireframe, storyboard, sitemaps dan screen flows.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Membuat visual design dan layout sesuai dengan prinsip design.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Membuat design element untuk aplikasi.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mengimplementasikan semua bagian design ke dalam mockup.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Membuat mockup untuk mengembangkan persona dan skenario user.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Melakukan testing produk kepada user untuk mendapatkan feedback dan mengevaluasi
                                    pengalaman penggunaan.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Mentor</h3>
                        <h6>#GrowthTogether</h6>
                        <div class="row mb-5 mt-5">
                            <div class="col-md-4 text-center">
                                <img src="{{ url('assetsLanding/img/mentor_dicky.png') }}" alt=""
                                    class="card__logo" />
                                <div class="card__heading">Dicky Bhismawan H.</div>
                                <h6 style="opacity: 0.5;">UI Designer</h6>
                            </div>
                        </div>
                        <h3 class="mt-5" style="font-weight: bold;">Aplikasi Yang sering digunakan</h3>
                        <ul class="listings__grid" style="padding-left:5px;">
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo figma.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.figma.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Figma</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo adobe-xd.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.adobe.com/products/xd.html" target="_blank"
                                    rel="nofollow" style="text-decoration:none;">Adobe XD</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo framer.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.framer.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Framer</a>
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
