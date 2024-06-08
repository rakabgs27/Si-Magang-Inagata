@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengelolaan Wawancara</h1>
        </div>
        @if (!$mentorDivisiId)
            <div class="alert alert-warning" role="alert">
                Mentor tidak memiliki divisi.
            </div>
        @elseif ($mentorDivisiId)
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
                                <h4>List Wawancara</h4>
                                @role('manager')
                                    <div class="d-flex flex-row-reverse card-header-action">
                                        <div class="card-header-actions">
                                            <a class="btn btn-icon icon-left btn-primary"
                                                href="{{ route('list-wawancara.create') }}">Tambah Baru Wawancara</a>
                                        </div>
                                        <h4></h4>
                                        <form class="card-header-form" id="search" method="GET"
                                            action="{{ route('list-wawancara.index') }}">
                                            <div class="input-group">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Cari Nama Pendaftar" value="{{ $pendaftarNameSearch }}">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary btn-icon"><i class="fas fa-search"
                                                            type="submit"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endrole
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-md">
                                        <tbody>
                                            <tr>
                                                <th>No</th>
                                                <th>Divisi</th>
                                                <th>Nama Mentor</th>
                                                <th>Nama Pendaftar</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            @if ($listWawancara->isEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak Ada Data</td>
                                                </tr>
                                            @else
                                                @foreach ($listWawancara as $key => $listItem)
                                                    <tr data-end-date="{{ $listItem->tanggal_wawancara }}"
                                                        data-id="{{ $listItem->id }}">
                                                        <td>{{ $listWawancara->firstItem() + $key }}</td>
                                                        <td>{{ $listItem->divisiMentor->divisi->nama_divisi }}</td>
                                                        <td>{{ $listItem->divisiMentor->user->name }}</td>
                                                        <td>{{ $listItem->pendaftar->user->name }}</td>
                                                        <td
                                                            class="status {{ $listItem->status === 'Belum Selesai' ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">
                                                            {{ $listItem->status }}
                                                        </td>
                                                        <td class="text-right">
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
                                                                        method="POST" class="ml-2"
                                                                        id="del-{{ $listItem->id }}">
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
                                                        </td>
                                                    </tr>
                                                    <tr id="detail-{{ $listItem->id }}" class="detail-row"
                                                        style="display: none;">
                                                        <td colspan="6">
                                                            <fieldset class="detail-box">
                                                                <legend>Detail Wawancara</legend>
                                                                <div class="d-flex justify-content-around p-3">
                                                                    <div>
                                                                        <strong style="font-size: 16px;">
                                                                            <i class="fas fa-calendar-week"></i> Tanggal
                                                                            Wawancara:
                                                                        </strong>
                                                                        <span
                                                                            style="font-size: 16px;">{{ $listItem->tanggal_wawancara }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <strong style="font-size: 16px;">Deskripsi:</strong>
                                                                        <span
                                                                            style="font-size: 16px;">{{ strip_tags($listItem->deskripsi) }}</span>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{ $listWawancara->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    </section>
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {
            var intervalId = setInterval(function() {
                var now = new Date();
                var allCompleted = true;

                $('tr[data-end-date]').each(function() {
                    var endDate = new Date($(this).data('end-date'));
                    if (now > endDate && $(this).find('.status').text().trim() !== 'Selesai') {
                        allCompleted = false; // If any item is not completed, set flag to false
                        var row = $(this);
                        var id = row.data('id');
                        $.ajax({
                            url: "{{ route('list-wawancara.update-status', '') }}/" + id,
                            type: 'PATCH',
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                row.find('.status').text('Selesai').removeClass(
                                    'text-danger').addClass('text-success');
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
            }, 1000); // Check every minute

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
            //ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });

            $('.toggle-detail').click(function() {
                var id = $(this).data('id');
                $('#detail-' + id).toggle();
                $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
            });
        });

        function submitDel(id) {
            $('#del-' + id).submit();
        }
    </script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <style>
        .detail-box {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .detail-box legend {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            padding: 0 10px;
            margin-bottom: 10px;
        }

        .detail-box .p-3 {
            font-size: 16px;
        }

        @media (max-width: 767px) {
            .detail-box {
                margin: 5px 0;
                padding: 10px;
            }
        }
    </style>
@endpush
