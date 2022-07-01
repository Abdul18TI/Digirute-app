@extends('layouts.main-warga')

@section('title')
  Detail Pengumuman
  {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
  @component('components.warga.breadcrumb')
    @slot('breadcrumb_title')
      <h3>
        Detail Pengumuman</h3>
    @endslot
    <li class="breadcrumb-item"><a href="{{ route('warga.pengumuman_warga.index') }}">Pengumuman</a></li>
    <li class="breadcrumb-item active">Detail Pengumuman</li>
  @endcomponent

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-single">
          <div class="blog-box blog-details">
            <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" {{-- src="{{ asset('assets/images/blog/blog-single.jpg') }}" alt="blog-main" /></div> --}}
                src="{{ asset('storage/' . $pengumuman->foto_pengumuman) }}" alt="blog-main" /></div>
            <div class="card">
              <div class="card-body">
                <div class="blog-details">
                  <ul class="blog-social">
                    <li class="middle">Publish : {{ tanggal_waktu_indo($pengumuman->tgl_terbit) }}</li>
                    <li class="middle">Status :
                      @if ($pengumuman->status_pengumuman == 1)
                        <span id="status_aja" class="badge badge-success">Aktif</span>
                      @else
                        <span id="status_aja" class="badge badge-warning">Tidak Aktif</span>
                      @endif
                      </span>
                    </li>
                  </ul>
                  <h4>
                    {{ $pengumuman->judul_pengumuman }}
                  </h4>
                  <div class="single-blog-content-top txt-dark">
                    {!! $pengumuman->isi_pengumuman !!}.
                  </div>
                  @if($pengumuman->foto_pengumuman != null)
                  <h6>Lampiran</h5>
                    <div class="single-blog-content-top txt-dark">
                      <p class="text-center">
                        <img class="img-fluid w-75 " src="{{ asset('storage/' . $pengumuman->foto_pengumuman) }}"
                          alt="Foto {{$pengumuman->nama_pengumuman}} " />
                      </p>
                    </div>
                    @else
                    @endif
                </div>
              </div>
              {{-- END TOMBOL DELETE --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- </div>
  </div> --}}
@endsection

