@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        @foreach($pengumuman as $p)
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-single">
                    <div class="blog-box blog-details">
                        <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover"
                                src="{{asset('storage/'. $p->foto_pengumuman)}}" alt="blog-main" /></div>
                        <div class="card">
                            <div class="card-body">
                                <div class="blog-details">
                                    <h4>
                                        {{ $p->judul_pengumuman }}.
                                    </h4>
                                    <ul class="blog-social">
                                        <li>{{ $p->kategori_pengumuman }}</li>
                                    </ul>
                                    <div class="single-blog-content-top">
                                        <p>
                                            {{ $p->isi_pengumuman }}.
                                        </p>
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
@endsection