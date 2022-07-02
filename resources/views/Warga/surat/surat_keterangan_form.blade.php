@extends('layouts.main-warga')

@section('title')Pengajuan Surat
 {{ $title }}
@endsection

@push('css')
{{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}"> --}}
@endpush

@section('container')
    @component('components.warga.breadcrumb')
      @slot('breadcrumb_title')
          <h3>Surat Keterangan</h3>
      @endslot
      <li class="breadcrumb-item">Surat</li>
      <li class="breadcrumb-item active">Surat Keterangan</li>
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
                      <h5>Form Surat Keterangan</h5>
                    </div>
                    <form class="form theme-form"
                      method="POST"
                      action="">
                      @csrf
                      @method('POST')
                      <div class="card-body">
                        {{-- INFORMASI PENGAJU --}}
                        <h6 class="mb-2">Data Pengaju Surat</h4>
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
                              <button onclick="getDataPengaju()"
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
                                for="alamat">No Kartu Keluarga</label>
                                <input class="form-control @error('no_kk') is-invalid @enderror"
                                name="no_kk"
                                type="text"
                                id="no_kk"
                                name="no_kk"
                                placeholder="No Kartu Keluarga"
                                value="{{ old('no_kk') }}"
                                readonly>
                              @error('no_kk')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
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
                        {{-- END INFORMASI PENGAJU --}}
                        {{-- Jenis Surat Keterangan --}}
                        <h6 class="mb-2">Jenis Surat Keterangan</h4>
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
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label"
                                  for="alamat">No Kartu Keluarga</label>
                                  <input class="form-control @error('no_kk') is-invalid @enderror"
                                  name="no_kk"
                                  type="text"
                                  id="no_kk"
                                  name="no_kk"
                                  placeholder="No Kartu Keluarga"
                                  value="{{ old('no_kk') }}"
                                  readonly>
                                @error('no_kk')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label"
                                  for="nama_lengkap">Nama</label>
                                  <div class="form-group m-t-15 mb-0">
                                    <div class="checkbox checkbox-solid-success">
                                    <input id="solid1" type="checkbox">
                                    <label for="solid1">Kartu Tanda Penduduk(KTP)</label>
                                    </div>
                                    <div class="checkbox checkbox-solid-dark">
                                    <input id="solid2" type="checkbox" disabled="">
                                    <label for="solid2">Kartu Keluarga(KK)</label>
                                    </div>
                                    <div class="checkbox checkbox-solid-primary">
                                    <input id="solid3" type="checkbox" checked="">
                                    <label for="solid3">Surat Keterangan Berkelakuan Baik(SKBB)</label>
                                    </div>
                                    <div class="checkbox checkbox-solid-danger">
                                    <input id="solid4" type="checkbox" checked="">
                                    <label for="solid4">checked</label>
                                    </div>
                                    <div class="checkbox checkbox-solid-light">
                                    <input id="solid5" type="checkbox" checked="">
                                    <label for="solid5">checked</label>
                                    </div>
                                    <div class="checkbox checkbox-solid-info">
                                    <input id="solid6" type="checkbox" checked="">
                                    <label for="solid6">checked</label>
                                    </div>
                                    <div class="checkbox checkbox-solid-dark">
                                    <input id="solid7" type="checkbox" checked="">
                                    <label class="mb-0" for="solid7">checked</label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          {{-- END Jenis Surat Keterangan --}}
                      <div class="card-footer text-end">
                        <button class="btn btn-primary"
                          type="submit">Ajukan</button>
                        <input class="btn btn-light"
                          type="reset"
                          value="Batal" />
                      </div>
                    </form>
                  </div>
                <!-- Form Pengaduan End -->
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts-custom')
  <script>
    function getDataPengaju() {
      // var id = $('#nik').val();
      let id = $("input[name=nik]").val();
      const root_url = "{{ URL::to('/') }}";
      const url = `${root_url}/Warga/surat/show_pengaju`;
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
            $('#no_kk').val(databaru.no_kk);
            $('#nama_lengkap').val(databaru.nama_lengkap.toUpperCase());
            $('#jenis_kelamin').val((databaru.jenis_kelamin == 1) ? "LAKI-LAKI" : "PEREMPUAN");
            $('#agama').val(agama[0].nama.toUpperCase());
            $('#pekerjaan').val(databaru.pekerjaan.nama_pekerjaan.toUpperCase());
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

  </script>
@endpush