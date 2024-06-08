@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Nilai</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <!-- Form Pilih Divisi -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Pilih Divisi</h4>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('list-nilai.index') }}" class="mb-4">
                                <div class="form-group">
                                    <label for="divisi_id">Divisi</label>
                                    <select class="form-control select2" id="divisi_id" name="divisi_id"
                                        onchange="this.form.submit()">
                                        @foreach ($divisiMentors as $divisiMentor)
                                            <option value="{{ $divisiMentor->divisi_id }}"
                                                {{ $divisiId == $divisiMentor->divisi_id ? 'selected' : '' }}>
                                                {{ $divisiMentor->divisi->nama_divisi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tabel List Nilai -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>List Nilai Pendaftar Divisi:
                                {{ $divisiMentors->where('divisi_id', $divisiId)->first()->divisi->nama_divisi }}</h4>
                            <div class="d-flex flex-row-reverse card-header-action">
                                <div class="card-header-actions">
                                    <a class="btn btn-icon icon-left btn-primary"
                                        href="{{ route('list-nilai.create', ['divisi_id' => $divisiId]) }}">Tambah Nilai
                                        Pendaftar</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pendaftar</th>
                                            <th>Divisi Pendaftar</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['pendaftar']->user->name }}</td>
                                                <td>{{ $item['pendaftar']->divisi->nama_divisi }}</td>
                                                <td
                                                    class="status {{ $item['status'] === 'Belum Dinilai' ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">
                                                    {{ $item['status'] }}
                                                </td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="#" class="btn btn-sm btn-info btn-icon"
                                                            data-toggle="collapse"
                                                            data-target="#collapse-{{ $key }}"><i
                                                                class="fas fa-eye"></i> View Detail</a>
                                                        <a href="{{ route('list-nilai.edit', $item['pendaftar']->id) }}"
                                                            class="btn btn-sm btn-warning btn-icon ml-2"><i
                                                                class="fas fa-edit"></i> Edit</a>
                                                        @if ($item['wawancara_selesai'])
                                                            <button type="button"
                                                                class="btn btn-sm btn-primary btn-icon ml-2"
                                                                data-toggle="modal"
                                                                data-target="#nilaiWawancaraModal-{{ $key }}">
                                                                <i class="fas fa-plus"></i> Input Nilai Wawancara
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="hiddenRow">
                                                    <div id="collapse-{{ $key }}" class="collapse p-3">
                                                        <div class="card border-primary">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        @switch($divisiId)
                                                                            @case(1)
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki pengetahuan yang luas dalam
                                                                                            arsitektur software:</strong>
                                                                                        {{ $item['kriteria']['kriteria_1'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_1']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami cara deployment ke server
                                                                                            menjadi nilai tambah:</strong>
                                                                                        {{ $item['kriteria']['kriteria_2'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_2']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami penggunaan kontrol versi
                                                                                            seperti Git:</strong>
                                                                                        {{ $item['kriteria']['kriteria_3'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_3']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki pengetahuan tentang
                                                                                            functional dan object oriented
                                                                                            programming:</strong>
                                                                                        {{ $item['kriteria']['kriteria_4'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_4']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami bahasa pemrograman seperti
                                                                                            PHP, dan NodeJS:</strong>
                                                                                        {{ $item['kriteria']['kriteria_5'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_5']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami SQL database:</strong>
                                                                                        {{ $item['kriteria']['kriteria_6'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_6']) }})
                                                                                    </li>
                                                                                    @if ($item['status_wawancara'])
                                                                                        <li class="list-group-item">
                                                                                            <strong>Nilai Tes Wawancara:</strong>
                                                                                            {{ $item['nilai_wawancara'] ?? 'N/A' }}
                                                                                            ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['nilai_wawancara']) }})
                                                                                        </li>
                                                                                    @endif
                                                                                </ul>
                                                                            @break

                                                                            @case(2)
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami HTML, CSS, dan
                                                                                            Javascript:</strong>
                                                                                        {{ $item['kriteria']['kriteria_7'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_7']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami cara menggunakan control
                                                                                            versi seperti Git:</strong>
                                                                                        {{ $item['kriteria']['kriteria_8'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_8']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami konsep REST API:</strong>
                                                                                        {{ $item['kriteria']['kriteria_9'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_9']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami beberapa framework yang
                                                                                            sering digunakan seperti Tailwind,
                                                                                            Bootstrap, VueJS atau ReactJS:</strong>
                                                                                        {{ $item['kriteria']['kriteria_10'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_10']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami proses pembuatan website
                                                                                            dengan menggunakan metode responsive web
                                                                                            design:</strong>
                                                                                        {{ $item['kriteria']['kriteria_11'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_11']) }})
                                                                                    </li>
                                                                                </ul>
                                                                            @break

                                                                            @case(3)
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki pengalaman dengan Library
                                                                                            dan API:</strong>
                                                                                        {{ $item['kriteria']['kriteria_12'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_12']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Mampu memecahkan masalah dengan
                                                                                            baik:</strong>
                                                                                        {{ $item['kriteria']['kriteria_13'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_13']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Mampu menafsirkan dan mengikuti
                                                                                            rencana teknis:</strong>
                                                                                        {{ $item['kriteria']['kriteria_14'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_14']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami penggunaan Flutter, Android
                                                                                            Studio, dll:</strong>
                                                                                        {{ $item['kriteria']['kriteria_15'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_15']) }})
                                                                                    </li>
                                                                                </ul>
                                                                            @break

                                                                            @case(4)
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <strong>Melakukan riset untuk user
                                                                                            experience yang baik:</strong>
                                                                                        {{ $item['kriteria']['kriteria_16'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_16']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami perilaku android dan iOS
                                                                                            dan Web:</strong>
                                                                                        {{ $item['kriteria']['kriteria_17'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_17']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Kompeten dalam pembuatan user flow
                                                                                            pada sebuah aplikasi:</strong>
                                                                                        {{ $item['kriteria']['kriteria_18'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_18']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Membuat solusi desain dengan
                                                                                            memerhatikan fungsional, keindahan, dan
                                                                                            interaktif:</strong>
                                                                                        {{ $item['kriteria']['kriteria_19'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_19']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Familiar dan bisa menggunakan design
                                                                                            tools seperti Figma, Adobe XD:</strong>
                                                                                        {{ $item['kriteria']['kriteria_20'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_20']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Melakukan usability testing &
                                                                                            mempresentasikan hasil test design
                                                                                            kepada stakeholder:</strong>
                                                                                        {{ $item['kriteria']['kriteria_21'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_21']) }})
                                                                                    </li>
                                                                                </ul>
                                                                            @break

                                                                            @case(5)
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki kemampuan problem solving &
                                                                                            komunikasi yang baik:</strong>
                                                                                        {{ $item['kriteria']['kriteria_22'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_22']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki pemahaman yang kuat tentang
                                                                                            statistik dan matematika:</strong>
                                                                                        {{ $item['kriteria']['kriteria_23'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_23']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki pemahaman terkait model
                                                                                            data, pengembangan design database,
                                                                                            teknik data mining dan
                                                                                            segmentasi:</strong>
                                                                                        {{ $item['kriteria']['kriteria_24'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_24']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki kemampuan dalam menyajikan
                                                                                            informasi melalui bagan dan grafik
                                                                                            dengan menggunakan tools seperti Tableau
                                                                                            dan lain-lain:</strong>
                                                                                        {{ $item['kriteria']['kriteria_25'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_25']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Mampu menggunakan tools analisis
                                                                                            seperti SQL, XML, JavaScript dan
                                                                                            sebagainya:</strong>
                                                                                        {{ $item['kriteria']['kriteria_26'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_26']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Pemahaman bahasa pemrograman menjadi
                                                                                            nilai tambah:</strong>
                                                                                        {{ $item['kriteria']['kriteria_27'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_27']) }})
                                                                                    </li>
                                                                                </ul>
                                                                            @break

                                                                            @case(6)
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <strong>Good Personality:</strong>
                                                                                        {{ $item['kriteria']['kriteria_28'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_28']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Tegas dan Bijak dalam menentukan
                                                                                            suatu keputusan:</strong>
                                                                                        {{ $item['kriteria']['kriteria_29'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_29']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Cepat dalam menjalankan tugas dan
                                                                                            kewajiban:</strong>
                                                                                        {{ $item['kriteria']['kriteria_30'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_30']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki komitmen dan pendirian yang
                                                                                            kuat:</strong>
                                                                                        {{ $item['kriteria']['kriteria_31'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_31']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki komunikasi yang sangat
                                                                                            bagus:</strong>
                                                                                        {{ $item['kriteria']['kriteria_32'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_32']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki relasi yang cukup
                                                                                            luas:</strong>
                                                                                        {{ $item['kriteria']['kriteria_33'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_33']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Mampu untuk berpikir
                                                                                            kritis:</strong>
                                                                                        {{ $item['kriteria']['kriteria_34'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_34']) }})
                                                                                    </li>
                                                                                </ul>
                                                                            @break

                                                                            @case(7)
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <strong>Mampu mengembangkan ide secara
                                                                                            komunikatif, strategis &
                                                                                            inovatif:</strong>
                                                                                        {{ $item['kriteria']['kriteria_35'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_35']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memahami penggunaan social media
                                                                                            terkini seperti Instagram, TikTok,
                                                                                            YouTube, LinkedIn, dll.:</strong>
                                                                                        {{ $item['kriteria']['kriteria_36'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_36']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki analytical thinking dan
                                                                                            problem solving yang baik:</strong>
                                                                                        {{ $item['kriteria']['kriteria_37'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_37']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Mengetahui SEO/SEM:</strong>
                                                                                        {{ $item['kriteria']['kriteria_38'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_38']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Mengetahui dan mampu menggunakan
                                                                                            tools pendukung sesuai kebutuhan seperti
                                                                                            Google Workspace, Trello, Web Analytics,
                                                                                            SEO tools, dll:</strong>
                                                                                        {{ $item['kriteria']['kriteria_39'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_39']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki salah satu skill yang
                                                                                            dibutuhkan, antara lain Konten Kreator,
                                                                                            Video Editing, Copywriting, atau Digital
                                                                                            marketing Ads.:</strong>
                                                                                        {{ $item['kriteria']['kriteria_40'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_40']) }})
                                                                                    </li>
                                                                                </ul>
                                                                            @break

                                                                            @case(8)
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki kemampuan problem solving &
                                                                                            komunikasi yang baik:</strong>
                                                                                        {{ $item['kriteria']['kriteria_41'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_41']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Memiliki pemahaman dasar mengenai
                                                                                            prinsip desain:</strong>
                                                                                        {{ $item['kriteria']['kriteria_42'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_42']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Mampu memahami dan membuat blueprint
                                                                                            sesuai dengan kebutuhan user:</strong>
                                                                                        {{ $item['kriteria']['kriteria_43'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_43']) }})
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <strong>Mampu menggunakan software grafis
                                                                                            Adobe illustrator, photoshop dan
                                                                                            Figma:</strong>
                                                                                        {{ $item['kriteria']['kriteria_44'] ?? 'N/A' }}
                                                                                        ({{ \App\Common\Helpers\ConversionHelper::convertToDescription($item['kriteria']['kriteria_44']) }})
                                                                                    </li>
                                                                                </ul>
                                                                            @break

                                                                            @default
                                                                                <ul class="list-group">
                                                                                    <li class="list-group-item">Tidak ada
                                                                                        kriteria untuk divisi ini.</li>
                                                                                </ul>
                                                                        @endswitch
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="d-flex justify-content-center">
                                    {{ $data->links() }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach ($data as $key => $item)
        @if ($item['wawancara_selesai'])
            <div class="modal fade" id="nilaiWawancaraModal-{{ $key }}" tabindex="-1" role="dialog"
                aria-labelledby="nilaiWawancaraModalLabel-{{ $key }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="nilaiWawancaraModalLabel-{{ $key }}">Masukkan Nilai
                                Wawancara</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('nilai-wawancara.store') }}">
                                @csrf
                                <input type="hidden" name="pendaftar_id" value="{{ $item['pendaftar']->id }}">
                                <div class="form-group">
                                    <label for="nilai_wawancara" style="margin-bottom: 20px; font-size: 14px;">Nilai
                                        Wawancara</label>
                                    <div class="radio-container">
                                        @foreach (['Kurang', 'Cukup', 'Memuaskan', 'Baik Sekali', 'Luar Biasa'] as $nilai)
                                            <input type="radio" id="nilai_wawancara_{{ $loop->index + 1 }}"
                                                name="nilai_wawancara" value="{{ $nilai }}">
                                            <label
                                                for="nilai_wawancara_{{ $loop->index + 1 }}">{{ ucfirst($nilai) }}</label>
                                        @endforeach
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            //ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });

        function submitDel(id) {
            $('#del-' + id).submit()
        }
    </script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <style>
        .radio-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .radio-container input[type="radio"] {
            display: none;
        }

        .radio-container label {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            border: 2px solid #007bff;
            border-radius: 4px;
            background-color: white;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
            height: 40px;
            min-width: 100px;
        }

        .radio-container input[type="radio"]:checked+label {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .radio-container label:hover {
            background-color: #0056b3;
            color: white;
            border-color: #0056b3;
        }
    </style>
@endpush
