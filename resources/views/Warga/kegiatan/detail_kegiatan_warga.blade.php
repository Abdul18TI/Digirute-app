@extends('layouts.main-warga')

@section('title')
  Detail Kegiatan
  {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
  @component('components.warga.breadcrumb')
    @slot('breadcrumb_title')
      <h3>
        Detail Kegiatan</h3>
    @endslot
    <li class="breadcrumb-item"><a href="{{ route('rw.kegiatan.index') }}">Kegiatan</a></li>
    <li class="breadcrumb-item active">Detail Kegiatan</li>
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
                  <ul class="blog-social">
                    <li class="middle">Publish : {{ $kegiatan->tanggal_publish == true ? $kegiatan->tanggal_publish : $kegiatan->created_at->diffForHumans()  }}</li>
                    <li class="middle">Status :
                      @if ($kegiatan->status_kegiatan == 1)
                        <span id="status_aja" class="badge badge-success">Aktif</span>
                      @else
                        <span id="status_aja" class="badge badge-warning">Tidak Aktif</span>
                      @endif
                      </span>
                    </li>
                  </ul>
                  <h4>
                    {{ $kegiatan->nama_kegiatan }}
                  </h4>
                  <div class="single-blog-content-top txt-dark">
                    {!! $kegiatan->isi_kegiatan !!}.
                  </div>
                  <h6>Waktu</h5>
                    <div class="single-blog-content-top txt-dark mb-2">
                      <p>
                        <strong>Tanggal Mulai Kegiatan :</strong>
                        {{ tanggal_waktu_indo($kegiatan->tgl_mulai_kegiatan) }}
                      </p>
                      <p>
                        <strong>Tanggal Selesai Kegiatan :</strong>
                        {{ tanggal_waktu_indo($kegiatan->tgl_selesai_kegiatan) }}
                      </p>
                    </div>
                    @if($kegiatan->foto_kegiatan != 'no-image.jpg')
                    <h6>Lampiran</h5>
                      <div class="single-blog-content-top txt-dark">
                        <p class="text-center">
                          <img class="img-fluid w-75 " src="{{ asset('storage/' . $kegiatan->foto_kegiatan) }}"
                            alt="Foto {{$kegiatan->nama_kegiatan}} " />
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