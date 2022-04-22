@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <!-- <div class="col-sm-6">
                    <h3>Data Warga</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item">Form Controls</li>
                        <li class="breadcrumb-item active">Base Inputs</li>
                    </ol>
                </div>
                <div class="col-sm-6">

                </div> -->
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
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rt.warga.tambah') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span>Tambah Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="tabelwarga-rt">
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
                                                <a href="{{ route('rt.warga.edit', $dw->id_warga) }}" class="btn btn-success btn-sm p-2" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><span class="fa fa-list"></span></a>
                                                <a href="{{$dw->id_warga }}" class="btn btn-secondary btn-sm p-2" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fa fa-pencil"></span></a>
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