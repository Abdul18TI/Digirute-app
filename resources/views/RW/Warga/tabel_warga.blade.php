@extends('layouts.main-rw')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
    @component('components.r-w.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Warga</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Warga</li>
    @endcomponent
    <!-- Form Tambah Warga -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                        <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Data Warga</h5>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No KK</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warga as $dw)
                                        <tr>
                                            <td>{{ "1" }}</td>
                                            <td>{{ $dw->nama_lengkap }}</td>
                                            <td>{{ $dw->no_kk }}</td>
                                            <td>{{ $dw->nik }}</td>
                                            <td>{{ $dw->alamat }}</td>
                                            <td>{{ $dw->no_hp_warga }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm p-2" href="{{ route('rw.warga.show',$dw->id_warga) }}"><span
                                                        class="fa fa-eye"></span></a>
                                            </td>
                                        </tr>
                                   @endforeach
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No KK</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfooter>
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
  </script>
@endpush