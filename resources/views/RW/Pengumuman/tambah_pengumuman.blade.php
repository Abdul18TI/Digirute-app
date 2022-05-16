@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form tambah pengumuman</h5>
                    </div>
                    <form class="form theme-form" method="POST" enctype="multipart/form-data" action="{{ route('pengumuman.store')}}">
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