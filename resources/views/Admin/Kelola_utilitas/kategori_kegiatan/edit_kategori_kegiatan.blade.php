@extends('layouts.main-rt')

@push('css')
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
@endpush

@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Kategori kegiatan</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.kategori_kegiatan.index') }}">Kategori kegiatan</a></li>
        <li class="breadcrumb-item active">Edit kategori kegiatan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form kategori kegiatan</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="/RT/kategori_kegiatan/{{ $kategori_kegiatan->id_kategori_kegiatan }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $kategori_kegiatan->id_kategori_kegiatan }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama kategori</label>
                                        <input class="form-control" name="kategori_kegiatan" value="{{ $kategori_kegiatan->kategori_kegiatan }}" id="exampleFormControlInput1" type="text" />
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
