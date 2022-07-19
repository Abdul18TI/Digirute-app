@extends('layouts.main-rt')

@section('title')
    Detail Data Kematian
    {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
    @component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
            <h3>
                Detail Data Kematian</h3>
        @endslot
        <li class="breadcrumb-item">Warga</li>
        <li class="breadcrumb-item">Kematian</li>
        <li class="breadcrumb-item active">Detail Data Kematian</li>
    @endcomponent
    <!-- Form Tambah Warga -->
    <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Detail Data Kematian {{ $kematian->wargas->nama_lengkap }} </h5>
                    </div>
                    <form class="form theme-form">
                        <div class="card-body">
                            {{-- INFORMASI JENAZA --}}
                            <h4 class="mb-2">Jenazah</h4>
                            <hr />
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik">NIK</label>
                                        <input class="form-control" type="text" id="nik" name="nik"
                                            value="{{ $kematian->wargas->nik }}" placeholder="NIK" disabled>
                                        {{-- <div class="text-danger mr-3">Data warga tidak ditemukan</div> --}}
                                        {{-- <input name="warga"
                      type="text"
                      value="{{  $kematian->warga }}"
                      id="warga"> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_lengkap">Nama</label>
                                        <input class="form-control" name="nama_lengkap" type="text" id="nama_lengkap"
                                            name="nama_lengkap" placeholder="Nama"
                                            value="{{ $kematian->wargas->nama_lengkap }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                        <input class="form-control" name="jenis_kelamin" type="text" id="jenis_kelamin"
                                            name="jenis_kelamin" placeholder="Jenis Kelamin"
                                            value="{{ $kematian->wargas->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="agama">Agama</label>
                                        <input class="form-control" name="agama" type="text" id="agama"
                                            name="agama" placeholder="Agama"
                                            value="{{ $kematian->wargas->agamas->agama }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="agama">Pekerjaan</label>
                                        <input class="form-control" name="pekerjaan" type="text" id="pekerjaan"
                                            name="pekerjaan" placeholder="Pekerjaan"
                                            value="{{ $kematian->wargas->pekerjaans->nama_pekerjaan }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="tgl_lahir">Tempat Tanggal Lahir</label>
                                        <input class="form-control" name="tempat_lahir" type="text" id="tempat_lahir"
                                            name="tempat_lahir" placeholder="Tempat Lahir"
                                            value="{{ $kematian->wargas->tempat_lahir }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="tgl_lahir">&nbsp;</label>
                                        <input class="form-control" name="tgl_lahir" type="text" id="tgl_lahir"
                                            name="tgl_lahir" placeholder="Tanggal Lahir"
                                            value="{{ tanggal_indo($kematian->wargas->tgl_lahir) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-5">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control " id="alamat" placeholder="Alamat" disabled>{{ $kematian->wargas->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- END INFORMASI JENAZA --}}
                            {{-- INFORMASI KEMATIAN --}}
                            <h4 class="mb-2">Informasi Kematian</h4>
                            <hr />
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="tempat_kematian">Tempat Kematian</label>
                                        <input class="form-control" name="tempat_kematian" type="text"
                                            id="tempat_kematian" name="tempat_kematian"
                                            value="{{ $kematian->tempat_kematian }}"
                                            placeholder="Tempat Kematian Contoh : Rumah, Rumah Sakit dan lain-lain"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="tgl_kematian">Tanggal Kematian</label>
                                        <input class="form-control" name="tgl_kematian" type="text" id="tgl_kematian"
                                            name="tgl_kematian" value="{{ tanggal_indo($kematian->tgl_kematian) }}"
                                            placeholder="Tanggal kematian" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-5">
                                        <label class="form-label" for="sebab_kematian">Sebab Kematian</label>
                                        <input class="form-control" name="sebab_kematian" type="text"
                                            id="sebab_kematian" name="sebab_kematian"
                                            value="{{ $kematian->sebab_kematian }}"
                                            placeholder="Sebab Kematian Contoh: Kecelakaan, Sakit dan lain-lain" disabled>
                                    </div>
                                </div>
                            </div>
                            {{-- END INFORMASI KEMATIAN --}}
                            {{-- INFORMASI PELAPOR --}}
                            <h4 class="mb-2">Informasi Pelapor</h4>
                            <hr />
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik_pelapor">NIK Pelapor</label>
                                        <input class="form-control" name="nik_pelapor" type="text" id="nik_pelapor"
                                            name="nik_pelapor" value="{{ $kematian->nik_pelapor }}"
                                            placeholder="NIK Pelapor" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_pelapor">Nama Pelapor</label>
                                        <input class="form-control" name="nama_pelapor" type="text" id="nama_pelapor"
                                            name="nama_pelapor" placeholder="Pelapor"
                                            value="{{ ucwords($kematian->nama_pelapor) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="hubungan_jenazah">Hubungan Pelapor Terhadap
                                            Jenazah</label>
                                        <input class="form-control" name="hubungan_jenazah" type="text"
                                            id="hubungan_jenazah" name="hubungan_jenazah" placeholder="Pelapor"
                                            value="{{ ucwords($kematian->hubungan_jenazah) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="tempat_lahir_pelapor">Tempat Tanggal Lahir</label>
                                        <input class="form-control" name="tempat_lahir_pelapor" type="text"
                                            id="tempat_lahir_pelapor" name="tempat_lahir_pelapor"
                                            placeholder="Tanggal Lahir"
                                            value="{{ ucwords($kematian->tempat_lahir_pelapor) }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="tgl_lahir_pelapor">&nbsp;</label>
                                        <input class="form-control" name="tgl_lahir_pelapor" type="text"
                                            id="tgl_lahir_pelapor" name="tgl_lahir_pelapor" placeholder="Tanggal Lahir"
                                            value="{{ tanggal_indo($kematian->tgl_lahir_pelapor) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            {{-- END INFORMASI PELAPOR --}}
                        </div>
                        <div class="card-footer text-end">
                            {{-- <button class="btn btn-primary"
                type="submit">Simpan</button> --}}
                            @if ($kematian->no_surat == null && $kematian->cetak_surat == 0)
                                <a href="{{ route('rt.kematian.print_surat', $kematian->id) }}">
                                    <button type="button" class="btn btn-success btn-lg"> <span
                                            class="fa fa-file-text-o"></span> Request Surat Kematian</button>
                                </a>
                            @else
                                <a href="{{ route('rt.kematian.print_surat', $kematian->id) }}">
                                    <button type="button" class="btn btn-success btn-lg"> <span
                                            class="fa fa-print"></span> Cetak Surat</button>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
