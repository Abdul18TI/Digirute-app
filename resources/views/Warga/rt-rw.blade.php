@extends('layouts.main-warga')

@section('title')
    Profile RT {{ auth()->user()->rt_rel->no_rt }} RW {{ auth()->user()->rt_rel->rw_rel->no_rw }}
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush


@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Profile RT RW</h3>
        @endslot
        <li class="breadcrumb-item active">Profile RT RW</li>
    @endcomponent

    <div class="container-fluid user-card">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                <div class="card custom-card shadow shadow-showcase">
                    <div class="card-header"><img class="img-fluid"
                            src="https://source.unsplash.com/2560x1600?indonesia-nature" alt="" /></div>
                    <div class="card-profile">
                        @if ($rt->identitas_rt->foto_warga == 'no-image.png' || $rt->identitas_rt->foto_warga == null)
                            <img class="rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}"
                                alt="" />
                        @else
                            <img class="rounded-circle"
                                 src="{{ asset('storage/' . $rt->identitas_rt->foto_warga) }}"
                                alt="" />
                            {{-- <img class="rounded-circle"
                                src="{{ asset('assets/images/avtar/' . $rt->identitas_rt->foto_warga) }}"
                                alt="" /> --}}
                        @endif
                    </div>
                    <ul class="card-social">
                        <li>
                            <a target="_blank" href="https://wa.me/{{ FormatHP($rt->identitas_rt->no_hp_warga) }}"><i
                                    class="fa fa-phone"></i></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-institution"></i></a>
                        </li>
                    </ul>
                    <div class="text-center profile-details">
                        <a href="#">
                            <h4>{{ $rt->ketua_rt }}</h3>
                        </a>
                        <h6 class="mb-0">RT {{ $rt->no_rt }}</h6>
                        <h6 class="f-w-400">{{ date('Y', strtotime($rt->tgl_awal_jabatan_rt)) }} -
                            {{ date('Y', strtotime($rt->tgl_akhir_jabatan_rt)) }}</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-12 col-sm-12 mt-2">
                            <h3 class="txt-primary">Kontak</h3>
                            <h6>{{ $rt->identitas_rt->no_hp_warga }}</h6>
                        </div>
                        <div class="col-12 col-sm-12">
                            <h3 class="txt-primary">Alamat</h3>
                            <h6>{{ $rt->identitas_rt->alamat }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                <div class="card custom-card shadow shadow-showcase">
                    <div class="card-header">
						<img class="img-fluid" src="https://source.unsplash.com/random/2560x1600?indonesia-nature" alt="" />
					</div>
                    <div class="card-profile">
                        @if ($rw->identitas_rw->foto_warga == 'no-image.png' || $rw->identitas_rw->foto_warga == null)
                            <img class="rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}"
                                alt="" />
                        @else
                            <img class="rounded-circle"
                                src="{{ asset('storage/' . $rw->identitas_rw->foto_warga) }}"
                                alt="" />
                            {{-- <img class="rounded-circle"
                                src="{{ asset('assets/images/avtar/' . $rw->identitas_rw->foto_warga) }}"
                                alt="" /> --}}
                        @endif
                    </div>
                    <ul class="card-social">
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-phone"></i></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-institution"></i></a>
                        </li>
                    </ul>
                    <div class="text-center profile-details">
                        <a href="#">
                            <h4>{{ $rw->ketua_rw }}</h3>
                        </a>
                        <h6 class="mb-0">RW {{ $rw->no_rw }}</h6>
                        <h6 class="f-w-400">{{ date('Y', strtotime($rw->tgl_awal_jabatan_rw)) }} -
                            {{ date('Y', strtotime($rw->tgl_akhir_jabatan_rw)) }}</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-12 col-sm-12 mt-2">
                            <h3 class="txt-primary">Kontak</h3>
                            <h6>{{ $rw->identitas_rw->no_hp_warga }}</h6>
                        </div>
                        <div class="col-12 col-sm-12">
                            <h3 class="txt-primary">Alamat</h3>
                            <h6>{{ $rw->identitas_rw->alamat }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
@endsection
