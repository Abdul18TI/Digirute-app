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
	 {{-- <div class="visible-print text-center">
    {!! QrCode::format('png')->size(100)->generate(Request::url()); !!}
    <p>Scan me to return to the original page.</p>
</div> --}}

{{-- <img src="data:image/png;base64,{!! QrCode::format('png')->size(100)->generate(Request::url()); !!}"> --}}
    @if($fasilitas->count())
	<div class="container-fluid blog-page">
		<div class="feature-products">
			<div class="row mb-3">
				<div class="col-md-9">
					<div class="pro-filter-sec">
						<div class="product-search">
							<form action="fasilitasrt">
								<div class="form-group m-0"><input class="form-control" type="search" name="search" placeholder="Search.." data-original-title="" title="" value="{{ request('search') }}" /><i type="submit" class="fa fa-search"></i></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3 ">
					<a class="btn btn-primary btn-lg w-100"
                    href="{{ route('rt.fasilitas.create') }}"
                    data-bs-original-title=""
                    title=""> <span class="fa fa-plus-square"></span>
                    Tambah Data</a>
				</div>
			</div>
		</div>
	    <div class="row">
			@foreach ($fasilitas as $kk)
	        <div class="col-sm-6 col-xl-3 box-col-6 des-xl-50">
	            <div class="card">
	                <div class="blog-box blog-grid">
	                    <div class="blog-wrraper">
	                        <a href="{{ route('rt.fasilitas.show',$kk->id_fasilitas_umum) }}"><img class="p-0" src="{{ asset('storage/' . $kk->foto_fasilitas) }}" width="421" height="263" alt="" /></a>
	                    </div>
	                    <div class="blog-details-second">
							 <div class="blog-post-date"><span class="blg-month">RT</span><span class="blg-date">RW</span></div>
	                        <a href="{{ route('rt.fasilitas.show',$kk->id_fasilitas_umum) }}">
							<h6 class="blog-bottom-details">{{ Str::limit($kk->fasilitas_umum, 20) }}</h6></a>
	                        <article class="mt-0 text-dark mb-3">{!! Str::limit($kk->deskripsi_fasilitas, 40) !!}</article>
							{{-- <p>Alamat : {{  Str::limit($kk->alamat_fasilitas,20) }}</p> --}}
	                        <div class="detail-footer">
	                            <ul class="sociyal-list">
	                                <li><i class="fa fa-building-o"></i><a href="/RT/fasilitas?category={{ $kk->kategori_fasilitas_umum }}">{{ $kk->fasilitas_umumss->kategori_fasilitas }}</a></li>
	                            </ul>
	                        </div>
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
			<div class="row mb-3">
				<div class="col-md-9">
					<div class="pro-filter-sec">
						<div class="product-search">
							<form action="fasilitasrt">
								<div class="form-group m-0"><input class="form-control" type="search" name="search" placeholder="Search.." data-original-title="" title="" value="{{ request('search') }}" /><i type="submit" class="fa fa-search"></i></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<a class="btn btn-primary btn-lg w-100"
                    href="{{ route('rt.fasilitas.create') }}"
                    data-bs-original-title=""
                    title=""> <span class="fa fa-plus-square"></span>
                    Tambah Data</a>
				</div>
			</div>
		</div>
		<h4 class="text-center mt-3">Fasilitas yang dicari tidak ada</h4>	
	</div>
	@endif

<div class="d-flex justify-content-end mb-3">
	{{ $fasilitas->links() }}
</div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')

@endpush