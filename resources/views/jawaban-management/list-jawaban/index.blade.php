@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Daftar Jawaban Pendaftar</h1>
        </div>
        @if (!$mentorDivisiId  && !$userManager)
            <div class="alert alert-warning" role="alert">
                Mentor tidak memiliki divisi.
            </div>
        @elseif ($mentorDivisiId || $userManager)
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Daftar Jawaban Pendaftar</h4>
                                <div class="d-flex flex-row-reverse card-header-action">
                                    <div class="card-header-actions">
                                        <a class="btn btn-info btn-primary active import">
                                            <i class="fa fa-filter" aria-hidden="true"></i>
                                            Filter by Divisi</a>
                                    </div>
                                    <h4></h4>
                                    <form class="card-header-form" id="search" method="GET"
                                        action="{{ route('list-jawaban.index') }}">
                                        <div class="input-group">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Cari Pendaftar" value="{{ $namaUserSearch }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary btn-icon"><i class="fas fa-search"
                                                        type="submit"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="show-import" style="display: none">
                                    <div class="custom-file">
                                        <form action="{{ route('list-jawaban.index') }}" method="GET">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <select class="form-control select2" name="divisi_id">
                                                        <option value="">Select Divisi</option>
                                                        @foreach ($divisis as $divisi)
                                                            <option value="{{ $divisi->id }}"
                                                                {{ $divisiId == $divisi->id ? 'selected' : '' }}>
                                                                {{ $divisi->nama_divisi }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-end">
                                                <div class="form-group col-md-2 col-lg-1">
                                                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                                                </div>
                                                <div class="form-group col-md-2 col-lg-1">
                                                    <a href="{{ route('list-jawaban.index') }}"
                                                        class="btn btn-secondary btn-block">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <br><br><br>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tbody>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pendaftar</th>
                                                <th>Nama Divisi</th>
                                                <th>Link Jawaban</th>
                                                <th>File Jawaban</th>
                                                <th>Tanggal Pengumpulan</th>
                                                <th>Preview</th>
                                                {{-- <th class="text-right">Action</th> --}}
                                            </tr>
                                            @if ($jawabanPendaftar->isEmpty())
                                                <tr>
                                                    <td colspan="8" class="text-center">Tidak Ada Data</td>
                                                </tr>
                                            @else
                                                @foreach ($jawabanPendaftar as $key => $listItem)
                                                    <tr>
                                                        <td>{{ $jawabanPendaftar->firstItem() + $key }}</td>
                                                        <td>{{ $listItem->soalPendaftar->pendaftar->user->name }}</td>
                                                        <td>{{ $listItem->soalPendaftar->pendaftar->divisi->nama_divisi }}
                                                        </td>
                                                        <td><a href="{{ $listItem->link_jawaban }}"
                                                                target="_blank">{{ $listItem->link_jawaban }}</a></td>
                                                        <td>{{ basename($listItem->file_jawaban) }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($listItem->tanggal_pengumpulan)->format('d F Y H:i:s') }}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-info btn-sm"
                                                                onclick="previewFile('{{ Storage::url($listItem->file_jawaban) }}', '{{ pathinfo($listItem->file_jawaban, PATHINFO_EXTENSION) }}')">Preview</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{ $jawabanPendaftar->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    <!-- Modal Structure -->
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">File Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Preview content will be injected here -->
                </div>
            </div>
        </div>
    </div>


@endsection
@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>
    <script>
        $(document).ready(function() {
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

            $('.select2').select2();
        });

        function submitDel(id) {
            $('#del-' + id).submit();
        }

        function previewFile(filePath, fileExtension) {
            console.log('File Path:', filePath);
            console.log('File Extension:', fileExtension);

            var modalBody = document.getElementById('modalBody');
            modalBody.innerHTML = ''; // Clear previous content

            if (fileExtension === 'jpg' || fileExtension === 'jpeg' || fileExtension === 'png') {
                var img = document.createElement('img');
                img.src = filePath;
                img.style.maxWidth = '100%';
                modalBody.appendChild(img);
            } else if (fileExtension === 'pdf') {
                var object = document.createElement('object');
                object.data = filePath;
                object.type = 'application/pdf';
                object.style.width = '100%';
                object.style.height = '500px';
                modalBody.appendChild(object);
            } else if (fileExtension === 'docx') {
                fetch(filePath)
                    .then(function(response) {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.arrayBuffer();
                    })
                    .then(function(arrayBuffer) {
                        mammoth.convertToHtml({
                                arrayBuffer: arrayBuffer
                            })
                            .then(function(result) {
                                modalBody.innerHTML = result.value;
                            })
                            .catch(function(error) {
                                console.error('Error converting file to HTML:', error);
                                modalBody.innerHTML = 'Error converting file to HTML';
                            });
                    })
                    .catch(function(error) {
                        console.error('Error fetching the file:', error);
                        modalBody.innerHTML = 'Error fetching the file';
                    });
            } else {
                modalBody.innerHTML = 'No preview available';
            }

            $('#previewModal').modal('show');
        }
    </script>
@endpush
@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <style>
        #modalBody img {
            max-width: 100%;
        }

        #modalBody iframe {
            width: 100%;
            height: 500px;
        }
    </style>
@endpush
