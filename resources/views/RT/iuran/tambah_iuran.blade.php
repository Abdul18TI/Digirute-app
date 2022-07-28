@extends('layouts.main-rt')
@section('title')
    Tambah Iuran
    {{ $title }}
@endsection

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
        <h3>Iuran</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.iuran.index') }}">Iuran</a></li>
        <li class="breadcrumb-item active">Tambah Iuran</li>
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
                        <h5>Form tambah iuran</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="{{ route('rt.iuran.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul Iuran</label>
                                        <input class="form-control" value="{{ old('judul_iuran') }}" name="judul_iuran" id="exampleFormControlInput1" type="text"/>
                                        @error('judul_iuran')
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
                                        <label class="form-label" for="exampleFormControlSelect7">Jenis Iuran</label>
                                        <select class="form-control" name="jenis_iuran" id="exampleFormControlSelect7">
                                            @foreach ($jenis_iuran as $j)
                                                @if(old('jenis_iuran') == $j->id_jenis_iuran)
                                                    <option value="{{ $j->id_jenis_iuran }}" selected>{{ $j->nama_jenis_iuran }}</option>
                                                @else
                                                    <option value="{{ $j->id_jenis_iuran }}">{{ $j->nama_jenis_iuran }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox-primary2" type="checkbox"
                                                onclick="enable_text2(this.checked)" value="">
                                            <label for="checkbox-primary2">Ada Target Jumlah Iuran ?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Target Jumlah Iuran</label>
                                        <input class="form-control" disabled="false" value="{{ old('target_iuran') }}" name="target_iuran" id="exampleFormControlInput1" type="number" />
                                    </div>
                                    @error('target_iuran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox-primary" type="checkbox"
                                                onclick="enable_text(this.checked)" value="">
                                            <label for="checkbox-primary">Ada Target Iuran Peroarang ?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword22">Target Iuran Peroarang</label>
                                        <input class="form-control" id="exampleInputPassword22" name="jumlah_iuran"
                                            type="number" disabled="false" value=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <label class="form-label">Tanggal mulai iuran</label>
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_mulai_iuran" value="{{ old('tgl_mulai_iuran') }}" />
                                        @error('tgl_mulai_iuran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Tanggal selesai iuran</label>
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_akhir_iuran" value="{{ old('tgl_akhir_iuran') }}" />
                                        @error('tgl_akhir_iuran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="deskripsi_iuran">Deskripsi iuran</label>
                                        <input id="deskripsi_iuran" type="hidden" value="{{ old('deskripsi_iuran') }}" name="deskripsi_iuran">
                                        <trix-editor input="deskripsi_iuran"></trix-editor>
                                    </div>
                                    @error('deskripsi_iuran')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
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
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable()
        })
    
        function enable_text(status) {
            if(status){
                document.f1.jumlah_iuran.disabled = false;
            }else{
                document.f1.jumlah_iuran.disabled = true;
                document.f1.jumlah_iuran.value = "";
            }
        }
        function enable_text2(status) {
            if(status){
                document.f1.target_iuran.disabled = false;
            }else{
                document.f1.target_iuran.disabled = true;
                document.f1.target_iuran.value = "";
              }
        }
    </script>
    @endsection
    
    <script type="text/javascript" src={{ asset("assets/js/trix.js")}}></script>
