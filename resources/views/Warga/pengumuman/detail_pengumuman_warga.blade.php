@extends('layouts.main-warga')

@section('title')Detail-Pengumuman
 {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Detail-Pengumuman</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('warga.pengumuman_warga.index') }}">Pengumuman</a></li>
        <li class="breadcrumb-item active">Detail-Pengumuman</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-single">
                    <div class="blog-box blog-details">
                        @if($pengumuman->foto_pengumuman == 'no-image.jpg')
                        <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="{{asset('assets/images/blog/blog-2.jpg')}}" alt="blog-main" /></div>
						@else
                        <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="{{asset('storage/'. $pengumuman->foto_pengumuman)}}" alt="blog-main" /></div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="blog-details">
                                    <ul class="blog-social">
                                        <li>{{ tanggal_indo($pengumuman->tgl_terbit) }}</li>
                                        <li><i class="icofont icofont-user"></i>Oleh : <span>{{ $pengumuman->penanggung_jawab }} </span></li>
                                    </ul>
                                    <h4>
                                        {{ $pengumuman->judul_pengumuman }}
                                    </h4>
                                    <div class="single-blog-content-top">
                                        <article>
                                            {!! $pengumuman->isi_pengumuman !!}
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
