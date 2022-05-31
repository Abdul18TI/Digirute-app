@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-single">
                    <div class="blog-box blog-details">
                        <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover"
                                src="{{asset('storage/'. $kegiatan->foto_kegiatan)}}" alt="blog-main" /></div>
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
</div>
@endsection