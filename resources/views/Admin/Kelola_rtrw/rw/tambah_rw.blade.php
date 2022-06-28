@extends('layouts.main-admin')

@push('css')
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
@endpush

@section('container')
@component('components.admin.breadcrumb')
        @slot('breadcrumb_title')
        <h3>RW</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rw.index') }}">RW</a></li>
        <li class="breadcrumb-item active">Tambah RW</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form tambah RW</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="{{ route('rw.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Username</label>
                                        <input class="form-control @error('username') is-invalid @enderror" name="username" id="exampleFormControlInput1" type="text" autofocus value="{{ old('username') }}"/>
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Password</label>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" id="exampleFormControlInput1" type="password" autofocus value="{{ old('password') }}"/>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Pilih RW</label>
                                        <select class="form-select" name="id_warga" id="validationDefault04" required>
                                            @foreach ($rw as $w)
                                                @if(old('id_warga') == $w->id_warga)
                                                    <option value="{{ $w->id_warga }}" selected>{{ $w->nama_lengkap }}</option>
                                                @else
                                                    <option value="{{ $w->id_warga }}">{{ $w->nama_lengkap }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">No RW</label>
                                        <input class="form-control @error('no_rw') is-invalid @enderror" name="no_rw" id="exampleFormControlInput1" type="number" autofocus value="{{ old('no_rw') }}"/>
                                        @error('no_rw')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                <label class="form-label">Tanggal Awal Jabatan</label>
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_awal_jabatan_rw" value="{{ old('tgl_awal_jabatan_rw') }}" />
                                </div>
                                @error('tgl_awal_jabatan_rw')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
                            </div>
                            </div>  
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                    <label class="form-label">Tanggal Akhir Jabatan</label>
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_akhir_jabatan_rw" value="{{ old('tgl_akhir_jabatan_rw') }}" />
                                </div>
                                @error('tgl_akhir_jabatan_rw')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
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
