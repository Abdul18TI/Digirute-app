@extends('layouts.main-admin')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Kelola RT/RW</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('kategori_kegiatan.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="container-fluid user-card">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                                    <div class="card custom-card">

                                        <div class="card-profile"><img class="rounded-circle"
                                                src="{{asset('assets/images/avtar/16.jpg')}}" alt="" /></div>

                                        <div class="text-center profile-details">
                                            <a href="#">
                                                <h4>Johan Deo</h4>
                                            </a>
                                            <h6>RT 01</h6>
                                        </div>
                                        <div class="card-footer row">
                                            <div class="col-4 col-sm-4">
                                                <h6>Status jabatan</h6>
                                                <h6><b>Aktif</b></h6>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Awal menjabat</h6>
                                                <h6>12-12-12</h6>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Akhir menjabat</h6>
                                                <h6>12-12-12</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                                    <div class="card custom-card">
                                        <div class="card-profile"><img class="rounded-circle"
                                                src="{{asset('assets/images/avtar/11.jpg')}}" alt="" /></div>

                                        <div class="text-center profile-details">
                                            <a href="#">
                                                <h4>Dev John</h4>
                                            </a>
                                            <h6>RT 02</h6>
                                        </div>
                                        <div class="card-footer row">
                                            <div class="col-4 col-sm-4">
                                                <h6>Status jabatan</h6>
                                                <h6>Aktif</h6>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Awal menjabat</h6>
                                                <h6>12-12-12</h6>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Akhir menjabat</h6>
                                                <h6>12-12-12</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                                    <div class="card custom-card">
                                        <div class="card-profile"><img class="rounded-circle"
                                                src="{{asset('assets/images/avtar/3.jpg')}}" alt="" /></div>

                                        <div class="text-center profile-details">
                                            <a href="#">
                                                <h4>Mark Jecno</h4>
                                            </a>
                                            <h6>RT 03</h6>
                                        </div>
                                        <div class="card-footer row">
                                            <div class="col-4 col-sm-4">
                                                <h6>Status jabatan</h6>
                                                <h6>Aktif</h6>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Awal menjabat</h6>
                                                <h6>12-12-12</h6>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Akhir menjabat</h6>
                                                <h6>12-12-12</h6>
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
<!-- Zero Configuration  Ends-->
@endsection