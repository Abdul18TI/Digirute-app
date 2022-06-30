@extends('layouts.main-warga')

@section('title')Pengumuman
 {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Pengumuman</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Pengumuman</li>
    @endcomponent
    @if($pengumuman->count() )
	<div class="container-fluid blog-page">
		<div class="feature-products">
			<div class="row">
				<div class="col-md-12">
					<div class="pro-filter-sec">
						<div class="product-search">
							<form action="pengumuman_warga">
								<div class="form-group m-0"><input class="form-control" type="search" name="search" placeholder="Search.." data-original-title="" title="" value="{{ request('search') }}" /><i type="submit" class="fa fa-search"></i></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	    <div class="row">
	        <div class="col-xxl-6 set-col-12 box-col-12 xl-40">
	            <div class="card">
	                <div class="blog-box blog-shadow">
						@if($pengumuman[0]->foto_pengumuman == 'no-image.jpg')
	                    <img class="img-fluid bg-img-cover" src="{{asset('assets/images/blog/blog.jpg')}}" alt="" />
						@else
						<img class="img-fluid bg-img-cover" src="{{asset('storage/'. $pengumuman[0]->foto_pengumuman)}}" alt="" />
						@endif
	                    <div class="blog-details">
	                        <p>{{ tanggal_indo($pengumuman[0]->tgl_terbit) }}</p>
	                        <h4>{{ $pengumuman[0]->nama_pengumuman }}</h4>
							<ul class="blog-social">
								<li>oleh: {{ $pengumuman[0]->penanggung_jawab }}</li>
							</ul>
							<hr />
							<article class="mt-0 text-light">{!! Str::limit($pengumuman[0]->isi_pengumuman, 100) !!}</article>
							<div class="mt-3 pull-right">
							<a href="pengumuman_warga/{{ $pengumuman[0]->id_pengumuman }}" class="btn btn-square btn-sm btn-secondary pull-right" type="button">Baca Selengkapnya</a>
							</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-xxl-6 set-col-12 box-col-12 xl-60">
				<div class="row">
					@foreach ($pengumuman->skip(1)->take(2) as $k)
	                <div class="col-xl-12 col-md-6">
	                    <div class="card">
	                        <div class="blog-box blog-list row">
	                            <div class="col-xl-6 col-12">
	                                <div class="blog-wrraper">
										@if($k->foto_pengumuman == 'no-image.jpg')
	                                    <a href="pengumuman_warga/{{ $k->id_pengumuman }}"><img class="img-fluid sm-100-wp p-0" src="{{asset('assets/images/blog/blog-2.jpg')}}" alt="" /></a>
										@else
										<a href="pengumuman_warga/{{ $k->id_pengumuman }}"><img class="p-0" src="{{asset('storage/'. $k->foto_pengumuman)}}" width="316" height="225" alt="" /></a>
										@endif
	                                </div>
	                            </div>
	                            <div class="col-xl-6 col-12">
	                                <div class="blog-details">
	                                    <div class="blog-date">{{ tanggal_indo($k->tgl_terbit) }}</div>
	                                    <a href="pengumuman_warga/{{ $k->id_pengumuman }}"> <h6>{{ $k->nama_pengumuman }}</h6></a>
	                                    <div class="blog-bottom-content">
	                                        <ul class="blog-social">
	                                            <li>oleh: {{ $k->penanggung_jawab }}</li>
	                                        </ul>
	                                        <hr />
	                                        <article class="mt-0 text-dark">{!! Str::limit($k->isi_pengumuman, 100) !!}.</article>
											<div class="pull-right">
												<a href="pengumuman_warga/{{ $k->id_pengumuman }}" class="btn btn-square btn-sm btn-secondary pull-right" type="button">Baca Selengkapnya</a>
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
			@foreach ($pengumuman->skip(3) as $kk)
	        <div class="col-sm-6 col-xl-3 box-col-6 des-xl-50">
	            <div class="card">
	                <div class="blog-box blog-grid">
	                    <div class="blog-wrraper">
							@if($kk->foto_pengumuman != 'no-image.jpg')
	                        <a href="pengumuman_warga/{{ $kk->id_pengumuman }}"><img class="p-0" src="{{asset('storage/'. $kk->foto_pengumuman)}}" width="421" height="263" alt="" /></a>
							@else
	                        <a href="pengumuman_warga/{{ $kk->id_pengumuman }}"><img class="img-fluid top-radius-blog" src="{{asset('assets/images/blog/blog-6.jpg')}}" alt="" /></a>
							@endif
	                    </div>
	                    <div class="blog-details-second">
							<div class="blog-date">{{ tanggal_indo($kk->tgl_terbit) }}</div>
	                        <a href="pengumuman_warga/{{ $kk->id_pengumuman }}"> <h6 class="blog-bottom-details">{{ $kk->nama_pengumuman }}</h6></a>
							<ul class="blog-social">
								<li>oleh: {{ $kk->penanggung_jawab }}</li>
							</ul>
							<hr />
	                        <article class="mt-0 text-dark">{!! Str::limit($kk->isi_pengumuman, 100) !!}.</article>
								<a href="pengumuman_warga/{{ $kk->id_pengumuman }}" class="btn btn-square btn-sm btn-secondary pull-right mb-3 mt-3" type="button">Baca Selengkapnya</a>
	                    </div>
	                </div>
	            </div>
	        </div>
			@endforeach
	    </div>
	</div>
	@else
    <div class="container-fluid blog-page">
		<div class="feature-products">
			<div class="row">
				<div class="col-md-12">
					<div class="pro-filter-sec">
						<div class="product-search">
							<form action="pengumuman_warga">
								<div class="form-group m-0"><input class="form-control" type="search" name="search" placeholder="Search.." data-original-title="" title="" value="{{ request('search') }}" /><i type="submit" class="fa fa-search"></i></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<p>Pengumuman yang dicari tidak ada</p>	
	</div>
	@endif

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')

@endpush