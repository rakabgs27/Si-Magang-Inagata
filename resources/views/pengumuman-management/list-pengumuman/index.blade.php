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
                                        <a class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                                            data-target="#pendaftarModal">
                                            Tambah Baru Pengumuman
                                        </a>
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
                                            <th class="text-right">Action</th>
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
                                                    {{-- <td class="text-right">
                                                        <div class="d-flex justify-content-end">
                                                            <button class="btn btn-sm btn-info btn-icon toggle-detail"
                                                                data-id="{{ $listItem->id }}"><i
                                                                    class="fas fa-chevron-down"></i> View
                                                                Detail</button>
                                                            @role('manager')
                                                                <a href="{{ route('list-wawancara.edit', $listItem->id) }}"
                                                                    class="btn btn-sm btn-warning btn-icon ml-2"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                                <form
                                                                    action="{{ route('list-wawancara.destroy', $listItem->id) }}"
                                                                    method="POST" class="ml-2" id="del-{{ $listItem->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" id="#submit"
                                                                        class="btn btn-sm btn-danger btn-icon"
                                                                        data-confirm="Hapus Data Wawancara Pendaftar ?|Apakah Kamu Yakin?"
                                                                        data-confirm-yes="submitDel({{ $listItem->id }})"
                                                                        data-id="del-{{ $listItem->id }}">
                                                                        <i class="fas fa-times"> </i> Delete</button>
                                                                </form>
                                                            @endrole
                                                        </div>
                                                    </td> --}}
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
            {{-- @endif --}}
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
                            <label for="pendaftarSelect">Pendaftar</label>
                            <select class="form-control select2-multiple" id="pendaftarSelect" name="pendaftar[]"
                                multiple="multiple">
                                @foreach ($pendaftars as $pendaftar)
                                    <option value="{{ $pendaftar->id }}">{{ $pendaftar->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="statusSelect">Status</label>
                            <select class="form-control select2" id="statusSelect" name="status">
                                <option value="">Pilih Status</option>
                                <option value="Lolos">Lolos</option>
                                <option value="Tidak Lolos">Tidak Lolos</option>
                            </select>
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
    </script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
