@extends('layouts.main-rw')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
    @component('components.r-w.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Kegiatan</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Kegiatan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Data Kegiatan</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rw.kegiatan.create') }}"
                                        data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span>
                                        Tambah Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama kegiatan</th>
                                        <th>Tanggal Mulai Kegiatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kegiatan as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->nama_kegiatan }}</td>
                                            <td>{{ tanggal_indo($p->tgl_mulai_kegiatan) }}</td>
                                            <td>
                                                <div class="media-body text-center icon-state">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                            {{ $p->status_kegiatan == 1 ? 'checked' : '' }}
                                                            data-id="{{ $p->id_kegiatan }}" class="toggle-class"><span
                                                            class="switch-state"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="aksi">
                                                <a class="btn btn-info btn-sm p-2"
                                                    href="kegiatan/{{ $p->id_kegiatan }}"><span
                                                        class="fa fa-eye"></span></a>
                                                <a class="btn btn-secondary btn-sm p-2"
                                                    href="kegiatan/{{ $p->id_kegiatan }}/edit"><span
                                                        class="fa fa-edit"></span></a>
                                                <form method="POST"
                                                    action="{{ route('rw.kegiatan.destroy', $p->id_kegiatan) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm sweet"
                                                        data-toggle="tooltip" title='Delete'><span
                                                            class="fa fa-trash-o"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Form Pengaduan End -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')
    <script>
        $('#dataTable').DataTable();

        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('id');
            // alert(status);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('rw.kegiatan.update.status') }}",
                data: {
                    'status_kegiatan': status,
                    'id_kegiatan': product_id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        });
    </script>
@endpush
