@extends('layouts.main-rt')

@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Profile-RT</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Profile-RT</li>
    @endcomponent
    <div class="container-fluid">
	    <div class="user-profile">
	        <div class="row">
	            <!-- user profile header start-->
	            <div class="col-sm-12">
					@if ($errors->any())
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Terjadi kesalahan</strong>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
	                <div class="card profile-header">
	                    <img class="img-fluid bg-img-cover" src="{{asset('assets/images/user-profile/bg-profile-tes4.jpg')}}" alt="" />
	                    <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="{{asset('assets/images/user-profile/bg-profile.jpg')}}" alt="" /></div>
	                    <div class="userpro-box">
	                        <div class="img-wrraper">
								@if($rt->identitas_rt->foto_warga == 'no-image.png')
	                            <div class="avatar"><img class="img-fluid" alt="" src="{{ asset('assets/images/dashboard/1.png') }}" /></div>
								@else
								<div class="avatar"><img class="img-fluid" alt="" src="{{ asset('storage/' . $rt->identitas_rt->foto_warga) }}" /></div>
								@endif
	                            <a class="icon-wrapper" href="{{route('rt.profileRT.edit',$rt->id_rt)}}"><i class="icofont icofont-pencil-alt-5"></i></a>
	                        </div>
	                        <div class="user-designation">
	                            <div class="title">
	                                <a target="_blank" href="">
	                                    <h4>{{ $rt->identitas_rt->nama_lengkap }}</h4>
	                                    <h6>RT {{ $rt->no_rt }}</h6>
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
                                                        <h5>{{ $rt->identitas_rt->nik }}</h5>
                                                        <p>NIK</p>
                                                    </div>
                                                </li>
	                                            <li>
	                                                <div class="icon"><i data-feather="mail"></i></div>
	                                                <div>
	                                                    <h5>{{ $rt->identitas_rt->email_warga }}</h5>
                                                        <p>email</p>
	                                                </div>
	                                            </li>
	                                            <li>
	                                                <div class="icon"><i data-feather="phone"></i></div>
	                                                <div>
	                                                    <h5>{{ $rt->identitas_rt->no_hp_warga }}</h5>
                                                        <p>nomor hp</p>
	                                                </div>
	                                            </li>
	                                            <li>
	                                                <div class="icon"><i data-feather="map-pin"></i></div>
	                                                <div>
	                                                    <h5>{{ $rt->identitas_rt->alamat }}</h5>
                                                        <p>alamat</p>
	                                                </div>
	                                            </li>
	                                            <li>
	                                                <div class="icon"><i data-feather="inbox"></i></div>
	                                                <div>
	                                                    <h5>{{ $rt->identitas_rt->kode_pos }}</h5>
	                                                    <p>kode pos</p>
	                                                </div>
	                                            </li>
	                                        </ul>
	                                    </div>
	                                </div>
									<div class="card-header">
	                                    <h5 class="p-0">
	                                        <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon3" aria-expanded="true" aria-controls="collapseicon3">Ubah Username</button>
	                                    </h5>
	                                </div>
	                                <div class="collapse" id="collapseicon3" aria-labelledby="collapseicon3" data-parent="#accordion">       
										<div class="col-xl-12">
											<form class="card" method="post" action="/RT/profileRT/{{ $rt->id_rt }}">
												@method('PUT')  
                        						@csrf
												<input type="hidden" name="id" value="{{ $rt->id_rt }}">
													<div class="card-body">
														<div class="row">
															<div class="col-md-12">
																<div class="mb-3">
																	<input class="form-control" name="username" value="{{ $rt->username }}" type="text" placeholder="username" />
																</div>
																<div class="col-md-3 text-end">
																<button class="btn btn-primary" type="submit">Ubah</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
	                                </div>
									<div class="card-header">
	                                    <h5 class="p-0">
	                                        <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon4" aria-expanded="true" aria-controls="collapseicon4">Ubah Password</button>
	                                    </h5>
	                                </div>
	                                <div class="collapse" id="collapseicon4" aria-labelledby="collapseicon4" data-parent="#accordion">
	                                    <div class="col-xl-12">
											<form class="card" method="post" action="/RT/profileRT/{{ $rt->id_rt }}">
												@method('PUT')  
                        						@csrf
												<input type="hidden" name="id" value="{{ $rt->id_rt }}">
													<div class="card-body">
														<div class="row">
															<div class="col-md-12">
																<div class="mb-3">
																	<input class="form-control" name="password" value="{{ $rt->password }}" type="password" placeholder="password" />
																</div>
																<div class="col-md-3 text-end">
																<button class="btn btn-primary" type="submit">Ubah</button>
															</div>
														</div>
													</div>
												</div>
											</form>
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
	                                            @if($k->foto_warga == 'no-image.png')
	                                            <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="{{asset('assets/images/user/2.png')}}" />
                                                @else
                                                <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="{{ asset('storage/' . $k->foto_warga) }}" />
                                                @endif
	                                            <div class="media-body"><span class="d-block">{{ $k->nama_lengkap }}</span><a>{{ $k->hubungans->status_hubungan }}</a></div>
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
@endsection