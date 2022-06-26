@extends('layouts.main-warga')

@section('title')Detail-Kegiatan
 {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Detail-Kegiatan</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Detail-Kegiatan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-single">
                    <div class="blog-box blog-details">
                        <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="{{asset('storage/'. $kegiatan->foto_kegiatan)}}" alt="blog-main" /></div>
                        <div class="card">
                            <div class="card-body">
                                <div class="blog-details">
                                    <ul class="blog-social">
                                        <li>{{ tanggal_indo($kegiatan->tgl_mulai_kegiatan) }}</li>
                                        <li><i class="icofont icofont-user"></i>Oleh : <span>{{ $kegiatan->penanggung_jawab }} </span></li>
                                    </ul>
                                    <h4>
                                        {{ $kegiatan->nama_kegiatan }}
                                    </h4>
                                    <div class="single-blog-content-top">
                                        <article>
                                            {!! $kegiatan->isi_kegiatan !!}
                                        </article>
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

@push('scripts')
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')

@endpush
