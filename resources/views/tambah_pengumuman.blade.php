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
                    <form class="form theme-form" method="POST" enctype="multipart/form-data" action="/store-pengumuman">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul
                                            pengumuman</label>
                                        <input class="form-control" name="judul_pengumuman" id="exampleFormControlInput1" type="text"
                                            placeholder="gotong royong bersama" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div>
                                            <label class="form-label" for="exampleFormControlTextarea4">Isi
                                                pengumuman</label>
                                            <textarea class="form-control" name="isi_pengumuman" id="exampleFormControlTextarea4"
                                                rows="9"></textarea>
                                        </div>
                                    </div>
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
                                        type="datetime-local" name="tgl_terbit" value="2018-01-19T18:45:00" />
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
</script>
@endsection
