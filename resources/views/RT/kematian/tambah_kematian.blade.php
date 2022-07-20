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
    <li class="breadcrumb-item">Warga</li>
    <li class="breadcrumb-item">Kematian</li>
    <li class="breadcrumb-item active">Tambah Data Kematian</li>
  @endcomponent
  <!-- Form Tambah Warga -->
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-sm-12">
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
      <div class="col-sm-12">
        <div class="card">
          @if (session()->has('success'))
          <div class="alert alert-success dark alert-dismissible fade show"
            role="alert">
            <strong>Sukses ! </strong> {{ session('success') }}.
            <button class="btn-close"
              type="button"
              data-bs-dismiss="alert"
              aria-label="Close"
              data-bs-original-title=""
              title=""></button>
          </div>
           @endif
          <div class="card-header pb-0">
            <h5>Tambah </h5>
          </div>
          <form class="form theme-form"
            method="POST"
            action="{{ route('rt.kematian.store') }}">
            @csrf
            @method('POST')
            <div class="card-body">
              {{-- INFORMASI JENAZA --}}
              <h4 class="mb-2">Jenazah</h4>
              <hr />
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="nik">NIK</label>
                    <input class="form-control @error('nik') is-invalid @enderror"
                      type="text"
                      id="nik"
                      name="nik"
                      value="{{ old('nik') }}"
                      placeholder="NIK"
                      autofocus>
                    {{-- <div class="text-danger mr-3">Data warga tidak ditemukan</div> --}}
                    <input name="warga"
                      type="hidden"
                      value="{{ old('warga') }}"
                      id="warga">
                    @error('warga')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label class="form-label"
                      for="">&nbsp;</label>
                    <button onclick="getDataJenazah()"
                      type="button"
                      id="cek_jenaza"
                      class="btn btn-secondary form-control text-white"><span class="fa fa-search"></span> Cek
                      Data</button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="nama_lengkap">Nama</label>
                    <input class="form-control @error('nama_lengkap') is-invalid @enderror"
                      name="nama_lengkap"
                      type="text"
                      id="nama_lengkap"
                      name="nama_lengkap"
                      placeholder="Nama"
                      value="{{ old('nama_lengkap') }}"
                      readonly>
                    @error('nama_lengkap')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="jenis_kelamin">Jenis Kelamin</label>
                    <input class="form-control @error('jenis_kelamin') is-invalid @enderror"
                      name="jenis_kelamin"
                      type="text"
                      id="jenis_kelamin"
                      name="jenis_kelamin"
                      placeholder="Jenis Kelamin"
                      value="{{ old('jenis_kelamin') }}"
                      readonly>
                    @error('jenis_kelamin')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="agama">Agama</label>
                    <input class="form-control @error('agama') is-invalid @enderror"
                      name="agama"
                      type="text"
                      id="agama"
                      name="agama"
                      placeholder="Agama"
                      value="{{ old('agama') }}"
                      readonly>
                    @error('agama')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="agama">Pekerjaan</label>
                    <input class="form-control @error('pekerjaan') is-invalid @enderror"
                      name="pekerjaan"
                      type="text"
                      id="pekerjaan"
                      name="pekerjaan"
                      placeholder="Pekerjaan"
                      value="{{ old('pekerjaan') }}"
                      readonly>
                    @error('pekerjaan')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="mb-3">
                    <label class="form-label"
                      for="tgl_lahir">Tempat Tanggal Lahir</label>
                    <input class="form-control @error('tempat_lahir') is-invalid @enderror"
                      name="tempat_lahir"
                      type="text"
                      id="tempat_lahir"
                      name="tempat_lahir"
                      placeholder="Tanggal Lahir"
                      value="{{ old('tempat_lahir') }}"
                      readonly>
                    @error('tempat_lahir')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="tgl_lahir">&nbsp;</label>
                    <input class="form-control @error('tgl_lahir') is-invalid @enderror"
                      name="tgl_lahir"
                      type="text"
                      id="tgl_lahir"
                      name="tgl_lahir"
                      placeholder="Tanggal Lahir"
                      value="{{ old('tgl_lahir') }}"
                      readonly>
                    @error('tgl_lahir')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-5">
                    <label class="form-label"
                      for="alamat">Alamat</label>
                    <textarea name="alamat"
                      class="form-control @error('alamat') is-invalid @enderror"
                      id="alamat"
                      placeholder="Alamat"
                      readonly>{{ old('alamat') }}</textarea>
                    @error('alamat')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                    <label class="form-label"
                      for="tempat_kematian">Tempat Kematian</label>
                    <input class="form-control @error('tempat_kematian') is-invalid @enderror"
                      name="tempat_kematian"
                      type="text"
                      id="tempat_kematian"
                      name="tempat_kematian"
                      value="{{ old('tempat_kematian') }}"
                      placeholder="Tempat Kematian Contoh : Rumah, Rumah Sakit dan lain-lain">
                    @error('tempat_kematian')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="tgl_kematian">Tanggal Kematian</label>
                    <input class="form-control @error('tgl_kematian') is-invalid @enderror"
                      name="tgl_kematian"
                      type="date"
                      id="tgl_kematian"
                      name="tgl_kematian"
                      value="{{ old('tgl_kematian') }}"
                      placeholder="Nama">
                    @error('tgl_kematian')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-5">
                    <label class="form-label"
                      for="sebab_kematian">Sebab Kematian</label>
                    <input class="form-control @error('sebab_kematian') is-invalid @enderror"
                      name="sebab_kematian"
                      type="text"
                      id="sebab_kematian"
                      name="sebab_kematian"
                      value="{{ old('sebab_kematian') }}"
                      placeholder="Sebab Kematian Contoh: Kecelakaan, Sakit dan lain-lain">
                    @error('sebab_kematian')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                    <label class="form-label"
                      for="nik_pelapor">NIK Pelapor</label>
                    <input class="form-control @error('nik_pelapor') is-invalid @enderror"
                      name="nik_pelapor"
                      type="text"
                      id="nik_pelapor"
                      name="nik_pelapor"
                      value="{{ old('nik_pelapor') }}"
                      placeholder="NIK Pelapor">
                    @error('nik_pelapor')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label class="form-label"
                      for="">&nbsp;</label>
                    <button type="button" onclick="getDataPelapor()"
                      id="cek_pelapor"
                      class="btn btn-secondary form-control text-white"><span class="fa fa-search"></span> Cek
                      Data</button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="nama_pelapor">Nama Pelapor</label>
                    <input class="form-control @error('nama_pelapor') is-invalid @enderror"
                      name="nama_pelapor"
                      type="text"
                      id="nama_pelapor"
                      name="nama_pelapor"
                      placeholder="Pelapor"
                      value="{{ old('nama_pelapor') }}">
                    @error('nama_pelapor')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="hubungan_jenazah">Hubungan Pelapor Terhadap Jenazah</label>
                    <input class="form-control @error('hubungan_jenazah') is-invalid @enderror"
                      name="hubungan_jenazah"
                      type="text"
                      id="hubungan_jenazah"
                      name="hubungan_jenazah"
                      placeholder="Status Hubungan Dengan Jenazah Cth: Ibu, Ayah, Paman, dll"
                      value="{{ old('hubungan_jenazah') }}">
                    @error('hubungan_jenazah')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="mb-3">
                    <label class="form-label"
                      for="tempat_lahir_pelapor">Tempat Tanggal Lahir</label>
                    <input class="form-control @error('tempat_lahir_pelapor') is-invalid @enderror"
                      name="tempat_lahir_pelapor"
                      type="text"
                      id="tempat_lahir_pelapor"
                      name="tempat_lahir_pelapor"
                      placeholder="Tanggal Lahir"
                      value="{{ old('tempat_lahir_pelapor') }}">
                    @error('tempat_lahir_pelapor')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="tgl_lahir_pelapor">&nbsp;</label>
                    <input class="form-control @error('tgl_lahir_pelapor') is-invalid @enderror"
                      name="tgl_lahir_pelapor"
                      type="date"
                      id="tgl_lahir_pelapor"
                      name="tgl_lahir_pelapor"
                      placeholder="Tanggal Lahir"
                      value="{{ old('tgl_lahir_pelapor') }}">
                    @error('tgl_lahir_pelapor')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              {{-- END INFORMASI PELAPOR --}}
            </div>
            <div class="card-footer text-end">
              <button class="btn btn-primary"
                type="submit">Simpan</button>
              <input class="btn btn-light"
                type="reset"
                value="Batal" />
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
@endsection

@push('scripts')
@endpush

@push('scripts-custom')
  <script>
    function getDataJenazah() {
      // var id = $('#nik').val();
      let id = $("input[name=nik]").val();
      const root_url = "{{ URL::to('/') }}";
      const url = `${root_url}/RT/kematian/show_jenazah`;
      // alert(url);
      // ajax
      $.ajax({
        type: "GET",
        url: url,
        data: {
          id: id
        },
        dataType: 'json',
        success: function(res) {
          // console.log(res.data);
          if (res.data != null) {
            let databaru = res.data;
            console.log(databaru);
            let dataagama = [{
              nama: "Islam",
              value: 1
            }, {
              nama: "Kristen",
              value: 2
            }, {
              nama: "Hindu",
              value: 3
            }, {
              nama: "Budha",
              value: 4
            }, {
              nama: "Katolik",
              value: 5
            }, {
              nama: "Konghucu",
              value: 6
            }];
            let agama = dataagama.filter((agama) => (agama.value == databaru.agama));
            $('#warga').val(databaru.id_warga);
            $('#nama_lengkap').val(databaru.nama_lengkap.toUpperCase());
            $('#jenis_kelamin').val((databaru.jenis_kelamin == 1) ? "Laki-laki" : "Perempuan");
            $('#agama').val(agama[0].nama.toUpperCase());
            $('#pekerjaan').val(databaru.pekerjaans.nama_pekerjaan.toUpperCase());
            $('#tempat_lahir').val(databaru.tempat_lahir.toUpperCase());
            const event = new Date(databaru.tgl_lahir);
            const options = {
              weekday: 'long',
              year: 'numeric',
              month: 'long',
              day: 'numeric'
            };
            $('#tgl_lahir').val(event.toLocaleDateString('id-ID', options));
            $('#alamat').val(databaru.alamat.toUpperCase());
          } else {
            // let input_nik = $("#nik");
            // let parentGuest = document.getElementById("nik");
            // console.log(input_nik);
            // console.log("gagal");
          }
        }
      });
    }

    function getDataPelapor() {
      // var id = $('#nik').val();
      let id = $("input[name=nik_pelapor]").val();
      const root_url = "{{ URL::to('/') }}";
      const url = `${root_url}/RT/kematian/show_warga`;
      // alert(url);
      // ajax
      $.ajax({
        type: "GET",
        url: url,
        data: {
          id: id
        },
        dataType: 'json',
        success: function(res) {
          console.log(res.data);
          if (res.data != null) {
            let databaru = res.data;
            $('#nama_pelapor').val(databaru.nama_lengkap.toUpperCase());
            $('#tempat_lahir_pelapor').val(databaru.tempat_lahir.toUpperCase());
            $('#tgl_lahir_pelapor').val(databaru.tgl_lahir.split("T")[0]);
            $('#alamat').val(databaru.alamat.toUpperCase());
          } else {
            swal({
                title: `Data Warga Tidak Ditemukan`,
                text: `NIK ${id} tidak tedapat dalam sistem`,
                icon: "warning",
                timer: 1500
            })
          }
        }
      });
    }
  </script>
@endpush
