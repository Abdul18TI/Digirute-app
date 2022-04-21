@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Tambah Warga</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item">Form Controls</li>
                        <li class="breadcrumb-item active">Base Inputs</li>
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
        </div>
    </div><!-- Form Tambah Warga -->
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if ($errors->any())
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Terjadi kesalahan</strong>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Tambah Warga</h5>
                    </div>
                    <form class="form theme-form" method="post" action="{{ route('rt.warga.insert')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">RT/RW</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" id="rt" name="rt" readonly placeholder="RW" value="1">
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control " type="text" id="rw" name="rw" readonly placeholder="RT" value="2">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor Kartu Keluarga (KK) <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="no_kk" name="no_kk" value="{{ old('no_kk') }}"placeholder="Nomor Kartu Keluarga">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor Induk Kepenedudukan (NIK) <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nik" name="nik"  value="{{ old('nik') }}" placeholder="Nomor Induk Kependidikan">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Alamat <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="alamat" name="alamat" rows="5" cols="5" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Desa/Kabupaten/Provinsi <span class="text-danger">*</span></label>
                                        <div class="col-sm-5">
                                            <select class="form-select select2" id="provinsi" name="provinsi">
                                                <option value="1" selected>Pilih Provinsi</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-select select2" id="kabupaten" name="kabupaten">
                                                <option value="1" selected>Pilih Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-5">
                                            <select class="form-select select2" id="kecamatan" name="kecamatan">
                                                <option value="1" selected>Pilih Kecamatan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-select select2" id="kelurahan" name="kelurahan">
                                                <option value="1" selected>Pilih Kelurahan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kode Pos</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="kode_pos" name="kode_pos" value="{{ old('no_kk') }}" placeholder="0000">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tempat Tanggal Lahir <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input class="form-control " type="text" id="tempat_lahir" name="tempat_lahir"  value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="col-sm-5">
                                            <input class="form-control digits" name="tgl_lahir" value="" id="example-datetime-local-input" type="date" data-bs-original-title="" title="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="form-group mt-2 m-checkbox-inline mb-0 custom-radio-ml">
                                                <div class="radio radio-primary">
                                                    <input id="lk" type="radio" name="jenis_kelamin" value="1" {{ old('jenis_kelamin') == 1 ? "checked" : ""}}>
                                                    <label class="mb-0" for="lk">Laki-laki</label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input id="pr" type="radio" name="jenis_kelamin" value="2" {{ old('jenis_kelamin') == 2 ? "checked" : ""}}>
                                                    <label class="mb-0" for="pr">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Agama <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select name='agama' id='agama' class='form-select'>
                                                <option value='00'>-- Pilih --</option>
                                                <option value='1' {{ old('agama') == '1' ? "selected" : ""}}>ISLAM</option>
                                                <option value='2' {{ old('agama') == '2' ? "selected" : ""}}>KRISTEN</option>
                                                <option value='3' {{ old('agama') == '3' ? "selected" : ""}}>HINDU</option>
                                                <option value='4' {{ old('agama') == '4' ? "selected" : ""}}>BUDHA</option>
                                                <option value='5' {{ old('agama') == '5' ? "selected" : ""}}>KATOLIK</option>
                                                <option value='6' {{ old('agama') == '6' ? "selected" : ""}}>KONGHUCU</option></select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Pekerjaan <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select class='form-select' name='pekerjaan' id='pekerjaan' >
                                                <option value='00'>-- Pilih --</option>
                                                <option value='1' {{ old('pekerjaan') == '1' ? "selected" : ""}}>BELUM/TIDAK BEKERJA</option>
                                                <option value='2' {{ old('pekerjaan') == '2' ? "selected" : ""}}>MENGURUS RUMAH TANGGA</option>
                                                <option value='3' {{ old('pekerjaan') == '3' ? "selected" : ""}}>PELAJAR/MAHASISWA</option>
                                                <option value='4' {{ old('pekerjaan') == '4' ? "selected" : ""}}>PENSIUNAN</option>
                                                <option value='5' {{ old('pekerjaan') == '5' ? "selected" : ""}}>PEGAWAI NEGERI SIPIL</option>
                                                <option value='6' {{ old('pekerjaan') == '6' ? "selected" : ""}}>TENTARA NASIONAL INDONESIA</option>
                                                <option value='7' {{ old('pekerjaan') == '7' ? "selected" : ""}}>KEPOLISIAN RI</option>
                                                <option value='8' {{ old('pekerjaan') == '8' ? "selected" : ""}}>PERDAGANGAN</option>
                                                <option value='9' {{ old('pekerjaan') == '9' ? "selected" : ""}}>PETANI/PEKEBUN</option>
                                                <option value='10' {{ old('pekerjaan') == '10' ? "selected" : ""}}>PETERNAK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Golongan Darah</label>
                                        <div class="col-sm-9">
                                            <select name='golongan_darah' id='golongan_darah' class='form-select'  >
                                                <option value='00'>-- Pilih --</option>
                                                <option value='A' {{ old('golongan_darah') == 'A' ? "selected" : ""}}>A</option>
                                                <option value='B' {{ old('golongan_darah') == 'B' ? "selected" : ""}}>B</option>
                                                <option value='AB' {{ old('golongan_darah') == 'AB' ? "selected" : ""}}>AB</option>
                                                <option value='O' {{ old('golongan_darah') == 'O' ? "selected" : ""}}>O</option>
                                            </select>                                  
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Status Perkawinan <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select name='status_perkawinan' id='status_perkawinan' class='form-select'  >
                                                <option value='00'>-- Pilih --</option>
                                                <option value='belum_kawin' {{ old('status_perkawinan') == 'belum_kawin' ? "selected" : ""}}>BELUM KAWIN</option>
                                                <option value='kawin' {{ old('status_perkawinan') == 'kawin' ? "selected" : ""}}>KAWIN</option>
                                                <option value='cerai_hidup' {{ old('status_perkawinan') == 'cerai_hidup' ? "selected" : ""}}>CERAI HIDUP</option>
                                                <option value='cerai_mati' {{ old('status_perkawinan') == 'cerai_mati' ? "selected" : ""}}>CERAI MATI</option>
                                            </select>                                              
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">No. Passport</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nomor_passport" name="nomor_passport" value="{{ old('nomor_passport')}}" placeholder="Nomor Passport">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">No. KTIAS/KITAP</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nomor_kitaskitap" name="nomor_kitaskitap" value="{{ old('nomor_kitaskitap')}}" placeholder="Nomor Passport">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama Ayah <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah')}}" placeholder="Nama Ayah">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama Ibu <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu')}}" placeholder="Nama Ibu">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tanggal Terbit KK <span class="text-danger">*</span> </label>
                                        <div class="col-sm-9">
                                            <input class="form-control digits" name="tgl_keluar_kk" type="date"  value="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <input class="btn btn-light" type="reset" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Form Pengaduan End -->
            </div>
        </div>
    </div>
</div>
@endsection
