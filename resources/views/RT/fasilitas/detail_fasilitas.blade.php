@extends('layouts.main-rt')

@section('title')
    Detail Fasilitas
    {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
    @component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
            <h3>
                Detail Fasilitas</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.fasilitas.index') }}">Fasilitas</a></li>
        <li class="breadcrumb-item active">Detail Fasilitas</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-single">
                    <div class="blog-box blog-details">

                        {{-- @if ($fasilitas->foto_fasilitas == null)     
            @else
            <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="{{asset('storage/'. $fasilitas->foto_fasilitas)}}" alt="blog-main" /></div>
            @endif --}}
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
                                        <li class="middle">Kategori :<a
                                                href="/RT/fasilitasrt?category={{ $fasilitas->kategori_fasilitas_umum }}">
                                                {{ $fasilitas->fasilitas_umumss->kategori_fasilitas }}</a></li>
                                    </ul>
                                    <h4>
                                        {{ $fasilitas->fasilitas_umum }}
                                    </h4>
                                    <div class="single-blog-content-top txt-dark ">
                                        {!! $fasilitas->deskripsi_fasilitas !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="text-center">Map</h6>
                                            <div class="single-blog-content-top txt-dark">
                                                @if ($fasilitas->koordinant_fasilitas != null)
                                                    <center class="mt-3">
                                                        {!! $fasilitas->koordinant_fasilitas !!}
                                                    </center>
                                                @else
                                                    <center class="mt-3">
                                                        <h3>-- Map tidak ada --</h3>
                                                    </center>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-center">Gambar</h6>
                                            <div class="single-blog-content-top txt-dark">
                                                <div class="mt-3">
                                                    <center>
                                                        <img class="img-fluid w-75 img-thumbnail "
                                                            src="{{ asset('storage/' . $fasilitas->foto_fasilitas) }}"
                                                            alt="Foto {{ $fasilitas->fasilitas_umum }} " />
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                {{-- TOMBOL EDIT --}}
                                <a class="btn btn-secondary"
                                    href="{{ route('rt.fasilitas.edit', $fasilitas->id_fasilitas_umum) }}"><span
                                        class="fa fa-edit"></span> Edit</a>
                                {{-- END TOMBOL EDIT --}}
                                <form method="POST"
                                    action="{{ route('rt.fasilitas.destroy', $fasilitas->id_fasilitas_umum) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                                    <button type="submit" class="btn btn-danger border-0 sweet"><span
                                            class="fa fa-trash-o"></span> Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
