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
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="detail-iuran"><span class="fa fa-eye"></span> Detail</a>
                                            <a class="btn btn-secondary btn-sm" href="javascript:void(0)"><span class="fa fa-edit"></span> Edit</a>
                                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><span class="fa fa-trash"></span> Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="detail-iuran"><span class="fa fa-eye"></span> Detail</a>
                                            <a class="btn btn-secondary btn-sm" href="javascript:void(0)"><span class="fa fa-edit"></span> Edit</a>
                                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"><span class="fa fa-trash"></span> Hapus</a>
                                        </td>
                                    </tr>
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