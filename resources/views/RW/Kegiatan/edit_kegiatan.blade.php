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
        <h3>Kegiatan</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rw.kegiatan.index') }}">Kegiatan</a></li>
        <li class="breadcrumb-item active">Edit kegiatan</li>
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
                        <h5>Form edit Kegiatan</h5>
                    </div>
                    <form class="form theme-form" method="POST" enctype="multipart/form-data" action="/RW/kegiatan/{{ $kegiatan->id_kegiatan }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $kegiatan->id_kegiatan }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama
                                            kegiatan</label>
                                        <input class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" id="exampleFormControlInput1" type="text" autofocus value="{{ old('nama_kegiatan',$kegiatan->nama_kegiatan) }}"/>
                                        @error('nama_kegiatan')
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
                                        <label class="form-label" for="validationCustom02">Kategori kegiatan</label>
                                        <select class="form-select" name="kategori_kegiatan" id="validationDefault04" required>
                                            @foreach ($kategori_kegiatan as $k)
                                                @if(old('kategori_kegiatan',$kegiatan->kategori_kegiatan) == $k->id_kategori_kegiatan)
                                                    <option value="{{ $k->id_kategori_kegiatan }}" selected>{{ $k->kategori_kegiatan }}</option>
                                                @else
                                                    <option value="{{ $k->id_kategori_kegiatan }}">{{ $k->kategori_kegiatan }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="isi_kegiatan">Isi kegiatan</label>
                                        <input id="isi_kegiatan" type="hidden" value="{{ old('isi_kegiatan',$kegiatan->isi_kegiatan) }}" name="isi_kegiatan">
                                        <trix-editor input="isi_kegiatan"></trix-editor>
                                    </div>
                                    @error('isi_kegiatan')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="form-label">Foto kegiatan</label>
                                        <input type="hidden" name="oldImage" value="{{ $kegiatan->foto_kegiatan }}">
                                        @if($kegiatan->foto_kegiatan)
                                        <img src="{{ asset('storage/'. $kegiatan->foto_kegiatan) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                        @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                        <div class="col-sm-9">
                                            <input class="form-control" name="foto_kegiatan" onchange="previewImage()" id="image" type="file" />
                                             <small class="text-muted">* Ukuran Maksimal File 4 Mb</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal mulai kegiatan</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_mulai_kegiatan" value="{{ old('tgl_mulai_kegiatan',ConvertTanggal($kegiatan->tgl_mulai_kegiatan)) }}" />
                                </div>
                                @error('tgl_mulai_kegiatan')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal selesai kegiatan</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_selesai_kegiatan" value="{{ old('tgl_selesai_kegiatan',ConvertTanggal($kegiatan->tgl_selesai_kegiatan)) }}" />
                                </div>
                                @error('tgl_selesai_kegiatan')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
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

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
@endsection

<script type="text/javascript" src={{ asset("assets/js/trix.js")}}></script>