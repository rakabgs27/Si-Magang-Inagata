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
                <div class="tab-content handbook-content" data-handbook="icon" id="v-pills-tabContent">
                    <div class="tab-pane show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class="mb-2" style="font-weight: bold;">Icon & Illustration</h3>
                        <p class="mb-2" style="line-height: 32px;">
                            Icon & illustration merupakan bidang yang bertanggung jawab untuk membuat objek visual baik
                            berupa icon,
                            maupun illustration. Dalam pembagian tugas, icon designer memiliki bagian untuk khusus icon
                            sedangkan illustrator
                            khusus memiliki bagian untuk kebutuhan asset illustrasi.
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
                                <td>Memiliki pemahaman dasar mengenai prinsip desain.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki keterampilan desain dan visual yang baik.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki perspektif visual yang baik.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mampu memahami dan membuat blueprint sesuai dengan kebutuhan user.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki kemampuan dalam membuat sketsa/ilustrasi.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mampu menggunakan software grafis seperti Adobe illustrator, Corel, Figma, dll.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Mentor</h3>
                        <h6>#GrowthTogether</h6>
                        <div class="row mb-5 mt-5">
                            <div class="col-md-4 text-center">
                                <img src="{{ url('assetsLanding/img/mentor_rifaldi.png') }}" alt=""
                                    class="card__logo" />
                                <div class="card__heading">Moh Rifaldi</div>
                                <h6 style="opacity: 0.5;">Graphic Crafter</h6>
                            </div>
                        </div>
                        <h3 class="mt-5" style="font-weight: bold;">Aplikasi Yang sering digunakan</h3>
                        <ul class="listings__grid" style="padding-left:5px;">
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo adobe-illustrator.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.adobe.com/sea/products/illustrator.html"
                                    target="_blank" rel="nofollow" style="text-decoration:none;">Illustration</a>
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
                                <img src="{{ url('assetsLanding/img/logo adobe-after-effects.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://www.adobe.com/sea/products/aftereffects.html"
                                    target="_blank" rel="nofollow" style="text-decoration:none;">After Effect</a>
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
