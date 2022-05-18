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
                                <h5>Data iuran</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('iuran.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Data</a>
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
                                        <th>Judul iuran</th>
                                        <th>Jumlah terkumpul</th>
                                        <th>Jumlah iuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($iuran as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->judul_iuran }}</td>
                                        <td>0</td>
                                        <td>{{ $i->jumlah_iuran }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="detail-iuran/{{ $i->id_iuran }}"><span class="fa fa-eye"></span> Detail</a>
                                            <a class="btn btn-secondary btn-sm" href="edit-iuran/{{ $i->id_iuran }}"><span class="fa fa-edit"></span> Edit</a>
                                            <a class="btn btn-danger btn-sm" href="hapus-iuran/{{ $i->id_iuran }}"><span class="fa fa-trash"></span> Hapus</a>
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