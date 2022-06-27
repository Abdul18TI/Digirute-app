@extends('layouts.main-rw')

@section('container')
@component('components.r-w.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Kegiatan</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rw.kegiatan.index') }}">Kegiatan</a></li>
        <li class="breadcrumb-item active">Detail kegiatan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-single">
                    <div class="blog-box blog-details">
                        @if($kegiatan->foto_kegiatan == 'no-image.jpg')
                        <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="{{asset('assets/images/blog/blog-2.jpg')}}" alt="blog-main" /></div>
						@else
                        <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="{{asset('storage/'. $kegiatan->foto_kegiatan)}}" alt="blog-main" /></div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="blog-details">
                                    <h4>
                                        {{ $kegiatan->nama_kegiatan }}.
                                    </h4>
                                    <ul class="blog-social">
                                        <li>{{ $kegiatan->kategori_kegiatan }}</li>
                                    </ul>
                                    <div class="single-blog-content-top">
                                        <article>
                                            {!! $kegiatan->isi_kegiatan !!}.
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