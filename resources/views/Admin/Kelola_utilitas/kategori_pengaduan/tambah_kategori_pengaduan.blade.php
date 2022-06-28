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
        <li class="breadcrumb-item active">Tambah kategori pengaduan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form tambah kategori</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="{{ route('kategori_pengaduan.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama Kategori Pengaduan</label>
                                        <input class="form-control" name="nama_kategori_pengaduan" required id="exampleFormControlInput1" type="text" autofocus value="{{ old('nama_kategori_pengaduan') }}" />
                                        @error('judul_pengaduan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            <input class="btn btn-light" type="reset" value="Batal" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
