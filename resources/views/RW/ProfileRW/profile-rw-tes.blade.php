@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
	    <div class="user-profile">
	        <div class="row">
	            <!-- user profile header start-->
	            <div class="col-sm-12">
	                <div class="card profile-header">
	                    <img class="img-fluid bg-img-cover" src="{{asset('assets/images/user-profile/bg-profile-tes3.jpg')}}" alt="" />
	                    <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="{{asset('assets/images/user-profile/bg-profile.jpg')}}" alt="" /></div>
	                    <div class="userpro-box">
	                        <div class="img-wrraper">
	                            <div class="avatar"><img class="img-fluid" alt="" src="{{asset('assets/images/user/7.jpg')}}" /></div>
	                            <a class="icon-wrapper" href="profile/{{ $rw->identitas_rw->id_warga }}/edit"><i class="icofont icofont-pencil-alt-5"></i></a>
	                        </div>
	                        <div class="user-designation">
	                            <div class="title">
	                                <a target="_blank" href="">
	                                    <h4>{{ $rw->identitas_rw->nama_lengkap }}</h4>
	                                    <h6>RW 0{{ $rw->no_rw }}</h6>
	                                </a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- user profile header end-->
	            <div class="col-md-6">
	                <div class="default-according style-1 faq-accordion job-accordion">
	                    <div class="row">
	                        <div class="col-xl-12">
	                            <div class="card">
	                                <div class="card-header">
	                                    <h5 class="p-0">
	                                        <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Tentang saya</button>
	                                    </h5>
	                                </div>
	                                <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
	                                    <div class="card-body post-about">
	                                        <ul>
                                                <li>
                                                    <div class="icon"><i data-feather="tag"></i></div>
                                                    <div>
                                                        <h5>{{ $rw->identitas_rw->nik }}</h5>
                                                        <p>NIK</p>
                                                    </div>
                                                </li>
	                                            <li>
	                                                <div class="icon"><i data-feather="mail"></i></div>
	                                                <div>
	                                                    <h5>{{ $rw->identitas_rw->email_warga }}</h5>
                                                        <p>email</p>
	                                                </div>
	                                            </li>
	                                            <li>
	                                                <div class="icon"><i data-feather="phone"></i></div>
	                                                <div>
	                                                    <h5>{{ $rw->identitas_rw->no_hp_warga }}</h5>
                                                        <p>nomor hp</p>
	                                                </div>
	                                            </li>
	                                            <li>
	                                                <div class="icon"><i data-feather="map-pin"></i></div>
	                                                <div>
	                                                    <h5>{{ $rw->identitas_rw->alamat }}</h5>
                                                        <p>alamat</p>
	                                                </div>
	                                            </li>
	                                            <li>
	                                                <div class="icon"><i data-feather="inbox"></i></div>
	                                                <div>
	                                                    <h5>{{ $rw->identitas_rw->kode_pos }}</h5>
	                                                    <p>kode pos</p>
	                                                </div>
	                                            </li>
	                                        </ul>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="default-according style-1 faq-accordion job-accordion">
	                    <div class="row">
	                        <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
	                            <div class="card">
	                                <div class="card-header">
	                                    <h5 class="p-0">
	                                        <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon8" aria-expanded="true" aria-controls="collapseicon8">Keluarga</button>
	                                    </h5>
	                                </div>
	                                <div class="collapse show" id="collapseicon8" aria-labelledby="collapseicon8" data-parent="#accordion">
	                                    <div class="card-body social-list filter-cards-view">
                                            @foreach ($keluarga as $k)
	                                        <div class="media">
	                                            <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="{{asset('assets/images/user/2.png')}}" />
	                                            <div class="media-body"><span class="d-block">{{ $k->nama_lengkap }}</span><a>{{ $k->status_hubungan_dalam_keluarga }}</a></div>
	                                        </div>
                                            @endforeach
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