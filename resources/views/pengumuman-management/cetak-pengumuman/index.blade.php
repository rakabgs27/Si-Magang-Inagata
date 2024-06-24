@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cetak Pengumuman</h1>
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
                            <h4>Daftar Cetak Pengumuman</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Periode</th>
                                            <th>Status Periode </th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        @if ($hasilAkhirPengumuman->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak Ada Data</td>
                                            </tr>
                                        @else
                                            @foreach ($hasilAkhirPengumuman as $key => $listItem)
                                                <tr>
                                                    <td>{{ $hasilAkhirPengumuman->firstItem() + $key }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($listItem->created_at)->translatedFormat('d F Y') }}</td>
                                                    <td
                                                        class="status {{ $listItem->status === 'Belum Selesai' ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">
                                                        {{ $listItem->status }}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('cetak-pengumuman.show', $listItem->id) }}"
                                                            class="btn btn-primary">Cetak</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $hasilAkhirPengumuman->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
