@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data iuran</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
            </div>
        </div>
    </div>
</div>
<!-- Zero Configuration  Ends-->
@endsection