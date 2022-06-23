@extends('layouts.main-admin')

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
                                <h5>Data RW</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rw.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah RW</a>
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
                                        <th>Nama RW</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kelola_rw as $rw)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rw->identitas_rw->nama_lengkap }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm p-2" href="rw/{{ $rw->id_rw }}"><span
                                                class="fa fa-eye"></span></a>
                                            <a class="btn btn-success btn-sm p-2" href="rw/{{ $rw->id_rw }}/edit"><span class="fa fa-pencil"></span></a>
                                            <form method="POST" action="{{ route('rw.destroy', $rw->id_rw)}}" class="d-inline">
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