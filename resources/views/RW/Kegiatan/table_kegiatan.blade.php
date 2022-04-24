@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
            </div>
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
                                <div class="bookmark">
                                    <a class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModalgetbootstrap"><span class="fa fa-plus-square"></span> Tambah Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="tabelwarga-rt">
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
                                            <td>
                                                <a href="" class="btn btn-success btn-sm p-2" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><span class="fa fa-list"></span></a>
                                                <a href="" class="btn btn-secondary btn-sm p-2" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fa fa-pencil"></span></a>
                                            </td>
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
            <div class="modal fade" id="exampleModalgetbootstrap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah data kegiatan</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="col-form-label">Nama kegiatan:</label>
                                    <input class="form-control" type="text" name="nama_kegiatan">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label" for="message-text">Deskripsi kegiatan:</label>
                                    <textarea class="form-control" rows="9"></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="col-form-label">
                                            <img class="img-preview img-fluid mb-3 col-sm-5">
                                            <input class="form-control" name="foto_pengumuman" onchange="previewImage()" id="image" type="file" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-form-label">
                                        <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_terbit" value="2018-01-19T18:45:00" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="button">Tambah</button>
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