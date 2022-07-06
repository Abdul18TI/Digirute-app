@extends('layouts.main-rt')

@push('css')
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
    <script type="text/javascript" src={{ asset("assets/js/trix.js")}}></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
@endpush

@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Kategori pengumuman</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.kategori_pengumuman.index') }}">Kategori pengumuman</a></li>
        <li class="breadcrumb-item active">Edit pengumuman</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form kategori pengumuman</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="/RT/kategori_pengumuman/{{ $kategori_pengumuman->id_kategori_pengumuman }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $kategori_pengumuman->id_kategori_pengumuman }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama kategori</label>
                                        <input class="form-control" name="nama_kategori_pengumuman" value="{{ $kategori_pengumuman->nama_kategori_pengumuman }}" id="exampleFormControlInput1" type="text" />
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

<script type="text/javascript" src={{ asset("assets/js/trix.js")}}></script>