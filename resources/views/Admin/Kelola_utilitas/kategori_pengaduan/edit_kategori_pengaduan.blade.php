@extends('layouts.main-admin')

@push('css')
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
@endpush

@section('container')
@component('components.admin.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Kategori pengaduan</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('kategori_pengaduan.index') }}">Kategori pengaduan</a></li>
        <li class="breadcrumb-item active">Edit kategori pengaduan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form kategori pengaduan</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="/Admin/kategori_pengaduan/{{ $kategori_pengaduan->id_kategori_pengaduan }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $kategori_pengaduan->id_kategori_pengaduan }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama kategori</label>
                                        <input class="form-control" name="nama_kategori_pengaduan" value="{{ $kategori_pengaduan->nama_kategori_pengaduan }}" id="exampleFormControlInput1" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Edit</button>
                            <input class="btn btn-light" type="reset" value="Batal" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
