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
                                            <form action="{{ route('kategori_pengumuman.destroy', $kp->id_kategori_pengumuman)}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure ?')"><span
                                                    class="fa fa-trash"></span>Delete</button>
                                                    <button class="btn btn-primary sweet-1" type="button" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-1']);">Basic</button>
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