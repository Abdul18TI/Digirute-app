@extends('layouts.main-rt')
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
                                <h5>Data kelahiran</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">
                                    <a class="btn btn-primary btn-lg" href="" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor KK</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
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
                                                data-bs-placement="top" title="Detail"><span class="fa fa-list"></span></a>
                                                <a href="" class="btn btn-secondary btn-sm p-2" title="Edit"><span
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
@endsection