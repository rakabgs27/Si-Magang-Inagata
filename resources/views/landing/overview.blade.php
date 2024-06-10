@extends('layouts.master')
@section('title', 'Overview')
@section('content')

    <body>
        <!-- Overview -->
        <main class="container">
            <div class="text-center p-2">
                <img src="{{ url('assetsLanding/img/overview.png') }}" width="100" height="100" alt="..."
                    style="margin-top: -60px">
            </div>
            <div class="row mt-4 mb-5">
                <div class="col-lg-3">
                    <div class="row overview-item">
                        <p style="color: #EB2227; font-weight: bold;">Our Overview</p>
                    </div>
                    <div class="row">
                        <h1 style="padding: 2px; margin: 10px; font-weight: bold; margin-top: 40px;">Tentang <br> InagataHUB
                        </h1>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card mt-4 content-overview" style="border-radius: 36px; border: none;">
                        <div class="overview">
                            <p class="mt-5">
                                Inagata Hub merupakan sebuah wadah bagi setiap individu yang memiliki potensi di bidang
                                teknologi dan informasi yang perlu dikembangkan.
                                Kami menyediakan layanan untuk menjembatani potensi tersebut dengan kebutuhan dunia kerja,
                                mulai dari jenjang siswa tingkat menengah ke-atas sederajat,
                                kalangan mahasiswa, hingga talent professional melalui program dengan jangka waktu yang
                                bervariasi. Selama durasi pembelajaran, peserta akan belajar sesuai
                                dengan modul dan kurikulum yang sudah kami sediakan.
                            </p>
                            <p>
                                Para alumni nantinya akan mendapatkan banyak benefit, mulai dari wawasan baru dari para
                                mentor,
                                sertifikat program, relasi anggota, hingga peluang mendapatkan karir bagi yang berkompeten.
                                <br>
                                Jadi, tunggu apa lagi? <br>
                                Join with Us, and Show your Skill !
                            </p>
                            <h3>Our Program</h3>
                        </div>
                        <div class="program">
                            <p>
                                <b>1. Internship <br>(Tingkat Pemula):</b>
                                Pada tahap ini, peserta dilatih agar terus dapat mengembangkan kompetensi diri dibidang
                                teknologi dan informasi dengan bimbingan mentor
                                yang berpengalaman. Durasi yang ditempuh pada program ini, minimal <b>3 bulan</b> untuk
                                kalangan universitas dan <b>4 bulan</b> untuk pelajar SMK.
                            </p>
                            <p>
                                <b>2. Continuing Profesional Development(CPD) <br>(Tingkat Menengah):</b>
                                Tahapan (CPD) merupakan tahap lanjutan dari program Internship. Para peserta yang sudah
                                memiliki Skill Qualified nantinya akan langsung bergabung menjadi
                                bagian Tim untuk menangani suatu real project secara profesional dibidang teknologi dan
                                informasi selama <b>1 Tahun</b>.
                            </p>
                        </div>
                        <h3>Rules</h3>
                        <button type="button" class="btn btn-success"
                            style="border: none; background: #07DC61; border-radius: 12px; width: 190px; height: 40px; margin-bottom: 50px;">
                            <img src="{{ url('assetsLanding/img/Combined-Shape.png') }}">&nbsp;&nbsp; Download
                            Rules</button>
                    </div>
                </div>
            </div>
        </main>
    </body>
@endsection
