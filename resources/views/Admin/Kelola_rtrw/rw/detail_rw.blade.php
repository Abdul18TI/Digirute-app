@extends('layouts.main-admin')

@section('container')
@component('components.admin.breadcrumb')
        @slot('breadcrumb_title')
        <h3>RW</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rw.index') }}">RW</a></li>
        <li class="breadcrumb-item active">Detail RW</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                @foreach($kelola_rw as $kr)
                                @if($kr->no_rw < 10)
                                            <h5>RW 0{{ $kr->no_rw }}</h5>
                                            @else
                                            <h5>RW {{ $kr->no_rw }}</h5>
                                            @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body center">
                        <div class="container-fluid user-card">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="card custom-card">

                                        <div class="card-profile"><img class="rounded-circle"
                                                src="{{asset('assets/images/avtar/1.png')}}" alt="" /></div>
                                        @foreach($identitas_rw as $ir)
                                        <div class="text-center profile-details">
                                            <a href="#">
                                                <h4>{{ $ir->identitas_rw->nama_lengkap }}</h4>
                                            </a>
                                            @if($ir->no_rw < 10)
                                            <h6>RW 0{{ $ir->no_rw }}</h6>
                                            @else
                                            <h6>RW {{ $ir->no_rw }}</h6>
                                            @endif
                                        </div>
                                        <div class="card-footer row">
                                            <div class="col-4 col-sm-4">
                                                <h6>Status jabatan</h6>
                                                @if ($ir->status_rw == 1)
                                                        <span class="badge badge-success">Akitf</span>
                                                    @elseif($ir->status_rw == 0)
                                                            <span class="badge badge-warning">Tidak Aktif</span></td>
                                                @endif
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Awal menjabat</h6>
                                                <h6>{{ tanggal_indo($ir->tgl_awal_jabatan_rw) }}</h6>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Akhir menjabat</h6>
                                                <h6>{{ tanggal_indo($ir->tgl_akhir_jabatan_rw) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                @foreach($identitas_rt as $it)
                                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                                    <div class="card custom-card">

                                        <div class="card-profile"><img class="rounded-circle"
                                                src="{{asset('assets/images/avtar/1.png')}}" alt="" /></div>
                                        <div class="text-center profile-details">
                                            <a href="#">
                                                <h4>{{ $it->identitas_rt->nama_lengkap }}</h4>
                                            </a>
                                            @if($it->no_rt < 10)
                                            <h6>RT 0{{ $it->no_rt }}</h6>
                                            @else
                                            <h6>RT {{ $it->no_rt }}</h6>
                                            @endif
                                        </div>
                                        <div class="card-footer row">
                                            <div class="col-4 col-sm-4">
                                                <h6>Status jabatan</h6>
                                                @if ($it->status_rt == 1)
                                                        <span class="badge badge-success">Akitf</span>
                                                    @elseif($it->status_rt == 0)
                                                            <span class="badge badge-warning">Tidak Aktif</span></td>
                                                @endif
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Awal menjabat</h6>
                                                <h6>{{ tanggal_indo($it->tgl_awal_jabatan_rt) }}</h6>
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <h6>Akhir menjabat</h6>
                                                <h6>{{ tanggal_indo($it->tgl_akhir_jabatan_rt) }}</h6>
                                            </div>
                                        </div>
                                    </div>
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
<!-- Zero Configuration  Ends-->
@endsection