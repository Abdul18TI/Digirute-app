@extends('layouts.main-rw')

@section('container')
<div class="page-body">
    <div class="container-fluid">
	    <div class="edit-profile">
	        <div class="row">
	            <div class="col-xl-4">
	                <div class="card">
	                    <div class="card-header pb-0">
	                        <h4 class="card-title mb-0">Profil Saya</h4>
	                        <div class="card-options">
	                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <form>
	                            <div class="row mb-2">
	                                <div class="profile-title">
	                                    <div class="media">
	                                        <img class="img-70 rounded-circle" alt="" src="{{asset('assets/images/user/7.jpg')}}" />
	                                        <div class="media-body">
	                                            <h3 class="mb-1 f-20 txt-primary">{{ $rw->identitas_rw->nama_lengkap }}</h3>
	                                            <p class="f-12">RW {{ $rw->no_rw }}</p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="mb-3">
	                                <label class="form-label">Email</label>
	                                <input class="form-control" disabled value="{{ $rw->identitas_rw->email_warga }}" />
	                            </div>
	                            <div class="mb-3">
	                                <label class="form-label">Nomor HandPhone</label>
	                                <input class="form-control" disabled value="{{ $rw->identitas_rw->no_hp_warga }}" />
	                            </div>
	                            <div class="mb-3">
	                                <label class="form-label">Alamat</label>
									<textarea class="form-control" disabled rows="5">{{ $rw->identitas_rw->alamat }}</textarea>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-8">
	                <form class="card">
	                    <div class="card-header pb-0">
	                        <h4 class="card-title mb-0">Ubah Profil</h4>
	                        <div class="card-options">
	                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="col-md-5">
	                                <div class="mb-3">
	                                    <label class="form-label">Company</label>
	                                    <input class="form-control" type="text" placeholder="Company" />
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-3">
	                                <div class="mb-3">
	                                    <label class="form-label">Username</label>
	                                    <input class="form-control" type="text" placeholder="Username" />
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Email address</label>
	                                    <input class="form-control" type="email" placeholder="Email" />
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label class="form-label">First Name</label>
	                                    <input class="form-control" type="text" placeholder="Company" />
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label class="form-label">Last Name</label>
	                                    <input class="form-control" type="text" placeholder="Last Name" />
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                                <div class="mb-3">
	                                    <label class="form-label">Address</label>
	                                    <input class="form-control" type="text" placeholder="Home Address" />
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">City</label>
	                                    <input class="form-control" type="text" placeholder="City" />
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-3">
	                                <div class="mb-3">
	                                    <label class="form-label">Postal Code</label>
	                                    <input class="form-control" type="number" placeholder="ZIP Code" />
	                                </div>
	                            </div>
	                            <div class="col-md-5">
	                                <div class="mb-3">
	                                    <label class="form-label">Country</label>
	                                    <select class="form-control btn-square">
	                                        <option value="0">--Select--</option>
	                                        <option value="1">Germany</option>
	                                        <option value="2">Canada</option>
	                                        <option value="3">Usa</option>
	                                        <option value="4">Aus</option>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                                <div>
	                                    <label class="form-label">About Me</label>
	                                    <textarea class="form-control" rows="5" placeholder="Enter About your description"></textarea>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="card-footer text-end">
	                        <button class="btn btn-primary" type="submit">Ubah Profil</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection