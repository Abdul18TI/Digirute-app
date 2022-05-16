@extends('layouts.main-warga')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        {{-- <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Pengaduan</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Pengaduan</a></li>
                        <li class="breadcrumb-item active">Tambah Pengaduan</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                        <ul>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                <form class="form-inline search-form">
                                    <div class="form-group form-control-search">
                                        <input type="text" placeholder="Search..">
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div> --}}
    </div><!-- Form Tambah Warga -->
   
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
                            <input class="form-control @error('judul_pengaduan') is-invalid @enderror" name="judul_pengaduan" id="judul_pengaduan" type="text" placeholder="Judul Pengaduan" value="{{ old('judul_pengaduan') }}">
                            @error('judul_pengaduan')
                               <div class="invalid-feedback">{{ $message}}</div>
                              @enderror
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label" for="kategori_pengaduan">Kategori</label>
                          <div class="col-sm-9">
                            <select class="form-select digits" name="kategori_pengaduan" id="kategori_pengaduan">
                              <option value="Kerusakan Fasilitas Umum">Kerusakan Fasilitas Umum</option>
                              <option value="Sampah">Sampah</option>
                              <option value="Lainnya">Lainnya</option>
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
                          </div>
                        </div>
                      </div>
                    <div class="card-footer">
                      <button class="btn btn-primary" type="submit">Submit</button>
                      <button class="btn btn-secondary" type="reset">Batal</button>
                    </form>
                    </div>
                  </div>
                <!-- Form Pengaduan End -->
            </div>
        </div>
    </div>
</div>
@endsection
