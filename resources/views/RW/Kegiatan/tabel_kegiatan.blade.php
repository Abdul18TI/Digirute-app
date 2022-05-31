@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
            </div>
        </div>
    </div>
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

                                    <a class="btn btn-primary btn-lg" href="{{ route('kegiatan.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Data</a>
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
                                    @foreach($kegiatan as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_kegiatan }}</td>
                                        <td>{{ $p->tgl_mulai_kegiatan }}</td>
                                        <td>@if ($p->status_kegiatan == 1)
                                            <span class="badge badge-success">aktif</span>
                                            @else
                                            <span class="badge badge-warning">tidak aktif</span>
                                            @endif</td>
                                        <td>
                                            <a class="btn btn-info btn-sm p-2" href="kegiatan/{{ $p->id_kegiatan }}"><span
                                                    class="fa fa-eye"></span></a>
                                            <a class="btn btn-secondary btn-sm p-2" href="kegiatan/{{ $p->id_kegiatan }}/edit"><span
                                                    class="fa fa-edit"></span></a>
                                            <form method="POST" action="{{ route('kegiatan.destroy', $p->id_kegiatan)}}" class="d-inline">
                                                @csrf
                                               <input name="_method" type="hidden" value="DELETE">
                                               <button type="submit" class="btn btn-danger btn-sm p-2 border-0 sweet" data-toggle="tooltip" title='Delete'><span
                                                class="fa fa-trash"></span></button>
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
</div>
@endsection