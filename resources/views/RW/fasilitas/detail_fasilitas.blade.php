@extends('layouts.main-rw')

@section('title')
  Detail Fasilitas
  {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
  @component('components.r-w.breadcrumb')
    @slot('breadcrumb_title')
      <h3>
        Detail Fasilitas</h3>
    @endslot
    <li class="breadcrumb-item"><a href="{{ route('rw.fasilitasrw.index')}}">Fasilitas</a></li>
    <li class="breadcrumb-item active">Detail Fasilitas</li>
  @endcomponent

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-single">
          <div class="blog-box blog-details">

           @if($fasilitas->foto_fasilitas == null)     
            @else
            <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="{{asset('storage/'. $fasilitas->foto_fasilitas)}}" alt="blog-main" /></div>
            @endif
            <div class="card">
              <div class="card-body">
                <div class="blog-details">
                  <ul class="blog-social">
                    <li class="middle">Status :
                      @if ($fasilitas->status_fasilitas == 1)
                        <span id="status_aja" class="badge badge-success">Aktif</span>
                      @else
                        <span id="status_aja" class="badge badge-warning">Tidak Aktif</span>
                      @endif
                      </span>
                    </li>
                    <li class="middle">Kategori :<a href="/RW/fasilitasrw?category={{ $fasilitas->kategori_fasilitas_umum }}"> {{ $fasilitas->fasilitas_umumss->kategori_fasilitas }}</a></li>
                  </ul>
                  <h4>
                    {{ $fasilitas->fasilitas_umum }}
                  </h4>
                  <div class="single-blog-content-top txt-dark">
                    {!! $fasilitas->deskripsi_fasilitas !!}.
                  </div>
                  @if($fasilitas->koordinant_fasilitas != null)
                  <h6>Lampiran</h5>
                    <div class="single-blog-content-top txt-dark">
                        {!! $fasilitas->koordinant_fasilitas !!}
                      </div>
                    @else
                    @endif
                </div>
              </div>
              <div class="card-footer text-end">
              {{-- TOMBOL EDIT --}}
              <a class="btn btn-secondary btn-lg"
              href="{{ route('rw.fasilitasrw.edit', $fasilitas->id_fasilitas_umum) }}"><span
                class="fa fa-edit"></span>Edit</a>
            {{-- END TOMBOL EDIT --}}

            <form method="POST" action="{{ route('rw.fasilitasrw.destroy', $fasilitas->id_fasilitas_umum) }}"
                  class="d-inline">
                  @csrf
                  @method('DELETE')
                  {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                  <button type="submit" class="btn btn-danger btn-lg border-0 sweet"><span class="fa fa-trash"></span>
                    Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- </div>
  </div> --}}
@endsection


