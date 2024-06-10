@extends('layouts.master')
@section('title', 'Home')
@section('content')

    <body>
        <main class="container-fluid">
            {{-- Anisa --}}
            <!-- Tingkatkan Skill -->
            <div class="row pb-4 texthome walik">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h1><b>Tingkatkan Skill anda <br>di InagataHub</b></h1>
                    <br>
                    <h6 style="font-size: 16px;"><b>Kami mencari pahlawan super seperti kalian!</b> Dapatkan pengalaman <br>
                        bekerja di perusahaan teknologi bersama-sama membentuk masa depan <br>yang lebih baik.</h6>
                    <br>
                    <a href="/register-pendaftar"><button type="button" class="btn btn-outline-danger button-s">Daftar
                            Sekarang Juga</button></a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="{{ url('assetsLanding/img/Herro Image.png') }}" class="img-cov">
                </div>
                <a class="buttonLink" href="https://wa.me/6281913006938" target="_blank" rel="nofollow"><button
                        type="button" class="btn btn-large verticalButton"><img
                            src="{{ url('assetsLanding/img/More Square.png') }}" style="width:20px;" /> Pertanyaan
                        Lain</button></a>
            </div>
        </main>
        <!-- Logo Partner -->
        <main class="container-fluid">
            <div class="row justify-content-center" style="background-color: #DADCDE;">
                <ul class="partner">
                    <li><img src="{{ url('assetsLanding/img/UB.png') }}" alt=""></li>
                </ul>
                <ul class="partner">
                    <li><img src="{{ url('assetsLanding/img/UM.png') }}" alt=""></li>
                </ul>
                <ul class="partner">
                    <li><img src="{{ url('assetsLanding/img/UIN.png') }}" alt=""></li>
                </ul>
                <ul class="partner">
                    <li><img src="{{ url('assetsLanding/img/binus.png') }}" alt=""></li>
                </ul>
                <ul class="partner">
                    <li><img src="{{ url('assetsLanding/img/politekjember.png') }}" alt=""></li>
                </ul>
                <ul class="partner">
                    <li><img src="{{ url('assetsLanding/img/SMKN1PURWOSARI.png') }}" alt=""></li>
                </ul>
                <ul class="partner">
                    <li><img src="{{ url('assetsLanding/img/SMKN5MALANG.png') }}" alt=""></li>
                </ul>
                <ul class="partner">
                    <li><img src="{{ url('assetsLanding/img/SMKN12MALANG.png') }}" alt=""></li>
                </ul>
            </div>
        </main>
        <!-- Temukan Passion -->
        <main class="container">
            <div class="row pb-5">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h3><b>Temukan <i>Passion</i> kamu <br> Berdasarkan Kategori Yang Kami<br> Sediakan</h3></b>
                    <p>Pilihan lengkap membangun karir dimasa depan yang lebih baik</p>
                </div>
            </div>
            <!-- Card Career -->

            <div class="row pb-5" style="margin-top:-20px;">
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="card mb-4 box-shadow a-card">
                        <img src="{{ url('assetsLanding/img/iic_karir__backend.png') }}" class="ic_career">
                        <div class="card-body d-flex flex-column">
                            <p class="a-card__heading"> Backend Developer</p>
                            <p>Merancang perangkat lunak dari sisi server yang berhubungan dengan logika dan database.</p>
                            <a href="backend?#v-pills-tabContent" type="button"
                                class="mt-auto btn btn-block btn-light button-l">Lihat detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="card mb-4 box-shadow a-card">
                        <img src="{{ url('assetsLanding/img/ic_karir__frontend.png') }}" class="ic_career">
                        <div class="card-body d-flex flex-column">
                            <p class="a-card__heading"> Frontend Developer</p>
                            <p>Membuat tampilan dari sebuah website dan memastikan setiap bagian dapat dilihat dan
                                berinteraksi dengan User.</p>
                            <a href="handbook?#v-pills-tabContent" type="button"
                                class="mt-auto btn btn-block btn-light button-l">Lihat detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="card mb-4 box-shadow a-card">
                        <img src="{{ url('assetsLanding/img/ic_karir__mobile.png') }}" class="ic_career">
                        <div class="card-body d-flex flex-column">
                            <p class="a-card__heading"> Mobile Developer</p>
                            <p>Menerjemahkan kode dan mengembangkan aplikasi seluler yang mudah digunakan dan fungsional.
                            </p>
                            <a href="mobile?#v-pills-tabContent" type="button"
                                class="mt-auto btn btn-block btn-light button-l">Lihat detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="card mb-4 box-shadow a-card">
                        <img src="{{ url('assetsLanding/img/ic_karir__ui.png') }}" class="ic_career">
                        <div class="card-body d-flex flex-column">
                            <p class="a-card__heading"> UX/UI Design</p>
                            <p>Membuat rancangan produk dan membangun sebuah tampilan antarmuka aplikasi mobile dan website.
                            </p>
                            <a href="ux?#v-pills-tabContent" type="button"
                                class="mt-auto btn btn-block btn-light button-l">Lihat detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="card mb-4 box-shadow a-card">
                        <img src="{{ url('assetsLanding/img/ic_karir_analyze.png') }}" class="ic_career">
                        <div class="card-body d-flex flex-column">
                            <p class="a-card__heading"> System Analyst</p>
                            <p>Mengidentifikasi dan membuat hipotesis terkait data yang sudah diolah, hingga memecahkan
                                masalah pada suatu project.</p>
                            <a href="sistem?#v-pills-tabContent" type="button"
                                class="mt-auto btn btn-block btn-light button-l">Lihat detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="card mb-4 box-shadow a-card">
                        <img src="{{ url('assetsLanding/img/ic_karir_management.png') }}" class="ic_career">
                        <div class="card-body d-flex flex-column">
                            <p class="a-card__heading"> Management</p>
                            <p>Mengatur dan mengontrol segala aktivitas hingga event yang berhubungan dengan kantor.</p>
                            <a href="management?#v-pills-tabContent" type="button"
                                class="mt-auto btn btn-block btn-light button-l">Lihat detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="card mb-4 box-shadow a-card">
                        <img src="{{ url('assetsLanding/img/ic_karir_media.png') }}" class="ic_career">
                        <div class="card-body d-flex flex-column">
                            <p class="a-card__heading"> Media & Ads</p>
                            <p>Mendokumentasikan dan mempublish konten untuk kebutuhan branding.</p>
                            <a href="ads?#v-pills-tabContent" type="button"
                                class="mt-auto btn btn-block btn-light button-l">Lihat detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                    <div class="card mb-4 box-shadow a-card">
                        <img src="{{ url('assetsLanding/img/ic_karir_illustration.png') }}" class="ic_career">
                        <div class="card-body d-flex flex-column">
                            <p class="a-card__heading"> Icon & Illustration</p>
                            <p>Membuat objek visual baik berupa icon, maupun illustration.</p>
                            <a href="icon?#v-pills-tabContent" type="button"
                                class="mt-auto btn btn-block btn-light button-l">Lihat detail</a>
                        </div>
                    </div>
                </div>
            </div>

            @if (false)
                <div class="row pb-5" style="margin-top:-20px;">
                    @foreach ($kurikulum as $kur)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="a-card">
                                {{-- image belum ambil dari database --}}
                                <img src="{{ url('assetsLanding/img/iic_karir__backend.png') }}" class="ic_career">
                                <p class="a-card__heading">{{ $kur->kategori }}</p>
                                <a href="{{ route('down', $kur->id_kurikulum) }}"><button type="button"
                                        class="btn btn-success button-h">Download Kurikulum</button></a>
                                <br>
                                <a href="#"><button type="button" class="btn btn-light button-l">Lihat
                                        detail</button></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Platform belajar & Kolaborasi -->
            <div>
                <h3><b>Platform Belajar & Kolaborasi <br>berbasis (real project)</b></h3>
                <p>Yuk Upgrade kemampuanmu bersama team dan mentor di inagata hub <br>yang berpengalaman di bidangnya dengan
                    2 program pilihan!</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img class="w-100 shadow-1-strong rounded" src="{{ url('assetsLanding/img/image_internship.png') }}"
                        alt="" title="">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 cpd">
                    <b><span style="color: #FF0000;">Beginner Stage</span></b>
                    <h1><b>Internship</b></h1>
                    <p>Pengembangan kompetensi diri dibidang teknologi & digital <br>kreatif dengan bimbingan para mentor
                        berpengalaman <br>dibidangnya.</p>
                    <br>
                    <img class="img-kolab" src="{{ url('assetsLanding/img/Group 28.png') }}" />
                    <h6 class="teks-kolab">* Mahasiswa Universitas minimal 4 bulan /<br> Siswa SMK minimal 6 bulan.</h6>
                </div>
            </div>
            <!-- CPD -->
            <div class="row walik">
                <div class="col-lg-6 col-md-12 col-sm-12 cpd">
                    <b><span style="color: #FF0000">Mediume Stage</span></b>
                    <h1><b>Continuing <br>Professional <br>Development (CPD)</b></h1>
                    <p>Menjadi bagian Tim menangani suatu real project secara <br>profesional dibidang teknologi dan digital
                        kreatif.</p>
                    <img class="img-cpd" src="{{ url('assetsLanding/img/Group 28.png') }}" />
                    <h6 class="teks-kolab">* Kontrak kerja secara profesional dalam kurun <br>waktu 1 tahun.</h6>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img class="w-100 shadow-1-strong rounded" src="{{ url('assetsLanding/img/image_cpd.png') }}"
                        alt="" title="">
                </div>
            </div>
            <!-- Proses Seleksi & Perekrutan -->
            <div class="pt-5">
                <h3><b>Proses Seleksi & Perekrutan</b></h3>
                <p>Menarapkan <b><i>Quality Control</i></b> yang ketat sesuai standar yang telah <br>kami tentukan.</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card seleksi">
                        <img src="{{ url('assetsLanding/img/01.png') }}" class="ic_seleksi1">
                        <br>
                        <img src="{{ url('assetsLanding/img/1a.png') }}" class="ic_seleksi2">
                        <br>
                        <p style="font-size: 18px;"><b>Mengisi form <br>registrasi</b></p>
                        <p>Calon peserta magang wajib mengisi formulir pendaftaran yang sudah tercantum di Website Inagata.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card seleksi">
                        <img src="{{ url('assetsLanding/img/02.png') }}" class="ic_seleksi1">
                        <br>
                        <img src="{{ url('assetsLanding/img/2a.png') }}" class="ic_seleksi2">
                        <br>
                        <p style="font-size: 18px;"><b>Seleksi Administrasi & <br>Tes Kualifikasi <i>Skill</i></b></p>
                        <p>Peserta akan dikonfirmasi melalui email yang terdaftar. Agar selanjutnya bisa mengikuti Tes
                            Administrasi dan mengerjakan soal Tes Teknik yang sudah disediakan oleh panitia penerimaan
                            magang.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card seleksi">
                        <img src="{{ url('assetsLanding/img/03.png') }}" class="ic_seleksi1">
                        <br>
                        <img src="{{ url('assetsLanding/img/3a.png') }}" class="ic_seleksi2">
                        <br>
                        <p style="font-size: 18px;"><b>Wawancara bersama <br>HRD & calon mentor</b></p>
                        <p>Peserta yang lolos tahap seleksi administrasi dan skill, kemudian melakukan sesi interview.
                            Jadwal Interview akan kami informasikan pada masing-masing Email yang telah terdaftar.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card seleksi">
                        <img src="{{ url('assetsLanding/img/04.png') }}" class="ic_seleksi1">
                        <br>
                        <img src="{{ url('assetsLanding/img/4a.png') }}" class="ic_seleksi2">
                        <br>
                        <p style="font-size: 18px;"><b>Pengumuman</b></p>
                        <p>Kami akan menginformasikan hasil akhir kepada para peserta yang telah mengikuti semua tahapan
                            melalui masing-masing email dan nomor HP yang terdaftar. Peserta yang lolos, kemudian dinyatakan
                            berhak dan resmi untuk mengikuti program Inagata Hub.</p>
                    </div>
                </div>
            </div>
            {{-- Anisa --}}
            <!-- Cerita pengalaman mereka -->
            <div class="pt-5">
                <h3><b>Cerita Pengalaman Mereka</b></h3>
            </div>
            <div class="container_u pb-5">
                <!--slider------------------->
                <ul id="autoWidth" class="cs-hidden">
                    <!--1------------------------------>
                    <li class="item-a ">
                        <!--slider-box-->
                        <div class="box pt-1">
                            <!--model-->
                            <div class="model rounded-circle position-relative overflow-hidden"
                                style="width: 100px;height: 100px;background-color: #DADCDE;">
                                <img src="{{ url('assetsLanding/img/1 Fata.png') }}"
                                    class="position-absolute w-100 top-0">
                            </div>
                            <h5 class="nama mb-3"><b>
                                    M. Fata Habibullah</b></h5>
                            <h6 class="sekolah">DKV Vokasi Uiversitas Brawijaya</h6>
                            <h6 class="sekolah">UI/UX Design</h6>
                            <!--details-->
                            <div class="details">
                                <!--character-details-->
                                <p style="height: 245px;" class="overflow-auto fata">
                                    “Banyak insight baru yang saya dapatkan
                                    khususnya di bidang UI/UX dan industri. Di bidang
                                    UI/UX sendiri insight yang saya dapatkan mulai dari standard grid UI untuk mobile
                                    android, IOS, dan website serta responsive design. Selain itu tentang cara membuat
                                    design system dan masih banyak lagi. Sedangkan di bidang industri, saya jadi tau
                                    bagaimana atmosfer di dunia industri dan mengerjakan real project, selain itu saya juga
                                    bisa mempelajari bagaimana memasarkan produk kita di marketplace. Selain itu saya juga
                                    mendapat relasi baru dan banyak teman baru”
                                </p>

                            </div>
                        </div>
                    </li>
                    <!--2------------------------------>
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box pt-1">
                            <!--model-->
                            <div class="model rounded-circle position-relative overflow-hidden"
                                style="width: 100px;height: 100px;background-color: #DADCDE;">
                                <img src="{{ url('assetsLanding/img/2 Rosyad.png') }}"
                                    class="position-absolute w-100 top-0">
                            </div>
                            <h5 class="nama mb-3"><b>Abdul Rosyad</b></h5>
                            <h6 class="sekolah">TI Universitas Negeri Jember</h6>
                            <h6 class="sekolah">System Analyst</h6>
                            <!--details-->
                            <div class="details">
                                <!--character-details-->
                                <p>“Ilmu yang belum pernah dipelajari di kampus di ajarkan di Hub Academy”</p>
                            </div>
                        </div>
                    </li>
                    <!--3------------------------------>
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box pt-1">
                            <!--model-->
                            <div class="model rounded-circle position-relative overflow-hidden"
                                style="width: 100px;height: 100px;background-color: #DADCDE;">
                                <img src="{{ url('assetsLanding/img/3 Ferdiansyah.png') }}"
                                    class="position-absolute w-100 top-0">
                            </div>
                            <h5 class="nama mb-3"><b>Ferdiyan Syah</b></h5>
                            <h6 class="sekolah">TI Universitas Dinamika Surabaya</h6>
                            <h6 class="sekolah">Frontend Developer</h6>
                            <!--details-->
                            <div class="details">
                                <!--character-details-->
                                <p>“saya sangat bersyukur dan senang diterima magang disini. para mentor dan manajemennya
                                    sangat membantu dan berpengalaman. dapat teman baru dan bisa diajak sharing juga. the
                                    best”</p>
                            </div>
                        </div>
                    </li>
                    <!--4------------------------------>
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box pt-1">
                            <!--model-->
                            <div class="model rounded-circle position-relative overflow-hidden"
                                style="width: 100px;height: 100px;background-color: #DADCDE;">
                                <img src="{{ url('assetsLanding/img/4 Fisca.png') }}"
                                    class="position-absolute w-100 top-0">
                            </div>
                            <h5 class="nama mb-3"><b> Fisca Fadillah</b></h5>
                            <h6 class="sekolah">TI Politeknik Kota Malang</h6>
                            <h6 class="sekolah">Backend Developer</h6>
                            <!--details-->
                            <div class="details">
                                <!--character-details-->
                                <p>"Mendapatkan materi baru untuk pemula tentang task-task yang menggambarkan seorang back
                                    end developer"</p>
                            </div>
                        </div>
                    </li>
                    <!--5------------------------------>
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box pt-1">
                            <!--model-->
                            <div class="model rounded-circle position-relative overflow-hidden"
                                style="width: 100px;height: 100px;background-color: #DADCDE;">
                                <img src="{{ url('assetsLanding/img/5 Ken.png') }}"
                                    class="position-absolute w-100 top-0">
                            </div>
                            <h5 class="nama mb-3"><b>Muhammad Ken Deazzizan P. </b></h5>
                            <h6 class="sekolah">SMK Telkom Malang</h6>
                            <h6 class="sekolah">UI/UX Design</h6>
                            <!--details-->
                            <div class="details">
                                <!--character-details-->
                                <p>“Banyak sekali yang saya dapatkan di hub academy, mulai dari peraturan dasar dalam UI/UX
                                    Desain, Design system, 8pt Rules, hingga mendapat pengalaman dalam bekerja as a team di
                                    projek UI/UX Desain”</p>
                            </div>
                        </div>
                    </li>
                    <!--6------------------------------>
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box pt-1">
                            <!--model-->
                            <div class="model rounded-circle position-relative overflow-hidden"
                                style="width: 100px;height: 100px;background-color: #DADCDE;">
                                <img src="{{ url('assetsLanding/img/6 Tarisma.png') }}"
                                    class="position-absolute w-100 top-0">
                            </div>
                            <h5 class="nama mb-3"><b> Tarisma W.S</b></h5>
                            <h6 class="sekolah">Universitas Brawijaya</h6>
                            <h6 class="sekolah">Graphic Icon & Illustration</h6>
                            <!--details-->
                            <div class="details">
                                <!--character-details-->
                                <p>“Dasar-dasar membuat icon dan ilustrasi, dasar-dasar menggunakan Adobe Illustrator.
                                    Menyenangkan bisa dapat ilmu-ilmu baru yang belum pernah dipelajari”</p>
                            </div>
                        </div>
                    </li>
                    <!--7------------------------------>
                    <li class="item-a">
                        <!--slider-box-->
                        <div class="box pt-1">
                            <!--model-->
                            <div class="model rounded-circle position-relative overflow-hidden"
                                style="width: 100px;height: 100px;background-color: #DADCDE;">
                                <img src="{{ url('assetsLanding/img/7 Alvita.png') }}"
                                    class="position-absolute w-100 top-0">
                            </div>
                            <h5 class="nama mb-3"><b>Alvita Risqi Zuhairunisa</b></h5>
                            <h6 class="sekolah">Universitas Brawijaya</h6>
                            <h6 class="sekolah">Media & Creative</h6>
                            <!--details-->
                            <div class="details">
                                <!--character-details-->
                                <p>“Mendapatkan pelajaran dan pengalaman baru yang belum pernah didapatkan diperkuliahan,
                                    menjadi lebih percaya diri, dan juga mentor yang sangat baik”</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Ready To Build -->
            <div class="row pb-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card ready"
                        style="background-image: url({{ url('assetsLanding/img/MaskGroup2.png') }});">
                        <div class="card-body">
                            <div class="text-center p-2">
                                <img src="{{ url('assetsLanding/img/Profile.png') }}" class="rounded" width="55"
                                    height="55" alt="...">
                            </div>
                            <div class="text-center p-2">
                                <h3 class="card-title"><b>Ready to Build Your Future?</b></h3>
                                <h6 class="card-title">Belajar langsung dari mentor berpengalaman di bidangnya, dan <br>
                                    upgrade skillmu sekarang juga!</h6>
                            </div>
                            <div class="text-center p-2">
                                <a href="/register-pendaftar"><button type="button" class="btn btn-danger">Daftar
                                        Sekarang</button></a>
                            </div>
                            <div class="text-center p-2">
                                <a href="#"><button type="button" class="btn btn-outline-danger"><span
                                            style="color: black">Internship Rules</span></button></a>
                            </div>
                            <div class="text-center p-2">
                                <p>Ingin informasi lebih lanjut mengenai InagataHub?<b><br> 0819 1300 6938 (Admin
                                        InagataHub)</b><br><b> hub@inagata.com (Via Email)</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mereka Bertanya Kepada Kami -->
            <div>
                <h3><b>Mereka Bertanya Kepada Kami</b></h3>
                <p>QnA Inagata Hub</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img class="w-100 shadow-1-strong rounded" src="{{ url('assetsLanding/img/QnA.png') }}"
                        alt="..." title="">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <a data-bs-toggle="collapse" data-bs-target="#QnA1" aria-expanded="false"
                                aria-controls="QnA1" style="color: black;font-size:20px">
                                <h2 class="accordion-header" id="headingOne">
                                    <b style="font-size: 20px;"><span style="color: #FF0000;">01</span> Apakah inagata
                                        menerima siswa/mahasiswa magang?</b>
                                </h2>
                            </a>
                            <div id="QnA1" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Penerimaan siswa/mahasiswa magang di InagataHub dilakukan setiap saat, namun kami hanya
                                    menerima siswa/mahasiswa yang benar-benar berkompeten.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a data-bs-toggle="collapse" data-bs-target="#QnA2" aria-expanded="false"
                                aria-controls="QnA2" style="color: black;font-size:20px">
                                <h2 class="accordion-header" id="headingTwo">
                                    <b style="font-size: 20px;"><span style="color: #FF0000;">02</span> Apakah bisa magang
                                        di Inagata secara berkelompok?</b>
                                </h2>
                            </a>
                            <div id="QnA2" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Jika ingin mendaftar secara kelompok diperbolehkan, namun penentuan diterima/tidak serta
                                    tahapan tes akan kami lakukan untuk individu bukan kelompok.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a data-bs-toggle="collapse" data-bs-target="#QnA3" aria-expanded="false"
                                aria-controls="QnA3" style="color: black;font-size:20px">
                                <h2 class="accordion-header" id="headingThree">
                                    <b style="font-size: 20px;"><span style="color: #FF0000;">03</span> Bagaimana jika
                                        jadwal dari kampus atau sekolah kami tidak seperti waktu yang ditentukan?</b>
                                </h2>
                            </a>
                            <div id="QnA3" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Pendaftar yang dinyatakan lolos dalam semua tahap tes, maka akan ada ketentuan baru
                                    untuk waktu magang yang disesuaikan dengan waktu yang ditentukan sekolah/universitas.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a data-bs-toggle="collapse" data-bs-target="#QnA4" aria-expanded="false"
                                aria-controls="QnA4" style="color: black;font-size:20px">
                                <h2 class="accordion-header" id="headingFour">
                                    <b style="font-size: 20px;"><span style="color: #FF0000;">04</span> Kapan tahap tes
                                        akan dilakukan? Dan bagaimana caranya?</b>
                                </h2>
                            </a>
                            <div id="QnA4" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Tes akan dilakukan sesuai urutan dan dalam jangka waktu maksimal 7x24 Jam pemeriksaan
                                    hasil tes oleh tim Inagata. Tes administrasi dan tes skill dilakukan secara online,
                                    kemudian untuk interview dilakukan secara langsung dengan persetujuan waktu dan tempat
                                    oleh kedua belah pihak.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a data-bs-toggle="collapse" data-bs-target="#QnA5" aria-expanded="false"
                                aria-controls="QnA5" style="color: black;font-size:20px">
                                <h2 class="accordion-header" id="headingFive">
                                    <b style="font-size: 20px;"><span style="color: #FF0000;">05</span> Apa perbedaan
                                        program internship dan CPD?</b>
                                </h2>
                            </a>
                            <div id="QnA5" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Program internship mentoring kami fokuskan pada pengembangan minat dan bakat yang sudah
                                    diterima di sekolah/universitas sebelumnya, jika CPD kami fokuskan mentoring pada
                                    pengerjaan project secara langsung baik internal maupun eksternal.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kuota Tersedia -->
            <div class="sm-hidden">
                <div class="pt-5">
                    <h3><b>Kuota Tersedia</b></h3>
                </div>
                <div class="accordion" id="accordionkuota">
                    <div class="accordion-item">
                        <a type="button" data-bs-toggle="collapse" data-bs-target="#kuota" aria-expanded="true"
                            aria-controls="collapsekuota"
                            style="color: black; width: 100%; font-size: 14px; padding-top: -20px;">
                            <h6 class="accordion-header-kuota" id="headingkuota" style="font-size: 14px;">
                                Pastikan masih ada kesempatan bagi anda!
                            </h6>
                        </a>
                    </div>
                </div>
                <hr class="garis-kuota">
                <div class="row pb-5">
                    <div class="col-lg-6">
                        <div id="kuota" class="panel-collapse collapse in">
                            <div class="row">
                                <div class="col" style="font-size: 15px"><b>Backend Developer</b></div>
                                <div class="col text-right"><span class="pull-right">Tersedia</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="kuota" class="panel-collapse collapse in">
                            <div class="row">
                                <div class="col" style="font-size: 15px"><b>Analyze</b></div>
                                <div class="col text-right"><span class="pull-right">Tersedia</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-lg-6">
                        <div id="kuota" class="panel-collapse collapse in">
                            <div class="row">
                                <div class="col" style="font-size: 15px"><b>Frontend Developer</b></div>
                                <div class="col text-right"><span class="pull-right">Tersedia</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="kuota" class="panel-collapse collapse in">
                            <div class="row">
                                <div class="col" style="font-size: 15px"><b>Management</b></div>
                                <div class="col text-right"><span class="pull-right">Tersedia</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-lg-6">
                        <div id="kuota" class="panel-collapse collapse in">
                            <div class="row">
                                <div class="col" style="font-size: 15px"><b>Mobile Developer</b></div>
                                <div class="col text-right"><span class="pull-right">Tersedia</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="kuota" class="panel-collapse collapse in">
                            <div class="row">
                                <div class="col" style="font-size: 15px"><b>Media & Ads</b></div>
                                <div class="col text-right"><span class="pull-right">Tersedia</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-lg-6">
                        <div id="kuota" class="panel-collapse collapse in">
                            <div class="row">
                                <div class="col" style="font-size: 15px"><b>UI/UX Design</b></div>
                                <div class="col text-right"><span class="pull-right">Tersedia</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="kuota" class="panel-collapse collapse in">
                            <div class="row">
                                <div class="col" style="font-size: 15px"><b>Icon & Graphic Design</b></div>
                                <div class="col text-right"><span class="pull-right">Tersedia</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
