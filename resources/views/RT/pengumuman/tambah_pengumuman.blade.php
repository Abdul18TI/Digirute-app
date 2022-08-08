@extends('layouts.main-rt')

@push('css')
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
@endpush

@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Pengumuman</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.pengumuman.index') }}">Pengumuman</a></li>
        <li class="breadcrumb-item active">Tambah pengumuman</li>
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
                        <h5>Form tambah pengumuman</h5>
                    </div>
                    <form class="form theme-form" method="POST" enctype="multipart/form-data" action="{{ route('rt.pengumuman.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul
                                            pengumuman</label>
                                        <input class="form-control @error('judul_pengumuman') is-invalid @enderror" name="judul_pengumuman" id="exampleFormControlInput1" type="text" autofocus value="{{ old('judul_pengumuman') }}"/>
                                        @error('judul_pengumuman')
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
                                        <label class="form-label" for="validationCustom02">Kategori pengumuman</label>
                                        <select class="form-select" name="kategori_pengumuman" id="validationDefault04" required>
                                            @foreach ($kategori_pengumuman as $k)
                                                @if(old('kategori_pengumuman') == $k->id_kategori_pengumuman)
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
                                        <input id="isi_pengumuman" type="hidden" value="{{ old('isi_pengumuman') }}" name="isi_pengumuman">
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
                                        <div class="col-sm-9">
                                            <img class="img-preview img-fluid mb-3 col-sm-5">
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
                                        type="datetime-local" name="tgl_terbit" value="{{ old('tgl_terbit') }}" />
                                </div>
                                @error('tgl_terbit')
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
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script type="text/javascript" src={{ asset('assets/js/trix.js') }}></script>
@endpush

@push('scripts-custom')
    <script>
         Trix.config.blockAttributes.default.tagName = "p";
        $('#tabelpengumuman-rt').DataTable();

        function previewImage() {
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
@endpush


