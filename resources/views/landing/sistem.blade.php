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
                <div class="tab-content handbook-content" data-handbook="sistem" id="v-pills-tabContent">
                    <div class="tab-pane show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3 class="mb-2" style="font-weight: bold;">System Analyst</h3>
                        <p class="mb-2" style="line-height: 32px;">
                            Analisis sistem merupakan bidang yang bertanggung jawab dalam mengidentifikasi masalah yang ada
                            pada sistem mencakup mengumpulkan data, membersihkan data, menganalisis data dan membuat
                            hipotesis/kesimpulan
                            dari data yang sudah diolah. Fokus utama dari Data Analyst yaitu memecahkan masalah/mencari
                            insight dan memberikan
                            informasi (data) kepada stakeholders untuk memahami kebutuhan bisnis.
                        </p>
                        <h3 class="mt-5" style="font-weight: bold;">Skill Yang Dibutuhkan</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki kemampuan problem solving & komunikasi yang baik.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki pemahaman yang kuat tentang statistik dan matematika.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki pemahaman terkait model data, pengembangan design database, teknik data mining
                                    dan segmentasi.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Memiliki kemampuan dalam menyajikan informasi melalui bagan dan grafik dengan
                                    menggunakan tools seperti Tableau dan lain-lain.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mampu menggunakan tools analisis seperti SQL, XML, JavaScript dan sebagainya.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Pemahaman bahasa pemrograman menjadi nilai tambah.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Tanggung Jawab</h3>
                        <table class="jarak-h">
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Mengumpulkan data dengan melakukan survei, melacak karakteristik pengunjung di situs web
                                    perusahaan dan lain-lain.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Menata dan mengatur ulang data yang sudah didapatkan, lalu diubah kedalam format yang
                                    mudah dibaca dan dipahami.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Menafsirkan data/membuat kesimpulan dari data yang sudah dikumpulkan dengan menggunakan
                                    alat statistik.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Menyiapkan laporan untuk stakeholder yang berisikan tentang tren, pola dan prediksi
                                    menggunakan data yang relevan.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Membuat dokumentasi yang sesuai untuk stakeholders dalam memahami langkah-langkah proses
                                    analisis data.</td>
                            </tr>
                            <tr>
                                <td><img src="{{ url('assetsLanding/img/ic_checlist.svg') }}" class="ic_checlist"></td>
                                <td>Bekerja sama dengan team yang relevan.</td>
                            </tr>
                        </table>
                        <h3 class="mt-5" style="font-weight: bold;">Mentor</h3>
                        <h6>#GrowthTogether</h6>
                        <div class="row mb-5 mt-5">
                            <div class="col-md-4 text-center">
                                <img src="{{ url('assetsLanding/img/mentor_nur.png') }}" alt=""
                                    class="card__logo" />
                                <div class="card__heading">Nur Ainul Yusro</div>
                                <h6 style="opacity: 0.5;">Analyst</h6>
                            </div>
                        </div>
                        <h3 class="mt-5" style="font-weight: bold;">Aplikasi Yang sering digunakan</h3>
                        <ul class="listings__grid" style="padding-left:5px;">
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo google-analytics.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://ads.google.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Google Analytic</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo Google-Workspace.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://workspace.google.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Google Workspace</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/xmind.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://www.xmind.net/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Xmind</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/slack.png') }}" alt="" class="card__logo" />
                                <a class="card__heading" href="https://app.slack.com/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Slack</a>
                                <h6 style="opacity: 0.5;">Software Gratis</h6>
                            </li>
                            <li class="card apk">
                                <img src="{{ url('assetsLanding/img/logo draw.io.png') }}" alt=""
                                    class="card__logo" />
                                <a class="card__heading" href="https://app.diagrams.net/" target="_blank" rel="nofollow"
                                    style="text-decoration:none;">Draw.io</a>
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
                                <img src="{{ url('assetsLanding/img/logo inagatatool.png') }}" alt=""
                                    class="card__logo" />
                                <div class="card__heading">Tool Inagata</div>
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
