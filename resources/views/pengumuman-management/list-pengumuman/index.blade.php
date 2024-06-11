@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengelolaan Pengumuman</h1>
        </div>
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
                            <h4>Daftar Pengumuman</h4>
                            @role('manager')
                                <div class="d-flex flex-row-reverse card-header-action">
                                    <div class="card-header-actions">
                                        @if ($statusSimpan)
                                            <a class="btn btn-icon icon-left btn-primary text-white" data-toggle="modal"
                                                data-target="#pendaftarModal">
                                                Tambah Baru Pengumuman
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endrole
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pendaftar</th>
                                            <th>Divisi</th>
                                            <th>Status</th>
                                            {{-- <th class="text-right">Action</th> --}}
                                        </tr>
                                        @if ($listPengumuman->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak Ada Data</td>
                                            </tr>
                                        @else
                                            @foreach ($listPengumuman as $key => $listItem)
                                                <tr>
                                                    <td>{{ $listPengumuman->firstItem() + $key }}</td>
                                                    <td>{{ $listItem->pendaftar->user->name }}</td>
                                                    <td>{{ $listItem->pendaftar->divisi->nama_divisi }}</td>
                                                    <td
                                                        class="status {{ $listItem->status === 'Tidak Lolos' ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">
                                                        {{ $listItem->status }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $listPengumuman->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="pendaftarModal" tabindex="-1" role="dialog" aria-labelledby="pendaftarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pendaftarModalLabel">Select Pendaftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="pendaftarForm" action="{{ route('list-pengumuman.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="rankStart">Rank Start</label>
                            <input type="number" class="form-control @error('rank_start') is-invalid @enderror"
                                id="rankStart" name="rank_start" min="1" required>
                            @error('rank_start')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="rankEnd">Rank End</label>
                            <input type="number" class="form-control @error('rank_end') is-invalid @enderror"
                                id="rankEnd" name="rank_end" min="1" required>
                            @error('rank_end')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2({
                placeholder: 'Select an option',
                width: '100%'
            });

            $('.select2-multiple').select2({
                placeholder: 'Select an option',
                width: '100%'
            });

            // Toggle detail view
            $('.toggle-detail').click(function() {
                var id = $(this).data('id');
                $('#detail-' + id).toggle();
                $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
            });

            // Custom script for file upload label
            $('#file-upload').change(function() {
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });

            // Existing script to handle other functionalities
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
        });

        function submitDel(id) {
            $('#del-' + id).submit();
        }

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                iziToast.error({
                    title: 'Error',
                    message: '{{ $error }}',
                    position: 'topRight'
                });
            @endforeach
        @endif
    </script>
    @if (Session::has('success'))
        <script>
            iziToast.success({
                title: 'Success',
                message: '{{ Session::get('success') }}',
                position: 'topRight'
            });
        </script>
    @elseif (Session::has('error'))
        <script>
            iziToast.error({
                title: 'Error',
                message: '{{ Session::get('error') }}',
                position: 'topRight'
            });
        </script>
    @endif
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
@endpush
