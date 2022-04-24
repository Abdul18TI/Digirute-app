@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data pengumuman</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul pengumuman</th>
                                        <th>Tanggal upload</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pengumuman as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->judul_pengumuman }}</td>
                                        <td>{{ $p->tgl_terbit }}</td>
                                        <td>@if ($p->status_pengumuman == 1)
                                            aktif
                                            @else
                                            Tidak aktif
                                            @endif</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="detail-pengumuman/{{ $p->id_pengumuman }}"><span
                                                    class="fa fa-eye"></span> Detail</a>
                                            <a class="btn btn-secondary btn-sm" href="edit-pengumuman/{{ $p->id_pengumuman }}"><span
                                                    class="fa fa-edit"></span> Edit</a>
                                            <a class="btn btn-danger btn-sm" href="hapus-pengumuman/{{ $p->id_pengumuman }}"><span
                                                    class="fa fa-trash"></span> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Zero Configuration  Ends-->
@endsection