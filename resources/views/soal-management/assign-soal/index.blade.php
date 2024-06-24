@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Daftar Soal Pendaftar</h1>
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
                            <h4>List Assign Soal</h4>
                            <div class="d-flex flex-row-reverse card-header-action">
                                <div class="card-header-actions">
                                    @role('manager')
                                        <a class="btn btn-icon icon-left btn-primary"
                                            href="{{ route('assign-soal.create') }}">Assign Soal Pendaftar</a>
                                    @endrole
                                </div>
                                <h4></h4>
                                <form class="card-header-form" id="search-form" method="GET"
                                    action="{{ route('assign-soal.index') }}">
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Cari Pendaftar" value="{{ $namaUserSearch }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-icon" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pendaftar</th>
                                            <th>Judul Soal</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        @if ($listSoalPendaftar->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak Ada Data</td>
                                            </tr>
                                        @else
                                            @foreach ($listSoalPendaftar as $key => $listItem)
                                                <tr data-id="{{ $listItem->id }}"
                                                    data-end-date="{{ \Carbon\Carbon::parse($listItem->tanggal_akhir)->toDateTimeString() }}">
                                                    <td>{{ $listSoalPendaftar->firstItem() + $key }}</td>
                                                    <td>{{ $listItem->pendaftar->user->name }}</td>
                                                    <td>{{ $listItem->soal->judul_soal }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($listItem->tanggal_mulai)->translatedformat('d F Y H:i') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($listItem->tanggal_akhir)->translatedformat('d F Y H:i') }}
                                                    </td>
                                                    <td
                                                        class="status {{ $listItem->status === 'Sedang Dikerjakan' ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">
                                                        {{ $listItem->status }}
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ route('assign-soal.show', $listItem->id) }}"
                                                                class="btn btn-sm btn-warning btn-icon">
                                                                <i class="fas fa-edit"></i> Detail
                                                            </a>
                                                            <form
                                                                action="{{ route('assign-soal.destroy', $listItem->id) }}"
                                                                method="POST" class="ml-2" id="del-{{ $listItem->id }}">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button type="submit" id="#submit"
                                                                    class="btn btn-sm btn-danger btn-icon"
                                                                    data-confirm="Hapus Data Assign Soal Pendaftar ?|Apakah Kamu Yakin?"
                                                                    data-confirm-yes="submitDel({{ $listItem->id }})"
                                                                    data-id="del-{{ $listItem->id }}"
                                                                    {{ $listItem->status === 'Selesai Dikerjakan' ? 'disabled' : '' }}>
                                                                    <i class="fas fa-times"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $listSoalPendaftar->withQueryString()->links() }}
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
            var intervalId = setInterval(function() {
                var now = new Date();
                var allCompleted = true; // Flag to check if all items are completed

                $('tr[data-end-date]').each(function() {
                    var endDate = new Date($(this).data('end-date'));
                    if (now > endDate && $(this).find('.status').text().trim() !==
                        'Selesai Dikerjakan') {
                        allCompleted = false; // If any item is not completed, set flag to false
                        var row = $(this);
                        var id = row.data('id');
                        $.ajax({
                            url: "{{ route('assign-soal.update-status', '') }}/" + id,
                            type: 'PATCH',
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                row.find('.status').text('Selesai Dikerjakan')
                                    .removeClass('text-danger').addClass(
                                        'text-success');
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });

                if (allCompleted) {
                    clearInterval(intervalId);
                }
            }, 1000);

            // Event handling lainnya
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
            $('#file-upload').change(function() {
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });

            $('.select2').select2();
        });

        function submitDel(id) {
            $('#del-' + id).submit()
        }
    </script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
