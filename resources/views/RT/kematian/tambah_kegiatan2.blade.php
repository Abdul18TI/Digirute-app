@extends('layouts.main-rt')

@section('title')
  Tambah Data Kematian
  {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
  @component('components.warga.breadcrumb')
    @slot('breadcrumb_title')
      <h3>
        Tambah Data Kematian</h3>
    @endslot
    <li class="breadcrumb-item">Kematian</li>
    <li class="breadcrumb-item active">Tambah Data Kematian</li>
  @endcomponent
  <!-- Form Tambah Warga -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          {{-- <div class="card-header pb-0">
            <h5>Tambah </h5>
          </div> --}}
          <form class="form theme-form">
            <div class="card-body">
              {{-- INFORMASI JENAZA --}}
              <h4 class="mb-2">Jenazah</h4>
              <hr/>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="nik">NIK</label>
                     <input class="form-control @error('nik') is-invalid @enderror" name="nik" type="text"
                      id="nik" name="nik" placeholder="NIK">
                    @error('nik')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label class="form-label" for="">&nbsp;</label>
                    <button type="button" id="cek_jenaza" class="btn btn-secondary form-control text-white"><span class="fa fa-search"></span> Cek
                      Data</button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="nama_lengkap">Nama</label>
                    <input class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap"
                      type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama" readonly>
                    @error('nama_lengkap')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <input class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                      type="text" id="jenis_kelamin" name="jenis_kelamin" placeholder="jenis_kelamin" readonly>
                    @error('jenis_kelamin')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="agama">Agama</label>
                    <input class="form-control @error('agama') is-invalid @enderror" name="agama" type="text"
                      id="agama" name="agama" placeholder="agama" readonly>
                    @error('agama')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="agama">Pekerjaan</label>
                    <input class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" type="text"
                      id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" readonly>
                    @error('pekerjaan')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="mb-3">
                    <label class="form-label" for="tgl_lahir">Tempat Tanggal Lahir</label>
                    <input class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                      type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tanggal Lahir" readonly>
                    @error('tempat_lahir')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="tgl_lahir">&nbsp;</label>
                    <input class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" type="text"
                      id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" readonly>
                    @error('tgl_lahir')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-5">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" readonly></textarea>
                    @error('agama')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              {{-- END INFORMASI JENAZA --}}
              {{-- INFORMASI KEMATIAN --}}
              <h4 class="mb-2">Informasi Kematian</h4>
              <hr/>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="tempat_kematian">Tempat Kematian</label>
                    <input class="form-control @error('tempat_kematian') is-invalid @enderror" name="tempat_kematian"
                      type="text" id="tempat_kematian" name="tempat_kematian" placeholder="Tempat Kematian Contoh : Rumah, Rumah Sakit dan lain-lain">
                    @error('tempat_kematian')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="tanggal_kematian">Tanggal Kematian</label>
                    <input class="form-control @error('tanggal_kematian') is-invalid @enderror" name="tanggal_kematian"
                      type="date" id="tanggal_kematian" name="tanggal_kematian" placeholder="Nama" >
                    @error('tanggal_kematian')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-5">
                    <label class="form-label" for="sebab_kematian">Sebab Kematian</label>
                    <input class="form-control @error('sebab_kematian') is-invalid @enderror" name="sebab_kematian"
                      type="text" id="sebab_kematian" name="sebab_kematian" placeholder="Sebab Kematian Contoh: Kecelakaan, Sakit dan lain-lain">
                    @error('sebab_kematian')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              {{-- END INFORMASI KEMATIAN --}}
               {{-- INFORMASI PELAPOR --}}
              <h4 class="mb-2">Informasi Pelapor</h4>
              <hr/>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="nik_pelapor">NIK Pelapor</label>
                     <input class="form-control @error('nik_pelapor') is-invalid @enderror" name="nik_pelapor" type="text"
                      id="nik_pelapor" name="nik_pelapor" placeholder="NIK Pelapor">
                    @error('nik_pelapor')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label class="form-label" for="">&nbsp;</label>
                    <button type="button" id="cek_pelapor" class="btn btn-secondary form-control text-white"><span class="fa fa-search"></span> Cek
                      Data</button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="nama_pelapor">Nama Pelapor</label>
                    <input class="form-control @error('nama_pelapor') is-invalid @enderror" name="nama_pelapor"
                      type="text" id="nama_pelapor" name="nama_pelapor" placeholder="Pelapor" readonly>
                    @error('nama_pelapor')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="mb-3">
                    <label class="form-label" for="tempat_lahir_pelapor">Tempat Tanggal Lahir</label>
                    <input class="form-control @error('tempat_lahir_pelapor') is-invalid @enderror" name="tempat_lahir_pelapor"
                      type="text" id="tempat_lahir_pelapor" name="tempat_lahir_pelapor" placeholder="Tanggal Lahir" readonly>
                    @error('tempat_lahir_pelapor')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label" for="tgl_lahir_pealpor">&nbsp;</label>
                    <input class="form-control @error('tgl_lahir_pealpor') is-invalid @enderror" name="tgl_lahir_pealpor" type="text"
                      id="tgl_lahir_pealpor" name="tgl_lahir_pealpor" placeholder="Tanggal Lahir" readonly>
                    @error('tgl_lahir_pealpor')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              {{-- END INFORMASI PELAPOR --}}
            </div>
            <div class="card-footer text-end">
              <button class="btn btn-primary" type="submit">Simpan</button>
              <input class="btn btn-light" type="reset" value="Batal" />
            </div>
          </form>
        </div>
        <div class="card">
          <div class="card-body">
            <form class="needs-validation" novalidate="">
              {{-- <h6 class="mb-4">Informasi kematian</h6>
              <div class="row g-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Desa / Kelurahan</label>
                  <input class="form-control" id="validationCustom01" type="text" placeholder="Desa / Kelurahan"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" placeholder="Kecamatan"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabutan / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" placeholder="Kabutan / Kota"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama Kepala Keluarga</label>
                  <input class="form-control" id="validationCustom02" type="text" placeholder="Nama Kepala Keluarga"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nomor Kartu Keluarga</label>
                  <input class="form-control" id="validationCustom02" type="text" placeholder="Nomor Kartu Keluarga"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <hr> --}}
              <h6 class="mb-4">Jenazah</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">NIK</label>
                  <input class="form-control" id="validationCustom01" placeholder="NIK" type="text" value=""
                    required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Nama</label>
                  <input class="form-control" id="validationCustom01" placeholder="Nama" type="text"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Jenis Kelamin</label>
                  <div class="col">
                    <div class="form-group m-checkbox-inline mb-0">
                      <div class="checkbox checkbox-dark">
                        <input id="inline-1" type="checkbox">
                        <label for="inline-1">Laki-laki</label>
                      </div>
                      <div class="checkbox checkbox-dark">
                        <input id="inline-2" type="checkbox">
                        <label for="inline-2">Perempuan</span></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal Lahir</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Tempat Lahir</label>
                  <input class="form-control" id="validationCustom01" placeholder="Tempat Lahir" type="text"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Agama</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Anak ke</label>
                  <input class="form-control" id="validationCustom01" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal Kematian</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Pukul</label>
                  <input class="form-control digits" type="time" value="" />
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Sebab Kematian</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tempat Kematian</label>
                  <input class="form-control" id="validationCustom02" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Yang menerangkan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
              </div>
              <hr>
              <h6 class="mb-4">Ayah</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">NIK</label>
                  <input class="form-control" id="validationCustom01"placeholder="NIK" type="text" value=""
                    required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal lahir</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <hr>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kewarganegaraan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kebangsaan</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal Pencatatan Perkawinan</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
              </div>
              <hr>
              <h6 class="mb-4">Ibu</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">NIK</label>
                  <input class="form-control" id="validationCustom01"placeholder="NIK" type="text" value=""
                    required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal lahir</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <hr>
              <h6 class="mb-4">Pelapor</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">NIK</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-2">
                  <label class="form-label" for="validationCustom02">Umur</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Jenis Kelamin</label>
                  <div class="col">
                    <div class="form-group m-checkbox-inline mb-0">
                      <div class="checkbox checkbox-dark">
                        <input id="inline-1" type="checkbox">
                        <label for="inline-1">Laki-laki</label>
                      </div>
                      <div class="checkbox checkbox-dark">
                        <input id="inline-2" type="checkbox">
                        <label for="inline-2">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="mb-5">
              </div>
              <hr>
              <h6 class="mb-4">Saksi 1</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">NIK</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-2">
                  <label class="form-label" for="validationCustom02">Umur</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Alamat</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Pekerjaan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="mb-5">
              </div>
              <hr>
              <h6 class="mb-4">Saksi 2</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">NIK</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-2">
                  <label class="form-label" for="validationCustom02">Umur</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Alamat</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Pekerjaan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Last name</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Last name</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="mb-5">
              </div>
              <hr>
              <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
          </div>
        </div>
      </div>
      <div class="card">
          <div class="card-body">
            <form class="needs-validation" novalidate="">
              {{-- <h6 class="mb-4">Informasi kematian</h6>
              <div class="row g-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Desa / Kelurahan</label>
                  <input class="form-control" id="validationCustom01" type="text" placeholder="Desa / Kelurahan"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" placeholder="Kecamatan"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabutan / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" placeholder="Kabutan / Kota"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama Kepala Keluarga</label>
                  <input class="form-control" id="validationCustom02" type="text" placeholder="Nama Kepala Keluarga"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nomor Kartu Keluarga</label>
                  <input class="form-control" id="validationCustom02" type="text" placeholder="Nomor Kartu Keluarga"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <hr> --}}
              <h6 class="mb-4">Jenazah</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">NIK</label>
                  <input class="form-control" id="validationCustom01" placeholder="NIK" type="text" value=""
                    required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Nama</label>
                  <input class="form-control" id="validationCustom01" placeholder="Nama" type="text"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Jenis Kelamin</label>
                  <div class="col">
                    <div class="form-group m-checkbox-inline mb-0">
                      <div class="checkbox checkbox-dark">
                        <input id="inline-1" type="checkbox">
                        <label for="inline-1">Laki-laki</label>
                      </div>
                      <div class="checkbox checkbox-dark">
                        <input id="inline-2" type="checkbox">
                        <label for="inline-2">Perempuan</span></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal Lahir</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Tempat Lahir</label>
                  <input class="form-control" id="validationCustom01" placeholder="Tempat Lahir" type="text"
                    value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Agama</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">Anak ke</label>
                  <input class="form-control" id="validationCustom01" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal Kematian</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Pukul</label>
                  <input class="form-control digits" type="time" value="" />
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Sebab Kematian</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tempat Kematian</label>
                  <input class="form-control" id="validationCustom02" type="text" value="" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Yang menerangkan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
              </div>
              <hr>
              <h6 class="mb-4">Ayah</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">NIK</label>
                  <input class="form-control" id="validationCustom01"placeholder="NIK" type="text" value=""
                    required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal lahir</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <hr>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kewarganegaraan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kebangsaan</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal Pencatatan Perkawinan</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
              </div>
              <hr>
              <h6 class="mb-4">Ibu</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom01">NIK</label>
                  <input class="form-control" id="validationCustom01"placeholder="NIK" type="text" value=""
                    required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Tanggal lahir</label>
                  <input class="form-control digits" type="date" value="2018-01-01" />
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <hr>
              <h6 class="mb-4">Pelapor</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">NIK</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-2">
                  <label class="form-label" for="validationCustom02">Umur</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Jenis Kelamin</label>
                  <div class="col">
                    <div class="form-group m-checkbox-inline mb-0">
                      <div class="checkbox checkbox-dark">
                        <input id="inline-1" type="checkbox">
                        <label for="inline-1">Laki-laki</label>
                      </div>
                      <div class="checkbox checkbox-dark">
                        <input id="inline-2" type="checkbox">
                        <label for="inline-2">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Pekerjaan</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Alamat</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="mb-5">
              </div>
              <hr>
              <h6 class="mb-4">Saksi 1</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">NIK</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-2">
                  <label class="form-label" for="validationCustom02">Umur</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Alamat</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Pekerjaan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kecamatan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="mb-5">
              </div>
              <hr>
              <h6 class="mb-4">Saksi 2</h6>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">NIK</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Nama</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-2">
                  <label class="form-label" for="validationCustom02">Umur</label>
                  <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationDefault04">Alamat</label>
                  <select class="form-select" id="validationDefault04" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Pekerjaan</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Provinsi</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="row g-3 mt-3">
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Last name</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom02">Last name</label>
                  <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                  <div class="valid-feedback">Looks good!</div>
                </div>
              </div>
              <div class="mb-5">
              </div>
              <hr>
              <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
          </div>
        </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
  <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
  <script type="text/javascript" src={{ asset('assets/js/trix.js') }}></script>
@endpush

@push('scripts-custom')
  <script>
    Trix.config.blockAttributes.default.tagName = "p";
    $('#tabelkegiatan-rt').DataTable();

    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })
  </script>
@endpush
