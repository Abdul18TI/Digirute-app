@extends('layouts.main')
@section('container') 
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Data kegiatan</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark"><a class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalgetbootstrapCREATE"><span
                                            class="fa fa-plus-square"></span> Tambah Data</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama kegiatan</th>
                                        <th>Foto banner</th>
                                        <th>Status</th>
                                        <th>Tanggal kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>tes</td>
                                        <td>tes</td>
                                        <td>tes</td>
                                        <td>tes</td>
                                        <td><a href="" class="btn btn-success btn-sm p-2" data-container="body"
                                                data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"
                                                data-bs-placement="top" title="Detail"><span class="fa fa-list"></span></a><a href="" class="btn btn-secondary btn-sm p-2" data-container="body" data-bs-placement="top" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalgetbootstrapEDIT" title="Edit"><span
                                                    class="fa fa-pencil"></span></a>
                                    </tr>
                                </tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Nama kegiatan</th>
                                    <th>Foto banner</th>
                                    <th>Status</th>
                                    <th>Tanggal kegiatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
{{-- modal tambah  --}}
<div class="modal fade" id="exampleModalgetbootstrapCREATE" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah data kegiatan</h5><button class="btn-close" type="button"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3"><label class="col-form-label">Nama kegiatan:</label><input class="form-control"
                            type="text" name="nama_kegiatan"></div>
                    <div class="mb-3"><label class="col-form-label" for="message-text">Deskripsi
                            kegiatan:</label><textarea class="form-control" rows="9"></textarea></div>
                    <div class="mb-3">
                        <div class="col-form-label"><img class="img-preview img-fluid mb-3 col-sm-5"><input
                                class="form-control" name="foto_pengumuman" onchange="previewImage()" id="image"
                                type="file" /></div>
                    </div>
                    <div class="mb-3">
                        <div class="col-form-label"><input class="form-control digits" id="example-datetime-local-input"
                                type="datetime-local" name="tgl_terbit" value="2018-01-19T18:45:00" /></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                    data-bs-dismiss="modal">Batal</button><button class="btn btn-primary" type="button">Tambah</button>
            </div>
        </div>
    </div>
</div> 
{{-- modal edit --}}
<div class="modal fade" id="exampleModalgetbootstrapEDIT" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit data kegiatan</h5><button class="btn-close" type="button"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3"><label class="col-form-label">Nama kegiatan:</label><input class="form-control"
                            type="text" name="nama_kegiatan"></div>
                    <div class="mb-3"><label class="col-form-label" for="message-text">Deskripsi
                            kegiatan:</label><textarea class="form-control" rows="9"></textarea></div>
                    <div class="mb-3">
                        <div class="col-form-label"><img class="img-preview img-fluid mb-3 col-sm-5"><input
                                class="form-control" name="foto_pengumuman" onchange="previewImage()" id="image"
                                type="file" /></div>
                    </div>
                    <div class="mb-3">
                        <div class="col-form-label"><input class="form-control digits" id="example-datetime-local-input"
                                type="datetime-local" name="tgl_terbit" value="2018-01-19T18:45:00" /></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                    data-bs-dismiss="modal">Batal</button><button class="btn btn-primary" type="button">Tambah</button>
            </div>
        </div>
    </div>
</div>
{{-- modal detail --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail kegiatan</h4><button class="btn-close"
                    type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="blog-single">
                                <div class="blog-box blog-details">
                                    <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover"
                                            src="{{asset('assets/images/blog/blog-single.jpg')}}" alt="blog-main" />
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="blog-details">
                                                <h4>Judul. </h4>
                                                <ul class="blog-social">
                                                    <li>Kategori</li>
                                                </ul>
                                                <div class="single-blog-content-top">
                                                    <p>Lorem ipsum dolor sit amet consectetur,
                                                        adipisicing elit. Quaerat,
                                                        accusamus veniam numquam dignissimos,
                                                        voluptatem excepturi quo nam ducimus dolor repellat non nihil
                                                        debitis. Similique quam,
                                                        totam ut minus quidem doloremque ! </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection