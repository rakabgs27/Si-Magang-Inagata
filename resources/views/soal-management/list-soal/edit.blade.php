@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Soal</h1>
        </div>
        <div class="section-body">
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
                            <p><strong>File Terlampir:</strong></p>
                            <ul id="existingFiles">
                                @if ($fileNames->isNotEmpty())
                                    @foreach ($fileNames as $fileName)
                                        <li>
                                            <p style="display: inline-block; margin-right: 10px;">
                                                {{ basename($fileName->files) }}
                                            </p>
                                            <a href="#" class="remove-link" style="display: inline-block;"
                                                data-file-id="{{ $fileName->id }}">Remove</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <p><strong>File Tambahan:</strong></p>
                            <ul id="newFiles"></ul>
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

            // Handle file selection from input
            fileInput.addEventListener('change', function(e) {
                handleFiles(e.target.files);
            });

            // Prevent default behavior for dragover
            dropArea.addEventListener('dragover', function(e) {
                e.preventDefault();
            });

            // Handle files dropped onto the drop area
            dropArea.addEventListener('drop', function(e) {
                e.preventDefault();
                handleFiles(e.dataTransfer.files);
            });

            // Function to handle new files
            function handleFiles(files) {
                Array.from(files).forEach(file => {
                    const listItem = document.createElement('li');
                    listItem.textContent = file.name;

                    if (file.type.startsWith('image/')) {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.height = 60;
                        listItem.appendChild(img);
                    }

                    const removeLink = document.createElement('a');
                    removeLink.textContent = ' Remove';
                    removeLink.href = '#';
                    removeLink.className = 'remove-link';
                    removeLink.style.color = 'red';
                    removeLink.onclick = function(e) {
                        e.preventDefault();
                        listItem.remove();
                    };

                    listItem.appendChild(removeLink);

                    document.getElementById('newFiles').appendChild(listItem);

                    if (fileList) {
                        fileList.appendChild(listItem.cloneNode(true));
                    }
                });
            }

            document.querySelectorAll('.remove-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (link.dataset.fileId) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch(`/soal-management/file-materi/${link.dataset.fileId}`, {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector(
                                                    'meta[name="csrf-token"]')
                                                .getAttribute('content'),
                                            'Accept': 'application/json',
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            delete: true
                                        })
                                    }).then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            link.parentElement.remove();
                                            Swal.fire('Deleted!',
                                                'Your file has been deleted.',
                                                'success');
                                        } else {
                                            Swal.fire('Failed!', 'Error deleting file.',
                                                'error');
                                        }
                                    });
                            }
                        });
                    } else {
                        link.parentElement.remove();
                    }
                });
            });
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
