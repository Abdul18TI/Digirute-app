@extends('layouts.main-rt')

@push('css')
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
@endpush

@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Kategori fasilitas</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.kategori_fasilitas.index') }}">Kategori fasilitas</a></li>
        <li class="breadcrumb-item active">Edit kategori fasilitas</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form kategori fasilitas</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="{{route('rt.kategori_fasilitas.update',$kategori_fasilitas->id_kategori_fasilitas)}}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $kategori_fasilitas->id_kategori_fasilitas }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama kategori</label>
                                        <input class="form-control" name="kategori_fasilitas" value="{{ $kategori_fasilitas->kategori_fasilitas }}" id="exampleFormControlInput1" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Edit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <a class="btn btn-light" href="{{ url()->previous() }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
