@extends('layouts.main-rt')

@section('title')
  Detail Kepindahan Warga
  {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
  @component('components.r-t.breadcrumb')
    @slot('breadcrumb_title')
      <h3>
        Detail Kepindahan Warga</h3>
    @endslot
    <li class="breadcrumb-item">Kepindahan Warga</li>
    <li class="breadcrumb-item active">Detail Kepindahan Warga</li>
  @endcomponent

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-single">
          <div class="blog-box blog-details">
            <div class="card">
              <div class="card-body">
                <div class="blog-details">
                  <ul class="blog-social">
                    <li class="middle">Nama Warga : {{ $kemiskinan->wargas->nama_lengkap }}</li>
                  </ul>
                  <h4>
                    <a class="text-success" href="{{ asset('storage/'. $kemiskinan->bukti) }}">
                        Lihat Bukti
                    </a>
                  </h4>
                  <div class="single-blog-content-top txt-dark">
                    <p>
                    {!! $kemiskinan->deskripsi !!}
                    </p>
                  </div>
                </div>
              </div>
              <div class="card-footer text-end">
                {{-- TOMBOL DELETE --}}
                <form method="POST" action="{{ route('rt.kemiskinan.destroy', $kemiskinan->id) }}"
                  class="d-inline">
                  @csrf
                  @method('DELETE')
                  {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                  <button type="submit" class="btn btn-danger btn-lg border-0 sweet"><span class="fa fa-trash"></span>
                    Hapus</button>
                </form>
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
