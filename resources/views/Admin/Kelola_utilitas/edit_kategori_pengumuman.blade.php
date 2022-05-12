@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form edit iuran</h5>
                    </div>
                    @foreach($kategori_pengumuman as $kp)
                    <form class="form theme-form" name="f1" method="POST" action="/update-kategori-pengumuman">
                        @csrf
                        <input type="hidden" name="id" value="{{ $kp->id_kategori_pengumuman }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul kategori</label>
                                        <input class="form-control" name="nama_kategori_pengumuman" value="{{ $kp->nama_kategori_pengumuman }}" id="exampleFormControlInput1" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Edit</button>
                            <input class="btn btn-light" type="reset" value="Batal" />
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
