@extends('layouts.main-rt')

@push('css')
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
@endpush

@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Jenis iuran</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.jenis_iuran.index') }}">Jenis iuran</a></li>
        <li class="breadcrumb-item active">Edit jenis iuran</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form edit iuran</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="/RT/jenis_iuran/{{ $jenis_iuran->id_jenis_iuran }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $jenis_iuran->id_jenis_iuran }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama jenis iuran</label>
                                        <input class="form-control" name="nama_jenis_iuran" value="{{ $jenis_iuran->nama_jenis_iuran }}" id="exampleFormControlInput1" type="text" />
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

