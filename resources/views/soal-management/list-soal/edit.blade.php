@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Soal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Soal</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Validasi Edit Soal</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('list-soal.update', $listSoal) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="display: none">
                            <input type="hidden" name="user_id" value="{{ $currentUser->id }}">
                        </div>
                        <div class="form-group">
                            <label for="divisi_id">Pilih Divisi</label>
                            <select id="divisi_id" name="divisi_id"
                                class="form-control select2 @error('divisi_id') is-invalid @enderror" disabled>
                                <option value="{{ $divisiSelected }}" selected>
                                    {{ \App\Models\Divisi::find($divisiSelected)->nama_divisi }}</option>
                            </select>
                            @error('divisi_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="divisi_id" value="{{ $divisiSelected }}">
                        </div>
                        <div class="form-group">
                            <label for="judul_soal">Judul Soal</label>
                            <input type="text" class="form-control @error('judul_soal') is-invalid @enderror"
                                id="judul_soal" name="judul_soal" value="{{ old('judul_soal', $listSoal->judul_soal) }}"
                                placeholder="Masukkan Judul Soal">
                            @error('judul_soal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_soal">Deskripsi Soal</label>
                            <textarea name="deskripsi_soal" id="deskripsi"
                                class="text-dark form-control summernote
                                @error('deskripsi_soal') is-invalid @enderror"
                                data-id="deskripsi_soal">{{ old('deskripsi_soal', $listSoal->deskripsi_soal) }}</textarea>
                            @error('deskripsi_soal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Upload File Soal</label>
                            <div id="dropArea" class="drag-drop-area">
                                <p>Drag files here or click to select files</p>
                            </div>
                            <input type="file" id="fileInput" name="files[]" multiple class="form-control">
                            @if ($fileNames->isNotEmpty())
                                <p><strong>File Terlampir:</strong></p>
                                <ul>
                                    {{-- @foreach ($fileNames as $fileName)
                                        <li>{{ $fileName }} <a href="#">Remove</a></li>
                                    @endforeach --}}
                                    @foreach ($fileNames as $fileName)
                                        <li>
                                            <p style="display: inline-block; margin-right: 10px;">
                                                {{ basename($fileName->files) }}</p>
                                            <a href="#" class="remove-link" style="display: inline-block;"
                                                data-file-id="{{ $fileName->id }}">Remove</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tanggal_upload">Tanggal Upload</label>
                            <input type="datetime-local" class="form-control @error('tanggal_upload') is-invalid @enderror"
                                id="tanggal_upload" name="tanggal_upload"
                                value="{{ old('tanggal_upload', date('Y-m-d\TH:i')) }}">
                            @error('tanggal_upload')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('list-soal.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#divisi_id').select2({
                placeholder: " Pilih satu atau lebih Divisi",
                allowClear: true
            });
        });
    </script>
    <script>
        var deskripsiSummernote = $('#deskripsi')
        deskripsiSummernote.summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropArea = document.getElementById('dropArea');
            var fileInput = document.getElementById('fileInput');
            var fileList = document.querySelector('.file-list');
            var fileJsobList = @json($fileNames);

            dropArea.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function(e) {
                handleFiles(e.target.files);
            });

            dropArea.addEventListener('dragover', function(e) {
                e.preventDefault();
            });

            dropArea.addEventListener('drop', function(e) {
                e.preventDefault();
                handleFiles(e.dataTransfer.files);
            });

            var removeLinks = document.querySelectorAll('.remove-link');
            removeLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var listItem = link.parentElement;
                    var fileName = listItem.querySelector('p').textContent.trim();
                    listItem.remove();

                });
            });

            function handleFiles(files) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const listItem = document.createElement('li');
                    const removeLink = document.createElement('a');

                    // File preview
                    if (file.type.startsWith('image/')) {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.height = 60;
                        listItem.appendChild(img);
                    }

                    listItem.appendChild(document.createTextNode(file.name));
                    removeLink.textContent = 'Remove';
                    removeLink.href = '#';
                    removeLink.className = 'remove-link';
                    listItem.appendChild(removeLink);

                    fileList.appendChild(listItem);

                    removeLink.addEventListener('click', function(e) {
                        e.preventDefault();
                        listItem.remove();
                    });
                }
            }
        });
    </script>
    <script type="text/javascript">
        var deleteUrlTemplate = "{{ route('file-materi.destroy', ['id' => '_id_']) }}";
    </script>
    <script>
        $(document).ready(function() {
            var fileIdToDelete; // Variabel untuk menyimpan ID file yang akan dihapus

            // Menangani klik pada tombol "Remove"
            $('.remove-link').click(function(e) {
                e.preventDefault();
                fileIdToDelete = $(this).data('file-id'); // Simpan ID file ke dalam variabel

                // Tampilkan SweetAlert untuk konfirmasi penghapusan
                Swal.fire({
                    title: 'Konfirmasi Penghapusan',
                    text: "Apakah Anda yakin ingin menghapus file ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengkonfirmasi, lakukan penghapusan
                        deleteFile();
                    }
                });
            });

            // Fungsi untuk menghapus file
            function deleteFile() {
                var deleteUrl = deleteUrlTemplate.replace('_id_', fileIdToDelete);

                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        Swal.fire(
                            'Berhasil!',
                            'File telah dihapus.',
                            'success'
                        ).then(() => {
                            location.reload(); // Reload halaman setelah penghapusan berhasil
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr
                        .responseText); // Tampilkan pesan kesalahan jika penghapusan gagal
                        Swal.fire(
                            'Error!',
                            'Gagal menghapus file.',
                            'error'
                        );
                    }
                });
            }
        });
    </script>
@endpush
@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">
    <style>
        .drag-drop-area {
            border: 2px dashed #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            color: #999;
            margin-bottom: 15px;
        }

        .drag-drop-area:hover {
            color: #555;
            border-color: #aaa;
        }

        #fileInput {
            display: none;
        }

        .file-list li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .file-list img {
            margin-right: 10px;
            border-radius: 5px;
        }

        .remove-link {
            margin-left: 10px;
            color: red;
            text-decoration: none;
        }

        .remove-link:hover {
            text-decoration: underline;
        }
    </style>
@endpush
