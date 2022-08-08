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
        <h3>Pengumuman</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rw.pengumuman.index') }}">Pengumuman</a></li>
        <li class="breadcrumb-item active">Edit pengumuman</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form edit pengumuman</h5>
                    </div>
                    <form class="form theme-form" method="POST" enctype="multipart/form-data" action="/RW/pengumuman/{{ $pengumuman->id_pengumuman }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $pengumuman->id_pengumuman }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul
                                            pengumuman</label>
                                        <input class="form-control" name="judul_pengumuman" value="{{ old('judul_pengumuman',$pengumuman->judul_pengumuman) }}" id="exampleFormControlInput1" type="text"
                                            placeholder="gotong royong bersama" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Kategori pengumuman</label>
                                        <select class="form-select" name="kategori_pengumuman" id="validationDefault04" required>
                                            @foreach ($kategori_pengumuman as $k)
                                                @if(old('kategori_pengumuman', $k->id_kategori_pengumuman) == $k->id_kategori_pengumuman)
                                                    <option value="{{ $k->id_kategori_pengumuman }}" selected>{{ $k->nama_kategori_pengumuman }}</option>
                                                @else
                                                    <option value="{{ $k->id_kategori_pengumuman }}">{{ $k->nama_kategori_pengumuman }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="isi_pengumuman">Isi pengumuman</label>
                                        <input id="isi_pengumuman" type="hidden" name="isi_pengumuman" value="{{ old('isi_pengumuman',$pengumuman->isi_pengumuman) }}">
                                        <trix-editor input="isi_pengumuman"></trix-editor>
                                    </div>
                                    @error('isi_pengumuman')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="form-label">Foto pengumuman</label>
                                        <input type="hidden" name="oldImage" value="{{ $pengumuman->foto_pengumuman }}">
                                        @if($pengumuman->foto_pengumuman)
                                        <img src="{{ asset('storage/'. $pengumuman->foto_pengumuman) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                        @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                        <div class="col-sm-9">
                                            <input class="form-control" name="foto_pengumuman" onchange="previewImage()" id="image" type="file" />
                                             <small class="text-muted">* Ukuran Maksimal File 4 Mb</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Waktu terbit</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_terbit" value="{{ old('tgl_terbit',ConvertTanggal($pengumuman->tgl_terbit)) }}" />
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
</script>
@endsection
