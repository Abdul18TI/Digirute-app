@extends('layouts.main')

@section('container')
    @component('components.r-w.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Kegiatan</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Kegiatan</li>
    @endcomponent
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
            </div>
        </div>
    </div><!-- Form Tambah Warga -->
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
                                                <a class="btn btn-info btn-sm p-2" href="rt.warga/{{ $dw->id_warga }}"><span
                                                        class="fa fa-eye"></span></a>
                                                <a class="btn btn-secondary btn-sm p-2" href="warga/{{ $dw->id_warga }}/edit"><span
                                                        class="fa fa-edit"></span></a>
                                                <form method="POST" action="{{ route('rt.warga.destroy', $dw->id_warga)}}" class="d-inline">
                                                    @csrf
                                                   <input name="_method" type="hidden" value="DELETE">
                                                   <button type="submit" class="btn btn-danger btn-sm p-2 border-0 sweet" data-toggle="tooltip" title='Delete'><span
                                                    class="fa fa-trash"></span></button>
                                                </form>
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
</div>
@endsection
