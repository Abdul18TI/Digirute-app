@extends('layouts.main-warga')

@section('title')Tambah Pengaduan Warga
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush

@section('container')
    @component('components.warga.breadcrumb')
      @slot('breadcrumb_title')
          <h3>Tambah Pengaduan</h3>
      @endslot
      <li class="breadcrumb-item">Pengaduan</li>
      <li class="breadcrumb-item active">Tambah Pengaduan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- @if ($errors->any())
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Terjadi kesalahan</strong>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif --}}
                
                  <div class="card">
                    <div class="card-header pb-0">
                      <h5>Tambah Pengaduan</h5>
                    </div>
                    <div class="card-body">
                      <form class="theme-form" enctype="multipart/form-data" method="POST" action="{{ route('warga.pengaduan.store') }}">
                        @csrf
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label" for="judul_pengaduan">Judul Pengaduan</label>
                          <div class="col-sm-9">
                            <input class="form-control @error('judul_pengaduan') is-invalid @enderror" name="judul_pengaduan" id="judul_pengaduan" type="text" placeholder="Judul Pengaduan" value="{{ old('judul_pengaduan') }}" autocomplete="false" autofocus>
                            @error('judul_pengaduan')
                               <div class="invalid-feedback">{{ $message}}</div>
                              @enderror
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label" for="kategori_pengaduan">Kategori</label>
                          <div class="col-sm-9">
                            <select class="form-select digits" name="kategori_pengaduan" id="kategori_pengaduan">
                              @foreach ($pengaduan as $p)
                              <option value="{{ $p->id_kategori_pengaduan }}">{{ $p->nama_kategori_pengaduan }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label" for="deskripsi_pengaduan">Deskripsi</label>
                          <div class="col-sm-9">
                              <textarea class="form-control @error('deskripsi_pengaduan') is-invalid @enderror" id="deskripsi_pengaduan" name="deskripsi_pengaduan" rows="3">{{ old('deskripsi_pengaduan')}}</textarea>
                              @error('deskripsi_pengaduan')
                               <div class="invalid-feedback">{{ $message}}</div>
                              @enderror
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label" for="bukti_pengaduan">Bukti</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="file" id="bukti_pengaduan" name="bukti_pengaduan">
                             <small class="text-muted">* Ukuran Maksimal File 4 Mb</small>
                          </div>
                        </div>
                      </div>
                    <div class="card-footer">
                      <button class="btn btn-primary" type="submit">Simpan</button>
                      <button class="btn btn-secondary" type="reset">Batal</button>
                    </form>
                    </div>
                  </div>
                <!-- Form Pengaduan End -->
            </div>
        </div>
</div>
@endsection
