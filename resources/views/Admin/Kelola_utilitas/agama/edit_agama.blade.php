@extends('layouts.main-rt')

@push('css')
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
@endpush

@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Agama</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.agama.index') }}">Agama</a></li>
        <li class="breadcrumb-item active">Edit agama</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form edit agama</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="/RT/agama/{{ $agama->id_agama }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $agama->id_agama }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Agama</label>
                                        <input class="form-control" name="agama" value="{{ $agama->agama }}" id="exampleFormControlInput1" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
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
