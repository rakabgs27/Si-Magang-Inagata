@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Rincian Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ $soal->judul_soal }}</h2>
            <div class="row d-flex align-items-stretch">
                <!-- Detail Soal Card -->
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>Detail Soal</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Nama Pendaftar:</strong> {{ $testJawaban->pendaftar->user->name }}</p>
                            <p><strong>Judul Soal:</strong> {{ $soal->judul_soal }}</p>
                            <p><strong>Deskripsi Tugas:</strong> {{ strip_tags($testJawaban->deskripsi_tugas) }}</p>
                            <p><strong>Tanggal Mulai:</strong>
                                {{ \Carbon\Carbon::parse($testJawaban->tanggal_mulai)->translatedformat('d F Y H:i') }}</p>
                            <p><strong>Tanggal Akhir:</strong>
                                {{ \Carbon\Carbon::parse($testJawaban->tanggal_akhir)->translatedformat('d F Y H:i') }}</p>
                            <ul>
                                @foreach ($fileData as $file)
                                    <li><a href="{{ $file['url'] }}" target="_blank">{{ $file['name'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Upload Jawaban Card -->
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>Upload Jawaban</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('list-jawaban.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="soal_pendaftar_id" value="{{ $testJawaban->id }}">
                                <div class="form-group">
                                    <label for="link_jawaban">Link Jawaban</label>
                                    <input type="url" class="form-control @error('link_jawaban') is-invalid @enderror"
                                        id="link_jawaban" name="link_jawaban" placeholder="Masukkan link"
                                        value="{{ old('link_jawaban', $jawabanPendaftar->link_jawaban ?? '') }}">
                                    <p class="mt-3"><small>Catatan: Link jawaban dapat berupa link GitHub, Figma, atau
                                            platform lain yang relevan.</small></p>
                                    @error('link_jawaban')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="file_jawaban">Upload Berkas Jawaban</label>
                                    <input type="file" class="form-control @error('file_jawaban') is-invalid @enderror"
                                        id="file_jawaban" name="file_jawaban">
                                    @if ($jawabanPendaftar && $jawabanPendaftar->file_jawaban)
                                        <p><small>File saat ini: <a
                                                    href="{{ Storage::url($jawabanPendaftar->file_jawaban) }}"
                                                    target="_blank">{{ basename($jawabanPendaftar->file_jawaban) }}</a></small>
                                        </p>
                                    @endif
                                    @error('file_jawaban')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <p><strong>Waktu Tersisa:</strong> <span id="countdown"></span></p>
                                @if ($jawabanPendaftar)
                                    <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                                @else
                                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                                @endif
                                <a class="btn btn-secondary" href="{{ route('test-soal.index') }}">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script>
        var countDownDate = new Date("{{ \Carbon\Carbon::parse($testJawaban->tanggal_akhir)->format('M d, Y H:i:s') }}")
            .getTime();

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds +
                "s ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
                var submitBtn = document.getElementById("submitBtn");
                if (submitBtn) {
                    submitBtn.disabled = true;
                }
                var updateBtn = document.getElementById("updateBtn");
                if (updateBtn) {
                    updateBtn.disabled = true;
                }
            }
        }, 1000);
    </script>
@endpush
