@extends('layouts.main-rw')

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
@component('components.r-w.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Fasilitas</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rw.fasilitasrw.index') }}">Fasilitas</a></li>
        <li class="breadcrumb-item active">Tambah fasilitas</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if ($errors->any())
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Terjadi kesalahan</strong>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form tambah fasilitas</h5>
                    </div>
                    <form class="form theme-form" method="POST" enctype="multipart/form-data" action="{{ route('rw.fasilitasrw.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama fasilitas</label>
                                        <input class="form-control @error('fasilitas_umum') is-invalid @enderror" name="fasilitas_umum" id="exampleFormControlInput1" type="text" autofocus value="{{ old('fasilitas_umum') }}"/>
                                        @error('fasilitas_umum')
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
                                        <label class="form-label" for="validationCustom02">Kategori fasilitas</label>
                                        <select class="form-select" name="kategori_fasilitas_umum" id="validationDefault04" required>
                                            @foreach ($kategori_fasilitas as $k)
                                                @if(old('kategori_fasilitas_umum') == $k->id_kategori_fasilitas)
                                                    <option value="{{ $k->id_kategori_fasilitas }}" selected>{{ $k->kategori_fasilitas }}</option>
                                                @else
                                                    <option value="{{ $k->id_kategori_fasilitas }}">{{ $k->kategori_fasilitas }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="deskripsi_fasilitas">Deskirpsi fasilitas</label>
                                        <input id="deskripsi_fasilitas" type="hidden" value="{{ old('deskripsi_fasilitas') }}" name="deskripsi_fasilitas">
                                        <trix-editor input="deskripsi_fasilitas"></trix-editor>
                                    </div>
                                    @error('deskripsi_fasilitas')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="form-label">Foto fasilitas</label>
                                        <div class="col-sm-9">
                                            <img class="img-preview img-fluid mb-3 col-sm-5">
                                            <input class="form-control" name="foto_fasilitas" onchange="previewImage()" id="image" type="file" />
                                             <small class="text-muted">* Ukuran Maksimal File 4 Mb</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Alamat fasilitas</label>
                                        <input class="form-control @error('alamat_fasilitas') is-invalid @enderror" name="alamat_fasilitas" id="exampleFormControlInput1" type="text" autofocus value="{{ old('alamat_fasilitas') }}"/>
                                        @error('alamat_fasilitas')
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
                                        <label class="form-label" for="exampleFormControlInput1">Koordinat fasilitas</label>
                                        <input class="form-control @error('koordinant_fasilitas') is-invalid @enderror" name="koordinant_fasilitas" id="exampleFormControlInput1" type="text" autofocus value="{{ old('koordinant_fasilitas') }}"/>
                                        @error('koordinant_fasilitas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                      <label class="form-label"
                                        for="">&nbsp;</label>
                                      <button type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"
                                        class="btn btn-secondary form-control text-white"><span class="fa fa-question-circle"></span> Koordinat</button>
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
<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Cara memasukkan koordinat</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{asset('assets/images/banner/TambahKoordinat.png')}}" width="760"/>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src={{ asset("assets/js/trix.js")}}></script>
