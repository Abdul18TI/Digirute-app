@extends('layouts.main-admin')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Kategori pengumuman</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>kategori_pengumuman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kategori_pengumuman as $kp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kp->nama_kategori_pengumuman }}</td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm" href="kategori_pengumuman/{{ $kp->id_kategori_pengumuman }}/edit"><span class="fa fa-edit"></span> Edit</a>
                                            <form method="POST" action="{{ route('kategori_pengumuman.destroy', $kp->id_kategori_pengumuman)}}" class="d-inline">
                                                @csrf
                                               <input name="_method" type="hidden" value="DELETE">
                                               <button type="submit" class="btn btn-danger sweet" data-toggle="tooltip" title='Delete'><span
                                                class="fa fa-trash"></span>Delete</button>
                                            </form>
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