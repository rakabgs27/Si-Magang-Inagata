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
                <div class="tab-content handbook-content" data-handbook="mobile" id="v-pills-tabContent">
                    <div class="tab-pane show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class="mb-2" style="font-weight: bold;">Mobile Development</h3>
                        <p class="mb-2" style="line-height: 32px;">
                            Mobile App developer merupakan bidang yang bertanggung jawab untuk menerjemahkan kode ke dalam
                            aplikasi yang mudah digunakan. Bidang ini berkolaborasi dengan tim internal untuk mengembangkan
                            aplikasi seluler fungsional saat bekerja di lingkungan yang serba cepat. Pengembang seluler
                            mengembangkan antarmuka pemrograman aplikasi (API) untuk mendukung fungsionalitas seluler sambil
                            tetap mengikuti perkembangan terminologi, konsep, dan praktik terbaik untuk pengkodean aplikasi
                            seluler.
                        </p>
                        <h3 class="mt-5" style="font-weight: bold;">Skill Yang Dibutuhkan</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki pengalaman dengan Library dan API.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mampu memecahkan masalah dengan baik.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mampu menafsirkan dan mengikuti rencana teknis.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memahami penggunaan Flutter, Android Studio, dll.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Tanggung Jawab</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mengembangkan antarmuka pemrograman aplikasi (API) untuk mendukung troubleshooting.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memberikan rekomendasi dan menerapkan produk, aplikasi, dan protokol seluler yang
                                    terbaru.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Menggunakan dan menyesuaikan Aplikasi web yang ada.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Bekerja sama dengan rekan kerja untuk selalu berinovasi dalam fungsionalitas kerja dan
                                    desain aplikasi.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mengusahakan untuk Up to Date dengan konsep dan praktik terbaik untuk pengkodean
                                    aplikasi seluler.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Berkomunikasi dengan UX untuk memahami kebutuhan dan pengalaman mereka.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Mentor</h3>
                        <h6>#GrowthTogether</h6>
                        <div class="row mb-5 mt-5">
                            <div class="col-md-4 text-center">
                                <img src="{{ url('assetsLanding/img/mentor_fauzan.png') }}" alt=""
                                    class="card__logo" />
                                <div class="card__heading">Mohammad Fauzan</div>
                                <h6 style="opacity: 0.5;">Mobile Developer</h6>
                            </div>
                        </div>
                        <h3 class="mt-5" style="font-weight: bold;">Aplikasi Yang sering digunakan</h3>
                        <ul class="listings__grid" style="padding-left:5px;">
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/android-studio.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://developer.android.com/" target="_blank"
                                    rel="nofollow" style="text-decoration:none;">Android Studio</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/flutter.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://flutter.dev/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Flutter</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/xcode.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://developer.apple.com/xcode/" target="_blank"
                                    rel="nofollow" style="text-decoration:none;">Xcode</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/appcode.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://www.jetbrains.com/objc/" target="_blank"
                                    rel="nofollow" style="text-decoration:none;">Appcode</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/react-native.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://reactnative.dev/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">React Native</a>
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
