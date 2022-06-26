@extends('layouts.main-warga')

@section('title')Kegiatan
 {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Kegiatan</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Kegiatan</li>
    @endcomponent
    @if($kegiatan === null)
	<div class="container-fluid blog-page">
		Tidak ada kegiatan
	</div>
	@else
    <div class="container-fluid blog-page">
	    <div class="row">
	        <div class="col-xxl-6 set-col-12 box-col-12 xl-40">
	            <div class="card">
	                <div class="blog-box blog-shadow">
						@if($kegiatan[0]->foto_kegiatan == null)
	                    <img class="img-fluid bg-img-cover" src="{{asset('assets/images/blog/blog.jpg')}}" alt="" />
						@else
						<img class="img-fluid bg-img-cover" src="{{asset('storage/'. $kegiatan[0]->foto_kegiatan)}}" alt="" />
						@endif
	                    <div class="blog-details">
	                        <p>{{ tanggal_indo($kegiatan[0]->tgl_mulai_kegiatan) }}</p>
	                        <h4>{{ $kegiatan[0]->nama_kegiatan }}.</h4>
							<ul class="blog-social">
								<li>oleh: {{ $kegiatan[0]->penanggung_jawab }}</li>
							</ul>
							<hr />
							<article class="mt-0 text-light">{!! Str::limit($kegiatan[1]->isi_kegiatan, 100) !!}</article>
							<div class="mt-3 pull-right">
							<a href="kegiatan_warga/{{ $kegiatan[0]->id_kegiatan }}" class="btn btn-square btn-sm btn-secondary pull-right" type="button">Baca Selengkapnya</a>
							</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-xxl-6 set-col-12 box-col-12 xl-60">
				<div class="row">
					@foreach ($kegiatan->skip(1)->take(2) as $k)
	                <div class="col-xl-12 col-md-6">
	                    <div class="card">
	                        <div class="blog-box blog-list row">
	                            <div class="col-xl-6 col-12">
	                                <div class="blog-wrraper">
										@if($k->foto_kegiatan == null)
	                                    <a href="kegiatan_warga/{{ $k->id_kegiatan }}"><img class="img-fluid sm-100-wp p-0" src="{{asset('assets/images/blog/blog-2.jpg')}}" alt="" /></a>
										@else
										<a href="kegiatan_warga/{{ $k->id_kegiatan }}"><img class="p-0" src="{{asset('storage/'. $k->foto_kegiatan)}}" width="316" height="225" alt="" /></a>
										@endif
	                                </div>
	                            </div>
	                            <div class="col-xl-6 col-12">
	                                <div class="blog-details">
	                                    <div class="blog-date">{{ tanggal_indo($k->tgl_mulai_kegiatan) }}</div>
	                                    <a href="kegiatan_warga/{{ $k->id_kegiatan }}"> <h6>{{ $k->nama_kegiatan }}</h6></a>
	                                    <div class="blog-bottom-content">
	                                        <ul class="blog-social">
	                                            <li>oleh: {{ $k->penanggung_jawab }}</li>
	                                        </ul>
	                                        <hr />
	                                        <article class="mt-0 text-dark">{!! Str::limit($k->isi_kegiatan, 100) !!}.</article>
											<div class="pull-right">
												<a href="kegiatan_warga/{{ $k->id_kegiatan }}" class="btn btn-square btn-sm btn-secondary pull-right" type="button">Baca Selengkapnya</a>
												</div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
					@endforeach
	            </div>
	        </div>
			@foreach ($kegiatan->skip(3) as $kk)
	        <div class="col-sm-6 col-xl-3 box-col-6 des-xl-50">
	            <div class="card">
	                <div class="blog-box blog-grid">
	                    <div class="blog-wrraper">
							@if($kegiatan != null)
	                        <a href="kegiatan_warga/{{ $kk->id_kegiatan }}"><img class="p-0" src="{{asset('storage/'. $kk->foto_kegiatan)}}" width="421" height="263" alt="" /></a>
							@else
	                        <a href="kegiatan_warga/{{ $kk->id_kegiatan }}"><img class="img-fluid top-radius-blog" src="{{asset('assets/images/blog/blog-6.jpg')}}" alt="" /></a>
							@endif
	                    </div>
	                    <div class="blog-details-second">
							<div class="blog-date">{{ tanggal_indo($kk->tgl_mulai_kegiatan) }}</div>
	                        <a href="kegiatan_warga/{{ $kk->id_kegiatan }}"> <h6 class="blog-bottom-details">{{ $kk->nama_kegiatan }}</h6></a>
							<ul class="blog-social">
								<li>oleh: {{ $kk->penanggung_jawab }}</li>
							</ul>
							<hr />
	                        <article class="mt-0 text-dark">{!! Str::limit($kk->isi_kegiatan, 100) !!}.</article>
								<a href="kegiatan_warga/{{ $kk->id_kegiatan }}" class="btn btn-square btn-sm btn-secondary pull-right mb-3 mt-3" type="button">Baca Selengkapnya</a>
	                    </div>
	                </div>
	            </div>
	        </div>
			@endforeach
	    </div>
	</div>
	@endif

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')

@endpush