@extends('layouts.main')

@section('container')
<div class="page-body">
  <!-- Form Tambah Warga -->
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
                        <h5>Ubah Profil</h5>
                    </div>
                    <form class="form theme-form" method="post" action="/RW/profile/{{ $warga->identitas_rw->id_warga }}">
                        @method('PUT')  
                        @csrf
                        <input type="hidden" name="id" value="{{ $warga->identitas_rw->id_warga }}">
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
                                        <label class="col-sm-3 col-form-label">username <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="username" name="username" value="{{ old('username',$warga->identitas_rw->username) }}"placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="password" id="password" name="password" value="{{ old('password',$warga->identitas_rw->password) }}"placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor Kartu Keluarga (KK) <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" id="no_kk" name="no_kk" value="{{ old('no_kk',$warga->identitas_rw->no_kk) }}"placeholder="Nomor Kartu Keluarga">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama Kepala Keluarga <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="nama_kepala_keluarga" name="nama_kepala_keluarga" value="{{ old('nama_kepala_keluarga',$warga->identitas_rw->nama_kepala_keluarga) }}"placeholder="Nama kepala keluarga">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor KK Kepala Keluarga <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="nokk_kepala_keluarga" name="nokk_kepala_keluarga" value="{{ old('nokk_kepala_keluarga',$warga->identitas_rw->nokk_kepala_keluarga) }}"placeholder="Nomor KK Kepala Keluarga">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Status Hubungan Dalam Keluarga <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select name='status_hubungan_dalam_keluarga' id='status_hubungan_dalam_keluarga' class='form-select'>
                                                <option value='00'>-- Pilih --</option>
                                                <option value='1' {{ old('status_hubungan_dalam_keluarga',$warga->identitas_rw->status_hubungan_dalam_keluarga) == '1' ? "selected" : ""}}>ISLAM</option>
                                                <option value='2' {{ old('status_hubungan_dalam_keluarga',$warga->identitas_rw->status_hubungan_dalam_keluarga) == '2' ? "selected" : ""}}>KRISTEN</option>
                                                <option value='3' {{ old('status_hubungan_dalam_keluarga',$warga->identitas_rw->status_hubungan_dalam_keluarga) == '3' ? "selected" : ""}}>HINDU</option>
                                                <option value='4' {{ old('status_hubungan_dalam_keluarga',$warga->identitas_rw->status_hubungan_dalam_keluarga) == '4' ? "selected" : ""}}>BUDHA</option>
                                                <option value='5' {{ old('status_hubungan_dalam_keluarga',$warga->identitas_rw->status_hubungan_dalam_keluarga) == '5' ? "selected" : ""}}>KATOLIK</option>
                                                <option value='6' {{ old('status_hubungan_dalam_keluarga',$warga->identitas_rw->status_hubungan_dalam_keluarga) == '6' ? "selected" : ""}}>KONGHUCU</option></select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor Induk Kepenedudukan (NIK) <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="nik" name="nik"  value="{{ old('nik',$warga->identitas_rw->nik) }}" placeholder="Nomor Induk Kependidikan">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Alamat <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="alamat" name="alamat" rows="5" cols="5" placeholder="Alamat">{{ old('alamat',$warga->identitas_rw->alamat) }}</textarea>
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
                                        <label class="col-sm-3 col-form-label">Nama Dusun</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nama_dusun" name="nama_dusun" value="{{ old('nama_dusun',$warga->identitas_rw->nama_dusun) }}" placeholder="minas">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kode Pos</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="kode_pos" name="kode_pos" value="{{ old('kode_pos',$warga->identitas_rw->kode_pos) }}" placeholder="0000">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap',$warga->identitas_rw->nama_lengkap) }}" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tempat Tanggal Lahir <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input class="form-control " type="text" id="tempat_lahir" name="tempat_lahir"  value="{{ old('tempat_lahir',$warga->identitas_rw->tempat_lahir) }}" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="col-sm-5">
                                            <input class="form-control digits" name="tgl_lahir" value="" id="example-datetime-local-input" type="date" data-bs-original-title="" title="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor Akta Kelahiran</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="akta_kelahiran" name="akta_kelahiran" value="{{ old('akta_kelahiran',$warga->identitas_rw->akta_kelahiran) }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="form-group mt-2 m-checkbox-inline mb-0 custom-radio-ml">
                                                <div class="radio radio-primary">
                                                    <input id="lk" type="radio" name="jenis_kelamin" value="1" {{ old('jenis_kelamin',$warga->identitas_rw->jenis_kelamin) == 1 ? "checked" : ""}}>
                                                    <label class="mb-0" for="lk">Laki-laki</label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input id="pr" type="radio" name="jenis_kelamin" value="2" {{ old('jenis_kelamin',$warga->identitas_rw->jenis_kelamin) == 2 ? "checked" : ""}}>
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
                                                <option value='1' {{ old('agama',$warga->identitas_rw->agama) == '1' ? "selected" : ""}}>ISLAM</option>
                                                <option value='2' {{ old('agama',$warga->identitas_rw->agama) == '2' ? "selected" : ""}}>KRISTEN</option>
                                                <option value='3' {{ old('agama',$warga->identitas_rw->agama) == '3' ? "selected" : ""}}>HINDU</option>
                                                <option value='4' {{ old('agama',$warga->identitas_rw->agama) == '4' ? "selected" : ""}}>BUDHA</option>
                                                <option value='5' {{ old('agama',$warga->identitas_rw->agama) == '5' ? "selected" : ""}}>KATOLIK</option>
                                                <option value='6' {{ old('agama',$warga->identitas_rw->agama) == '6' ? "selected" : ""}}>KONGHUCU</option></select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Pekerjaan <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select class='form-select' name='pekerjaan' id='pekerjaan' >
                                                <option value='00'>-- Pilih --</option>
                                                @foreach ($pekerjaan as $p)
                                                <option value='{{ $p->id_pekerjaan }}' {{ old('pekerjaan',$warga->identitas_rw->pekerjaan) ==  $p->id_pekerjaan ? "selected" : "" }}>{{ $p->nama_pekerjaan }}</option>
                                                @endforeach
                                                {{-- <option value='1' {{ old('pekerjaan') == '1' ? "selected" : ""}}>BELUM/TIDAK BEKERJA</option>
                                                <option value='3' {{ old('pekerjaan') == '3' ? "selected" : ""}}>PELAJAR/MAHASISWA</option>
                                                <option value='4' {{ old('pekerjaan') == '4' ? "selected" : ""}}>PENSIUNAN</option>
                                                <option value='5' {{ old('pekerjaan') == '5' ? "selected" : ""}}>PEGAWAI NEGERI SIPIL</option>
                                                <option value='6' {{ old('pekerjaan') == '6' ? "selected" : ""}}>TENTARA NASIONAL INDONESIA</option>
                                                <option value='7' {{ old('pekerjaan') == '7' ? "selected" : ""}}>KEPOLISIAN RI</option>
                                                <option value='8' {{ old('pekerjaan') == '8' ? "selected" : ""}}>PERDAGANGAN</option>
                                                <option value='9' {{ old('pekerjaan') == '9' ? "selected" : ""}}>PETANI/PEKEBUN</option>
                                                <option value='10' {{ old('pekerjaan') == '10' ? "selected" : ""}}>PETERNAK</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Golongan Darah</label>
                                        <div class="col-sm-9">
                                            <select name='golongan_darah' id='golongan_darah' class='form-select'  >
                                                <option value='00'>-- Pilih --</option>
                                                <option value='1' {{ old('golongan_darah',$warga->identitas_rw->golongan_darah) == '1' ? "selected" : ""}}>A</option>
                                                <option value='2' {{ old('golongan_darah',$warga->identitas_rw->golongan_darah) == '2' ? "selected" : ""}}>B</option>
                                                <option value='3' {{ old('golongan_darah',$warga->identitas_rw->golongan_darah) == '3' ? "selected" : ""}}>AB</option>
                                                <option value='4' {{ old('golongan_darah',$warga->identitas_rw->golongan_darah) == '4' ? "selected" : ""}}>O</option>
                                            </select>                                  
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Status Perkawinan <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select name='status_perkawinan' id='status_perkawinan' class='form-select'  >
                                                <option value='00'>-- Pilih --</option>
                                                <option value='1' {{ old('status_perkawinan',$warga->identitas_rw->status_perkawinan) == '1' ? "selected" : ""}}>BELUM KAWIN</option>
                                                <option value='2' {{ old('status_perkawinan',$warga->identitas_rw->status_perkawinan) == '2' ? "selected" : ""}}>KAWIN</option>
                                                <option value='3' {{ old('status_perkawinan',$warga->identitas_rw->status_perkawinan) == '3' ? "selected" : ""}}>CERAI HIDUP</option>
                                                <option value='4' {{ old('status_perkawinan',$warga->identitas_rw->status_perkawinan) == '4' ? "selected" : ""}}>CERAI MATI</option>
                                            </select>                                              
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tanggal Perkawinan <span class="text-danger">*</span> </label>
                                        <div class="col-sm-9">
                                            <input class="form-control digits" name="tgl_perkawinan" type="date"  value="">
                                            <p class="text-danger">Kosongkan jika tidak ada</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor Akta Kawin</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="akta_kawin" name="akta_kawin" value="{{ old('akta_kawin',$warga->identitas_rw->akta_kawin) }}" placeholder="">
                                            <p class="text-danger">Kosongkan jika tidak ada</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tanggal Perceraian <span class="text-danger">*</span> </label>
                                        <div class="col-sm-9">
                                            <input class="form-control digits" name="tgl_cerai" type="date"  value="">
                                            <p class="text-danger">Kosongkan jika tidak ada</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor Akta Cerai</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="akta_cerai" name="akta_cerai" value="{{ old('akta_cerai',$warga->identitas_rw->akta_cerai) }}" placeholder="">
                                            <p class="text-danger">Kosongkan jika tidak ada</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Status Hubungan <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select name='status_hubungan' id='status_hubungan' class='form-select'  >
                                                <option value='00'>-- Pilih --</option>
                                                <option value='1' {{ old('status_hubungan',$warga->identitas_rw->status_hubungan) == '1' ? "selected" : ""}}>BELUM KAWIN</option>
                                                <option value='2' {{ old('status_hubungan',$warga->identitas_rw->status_hubungan) == '2' ? "selected" : ""}}>KAWIN</option>
                                                <option value='3' {{ old('status_hubungan',$warga->identitas_rw->status_hubungan) == '3' ? "selected" : ""}}>CERAI HIDUP</option>
                                                <option value='4' {{ old('status_hubungan',$warga->identitas_rw->status_hubungan) == '4' ? "selected" : ""}}>CERAI MATI</option>
                                            </select>                                              
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Pendidikan <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select name='pendidikan' id='pendidikan' class='form-select'  >
                                                <option value='00'>-- Pilih --</option>
                                                <option value='1' {{ old('pendidikan',$warga->identitas_rw->pendidikan) == '1' ? "selected" : ""}}>BELUM KAWIN</option>
                                                <option value='2' {{ old('pendidikan',$warga->identitas_rw->pendidikan) == '2' ? "selected" : ""}}>KAWIN</option>
                                                <option value='3' {{ old('pendidikan',$warga->identitas_rw->pendidikan) == '3' ? "selected" : ""}}>CERAI HIDUP</option>
                                                <option value='4' {{ old('pendidikan',$warga->identitas_rw->pendidikan) == '4' ? "selected" : ""}}>CERAI MATI</option>
                                            </select>                                              
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">No. Passport</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="nomor_passport" name="nomor_passport" value="{{ old('nomor_passport',$warga->identitas_rw->nomor_passport)}}" placeholder="Nomor Passport">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tanggal Passport berakhir <span class="text-danger">*</span> </label>
                                        <div class="col-sm-9">
                                            <input class="form-control digits" name="tgl_akhir_passport" type="date"  value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">No. KTIAS/KITAP</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="nomor_kitaskitap" name="nomor_kitaskitap" value="{{ old('nomor_kitaskitap',$warga->identitas_rw->nomor_kitaskitap)}}" placeholder="Nomor Passport">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nik Ayah <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="nik_ayah" name="nik_ayah" value="{{ old('nik_ayah',$warga->identitas_rw->nik_ayah)}}" placeholder="Nik Ayah">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama Ayah <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah',$warga->identitas_rw->nama_ayah)}}" placeholder="Nama Ayah">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nik Ibu <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="nik_ibu" name="nik_ibu" value="{{ old('nik_ibu',$warga->identitas_rw->nik_ibu)}}" placeholder="Nik Ibu">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama Ibu <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu',$warga->identitas_rw->nama_ibu)}}" placeholder="Nama Ibu">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tanggal Terbit KK <span class="text-danger">*</span> </label>
                                        <div class="col-sm-9">
                                            <input class="form-control digits" name="tgl_keluar_kk" type="date"  value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="form-label">Foto warga</label>
                                        <input type="hidden" name="oldImage" value="{{ $warga->identitas_rw->foto_warga }}">
                                        @if($warga->identitas_rw->foto_warga)
                                        <img src="{{ asset('storage/'. $warga->identitas_rw->foto_warga) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                        @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                        <div class="col-sm-9">
                                            <input class="form-control" name="foto_warga" onchange="previewImage()" id="image" type="file" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Penyandang Cacat</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="text" id="kelainan" name="kelainan" value="{{ old('kelainan',$warga->identitas_rw->kelainan) }}" placeholder="">
                                            <p class="text-danger">Kosongkan jika tidak ada</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Email Warga</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="email" id="email_warga" name="email_warga" value="{{ old('email_warga',$warga->identitas_rw->email_warga) }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nomor HP Warga</label>
                                        <div class="col-sm-9">
                                            <input class="form-control " type="number" id="no_hp_warga" name="no_hp_warga" value="{{ old('no_hp_warga',$warga->identitas_rw->no_hp_warga) }}" placeholder="">
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
<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
