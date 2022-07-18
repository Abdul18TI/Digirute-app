@extends('layouts.main-warga')

@section('title')
    Kegiatan
    {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Kegiatan</h3>
        @endslot
        <li class="breadcrumb-item active">Kegiatan</li>
        {{-- <li class="breadcrumb-item active">Kategori_Kegiatan</li> --}}
    @endcomponent
    @if ($kegiatan->count())
        <div class="container-fluid blog-page">
            <div class="feature-products">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pro-filter-sec">
                            <div class="product-search">
                                <form action="kegiatan_warga">
                                    @if (request('category'))
                                        <input type="hidden" name="category" value="{{ request('category') }}">
                                    @endif
                                    <div class="form-group m-0"><input class="form-control" type="search" name="search"
                                            placeholder="Search.." data-original-title="" title=""
                                            value="{{ request('search') }}" /><i type="submit" class="fa fa-search"></i>
                                    </div>
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
                            @if ($kegiatan[0]->foto_kegiatan == 'no-image.jpg')
                                <img class="img-fluid bg-img-cover" src="{{ asset('assets/images/blog/blog.jpg') }}"
                                    alt="" />
                            @else
                                <img class="img-fluid bg-img-cover"
                                    src="{{ asset('storage/' . $kegiatan[0]->foto_kegiatan) }}" alt="" />
                            @endif
                            <div class="blog-details">
                                <p>{{ tanggal_indo($kegiatan[0]->tgl_mulai_kegiatan) }}</p>
                                <h4>{{ $kegiatan[0]->nama_kegiatan }}</h4>
                                <ul class="blog-social">
                                    <li>oleh: {{ $kegiatan[0]->penanggung_jawab }}</li>
                                    <li>Kategori: <a
                                            href="/Warga/kegiatan_warga?category={{ $kegiatan[0]->kategori_kegiatan }}">{{ $kegiatan[0]->Kategori_kegiatans->kategori_kegiatan }}</a>
                                    </li>
                                </ul>
                                <hr />
                                <article class="mt-0 text-light">{!! Str::limit($kegiatan[0]->isi_kegiatan, 100) !!}</article>
                                <div class="mt-3 pull-right">
                                    <a href="{{ route('warga.kegiatan_warga.show', $kegiatan[0]->id_kegiatan) }}"
                                        class="btn btn-sm btn-secondary pull-right" type="button">Baca Selengkapnya</a>
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
                                                @if ($k->foto_kegiatan == 'no-image.jpg')
                                                    <a
                                                        href="{{ route('warga.kegiatan_warga.show', $k->id_kegiatan) }}"><img
                                                            class="img-fluid sm-100-wp p-0"
                                                            src="{{ asset('assets/images/blog/blog-2.jpg') }}"
                                                            alt="" /></a>
                                                @else
                                                    <a
                                                        href="{{ route('warga.kegiatan_warga.show', $k->id_kegiatan) }}"><img
                                                            class="p-0"
                                                            src="{{ asset('storage/' . $k->foto_kegiatan) }}"
                                                            width="316" height="260" alt="" /></a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-12">
                                            <div class="blog-details">
                                                <div class="blog-date mt-3">{{ tanggal_indo($k->tgl_mulai_kegiatan) }}</div>
                                                <a href="{{ route('warga.kegiatan_warga.show', $k->id_kegiatan) }}">
                                                    <h6>{{ $k->nama_kegiatan }}</h6>
                                                </a>
                                                <div class="blog-bottom-content">
                                                    <ul class="blog-social">
                                                        @if ($k->penanggung_jawab == 'RT')
                                                            <li>oleh: RT {{ $k->rts->no_rt }}</li>
                                                        @else
                                                            <li>oleh: RW {{ $k->rws->no_rw }}</li>
                                                        @endif
                                                        <li>Kategori: <a
                                                                href="/Warga/kegiatan_warga?category={{ $k->kategori_kegiatan }}">{{ $k->Kategori_kegiatans->kategori_kegiatan }}</a>
                                                        </li>
                                                    </ul>
                                                    <hr />
                                                    <article class="mt-0 text-dark">{!! Str::limit($k->isi_kegiatan, 100) !!}</article>
                                                    <div class="pull-right ">
                                                        <a href="{{ route('warga.kegiatan_warga.show', $k->id_kegiatan) }}"
                                                            class="btn btn-sm btn-secondary pull-right my-3" type="button">Baca
                                                            Selengkapnya</a>
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
                                    @if ($kk->foto_kegiatan != 'no-image.jpg')
                                        <a href="{{ route('warga.kegiatan_warga.show', $kk->id_kegiatan) }}"><img
                                                class="p-0" src="{{ asset('storage/' . $kk->foto_kegiatan) }}"
                                                width="421" height="263" alt="" /></a>
                                    @else
                                        <a href="{{ route('warga.kegiatan_warga.show', $kk->id_kegiatan) }}"><img
                                                class="img-fluid top-radius-blog"
                                                src="{{ asset('assets/images/blog/blog-6.jpg') }}" alt="" /></a>
                                    @endif
                                </div>
                                <div class="blog-details-second">
                                    @if ($kk->penanggung_jawab == 'RT')
                                        <div class="blog-post-date"><span class="blg-month">RT
                                                {{ $kk->rts->no_rt }}</span></div>
                                    @else
                                        <div class="blog-post-date"><span class="blg-date">RW
                                                {{ $kk->rws->no_rw }}</span></div>
                                    @endif
                                    <div class="blog-date mt-3">{{ tanggal_indo($kk->tgl_mulai_kegiatan) }}</div>
                                    <a href="{{ route('warga.kegiatan_warga.show', $kk->id_kegiatan) }}">
                                        <h6 class="blog-bottom-details mt-2">{{ $kk->nama_kegiatan }}</h6>
                                    </a>
                                    <ul class="blog-social">
                                        @if ($k->penanggung_jawab == 'RT')
                                            <li>oleh: RT {{ $k->rts->no_rt }}</li>
                                        @else
                                            <li>oleh: RW {{ $k->rws->no_rw }}</li>
                                        @endif
                                        <li>Kategori: <a
                                                href="/Warga/kegiatan_warga?category={{ $kk->kategori_kegiatan }}">{{ $kk->Kategori_kegiatans->kategori_kegiatan }}</a>
                                        </li>
                                    </ul>
                                    <hr />
                                    <article class="mt-0 text-dark">{!! Str::limit($kk->isi_kegiatan, 100) !!}</article>
                                    <a href="{{ route('warga.kegiatan_warga.show', $kk->id_kegiatan) }}"
                                        class="btn btn-sm {{ $kk->penanggung_jawab == 'RT' ? 'btn-primary' : 'btn-secondary' }} pull-right mb-3 mt-3"
                                        type="button">Baca Selengkapnya</a>
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
                                <form action="kegiatan_warga">
                                    <div class="form-group m-0"><input class="form-control" type="search"
                                            name="search" placeholder="Search.." data-original-title="" title=""
                                            value="{{ request('search') }}" /><i type="submit"
                                            class="fa fa-search"></i></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center">Kegiatan yang dicari tidak ada</p>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        {{ $kegiatan->links() }}
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')
@endpush
