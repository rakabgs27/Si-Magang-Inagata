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
                    <h4>Validasi Tambah Soal</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('list-soal.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
                        @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for="divisi_id">Pilih Divisi</label>
                            <select id="divisi_id" name="divisi_id[]"
                                class="form-control select2 @error('divisi_id') is-invalid @enderror" multiple>
                                @foreach ($divisis as $divisi)
                                    <option value="{{ $divisi->id }}"
                                        {{ in_array($divisi->id, old('divisi_id', [])) ? 'selected' : '' }}>
                                        {{ $divisi->nama_divisi }}</option>
                                @endforeach
                            </select>
                            @error('divisi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul_soal">Judul Soal</label>
                            <input type="text" class="form-control @error('judul_soal') is-invalid @enderror"
                                id="judul_soal" name="judul_soal" value="{{ old('judul_soal') }}"
                                placeholder="Masukkan Judul Soal">
                            @error('judul_soal')
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
                            <ul class="file-list"></ul>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Soal</label>
                            <textarea name="deskripsi" id="deskripsi"
                                class="text-dark form-control summernote
                                @error('deskripsi') is-invalid @enderror"
                                value="{{ old('deskripsi') }}" data-id="deskripsi"></textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

            function handleFiles(files) {
                fileList.innerHTML = '';

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
                    removeLink.textContent = ' Remove';
                    removeLink.href = '#';
                    removeLink.className = 'remove-link';
                    listItem.appendChild(removeLink);

                    fileList.appendChild(listItem);

                    removeLink.addEventListener('click', function(e) {
                        e.preventDefault();
                        fileList.removeChild(listItem);
                    });
                }
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
