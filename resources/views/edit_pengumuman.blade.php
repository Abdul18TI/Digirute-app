@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form tambah pengumuman</h5>
                    </div>
                    @foreach($pengumuman as $p)
                    <form class="form theme-form" method="POST" enctype="multipart/form-data" action="/update-pengumuman">
                        @csrf
                        <input type="hidden" name="id" value="{{ $p->id_pengumuman }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul
                                            pengumuman</label>
                                        <input class="form-control" name="judul_pengumuman" value="{{ $p->judul_pengumuman }}" id="exampleFormControlInput1" type="text"
                                            placeholder="gotong royong bersama" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div>
                                            <label class="form-label" for="exampleFormControlTextarea4">Isi
                                                pengumuman</label>
                                            <textarea class="form-control" name="isi_pengumuman" id="exampleFormControlTextarea4"
                                                rows="9">{{ $p->isi_pengumuman }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="form-label">Foto pengumuman</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="foto_pengumuman" type="file" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Waktu terbit</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_terbit" value="{{ $p->tgl_terbit }}" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Tambah</button>
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
