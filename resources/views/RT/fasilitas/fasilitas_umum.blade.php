@extends('layouts.main-rt')

@section('title')Fasilitas Umum
 {{ $title }}
@endsection

@push('css')
	
@endpush

@section('container')
    @component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Fasilitas umum</h3>
        @endslot
        <li class="breadcrumb-item active">Fasilitas umum</li>
        {{-- <li class="breadcrumb-item active">Kategori_Fasilitas umum</li> --}}
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
			@foreach ($pengumuman->skip(3) as $kk)
	        <div class="col-sm-6 col-xl-3 box-col-6 des-xl-50">
	            <div class="card">
	                <div class="blog-box blog-grid">
	                    <div class="blog-wrraper">
							@if($kk->foto_pengumuman != 'no-image.jpg')
	                        <a href="{{route('warga.pengumuman_warga.show',$kk->id_pengumuman)}}"><img class="p-0" src="{{asset('storage/'. $kk->foto_pengumuman)}}" width="421" height="263" alt="" /></a>
							@else
	                        <a href="{{route('warga.pengumuman_warga.show',$kk->id_pengumuman)}}"><img class="img-fluid top-radius-blog" src="{{asset('assets/images/blog/blog-6.jpg')}}" alt="" /></a>
							@endif
	                    </div>
	                    <div class="blog-details-second">
							<div class="blog-date">{{ tanggal_indo($kk->tgl_terbit) }}</div>
	                        <a href="{{route('warga.pengumuman_warga.show',$kk->id_pengumuman)}}"> <h6 class="blog-bottom-details">{{ $kk->nama_pengumuman }}</h6></a>
							<ul class="blog-social">
								<li>oleh: {{ $kk->penanggung_jawab }}</li>
								<li>Kategori: <a href="/Warga/pengumuman_warga?category={{ $kk->kategori_pengumuman }}">{{ $kk->Kategori_pengumumans->nama_kategori_pengumuman }}</a></li>
							</ul>
							<hr />
	                        <article class="mt-0 text-dark">{!! Str::limit($kk->isi_pengumuman, 100) !!}.</article>
								<a href="{{route('warga.pengumuman_warga.show',$kk->id_pengumuman)}}" class="btn btn-square btn-sm btn-secondary pull-right mb-3 mt-3" type="button">Baca Selengkapnya</a>
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
		<p>Fasilitas umum yang dicari tidak ada</p>	
	</div>
	@endif

<div class="d-flex justify-content-end mb-3">
	{{ $pengumuman->links() }}
</div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')

@endpush