@extends('layouts.main-warga')

@section('title')
    Pengajuan Surat
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

                  @if (session()->has('success'))
                      <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                          <strong>Sukses ! </strong> {{ session('success') }}.
                          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                              data-bs-original-title="" title=""></button>
                      </div>
                  @endif
                  @if (session()->has('error'))
                      <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                          <strong>Gagal ! </strong> {{ session('error') }}.
                          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                              data-bs-original-title="" title=""></button>
                      </div>
                  @endif
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form Surat Keterangan</h5>
                    </div>
                    <form class="form theme-form" method="POST"
                        action="{{ route('warga.surat.store.surat_keterangan') }}">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            {{-- INFORMASI PENGAJU --}}
                            <div id="informasi_pengaju">
                                <h6 class="mb-2">Data Pengaju Surat</h4>
                                    <hr />
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                            <label class="form-label" for="nik">NIK</label>
                                            <input class="form-control @error('nik') is-invalid @enderror" type="text"
                                                id="nik" name="nik" value="{{ old('nik', $warga->nik) }}" placeholder="NIK" readonly
                                                >  
                                            {{-- <div class="text-danger mr-3">Data warga tidak ditemukan</div> --}}
                                            <input name="pengaju" type="hidden" value="{{ old('pengaju', $warga->id_warga) }}"
                                                id="pengaju">
                                            @error('pengaju')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="alamat">No Kartu Keluarga</label>
                                            <input class="form-control @error('no_kk') is-invalid @enderror" name="no_kk"
                                                type="text" id="no_kk" name="no_kk" placeholder="No Kartu Keluarga"
                                                value="{{ old('no_kk',$warga->no_kk) }}" readonly>
                                            @error('no_kk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama_lengkap">Nama</label>
                                            <input class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                name="nama_lengkap" type="text" id="nama_lengkap" name="nama_lengkap"
                                                placeholder="Nama" value="{{ old('nama_lengkap',$warga->nama_lengkap) }}" readonly>
                                            @error('nama_lengkap')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            @php
                                                $jenis_kelamin = $warga->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';
                                            @endphp
                                            <input class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" type="text" id="jenis_kelamin" name="jenis_kelamin"
                                                placeholder="Jenis Kelamin" value="{{ old('jenis_kelamin', $jenis_kelamin) }}" readonly>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="agama">Agama</label>
                                            <input class="form-control @error('agama') is-invalid @enderror" name="agama"
                                                type="text" id="agama" name="agama" placeholder="Agama"
                                                value="{{ old('agama', $warga->agamas->agama) }}" readonly>
                                            @error('agama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="agama">Pekerjaan</label>
                                            <input class="form-control @error('pekerjaan') is-invalid @enderror"
                                                name="pekerjaan" type="text" id="pekerjaan" name="pekerjaan"
                                                placeholder="Pekerjaan" value="{{ old('pekerjaan',$warga->pekerjaans->nama_pekerjaan) }}" readonly>
                                            @error('pekerjaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="tgl_lahir">Tempat Tanggal Lahir</label>
                                                <input class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    name="tempat_lahir" type="text" id="tempat_lahir"
                                                    name="tempat_lahir" placeholder="Tanggal Lahir"
                                                    value="{{ old('tempat_lahir', $warga->tempat_lahir) }}" readonly>
                                                @error('tempat_lahir')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label" for="tgl_lahir">&nbsp;</label>
                                                <input class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                    name="tgl_lahir" type="text" id="tgl_lahir" name="tgl_lahir"
                                                    placeholder="Tanggal Lahir" value="{{ old('tgl_lahir', tanggal_indo($warga->tgl_lahir)) }}"
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
                                                <label class="form-label" for="alamat">Alamat</label>
                                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                                    placeholder="Alamat" readonly>{{ old('alamat', $warga->alamat) }}</textarea>
                                                @error('alamat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            {{-- END INFORMASI PENGAJU --}}
                            {{-- Jenis Surat Keterangan --}}
                            <div id="jenis_surat_keterangan">
                                <h6 class="mb-2">Jenis Surat Keterangan</h6>
                                <hr />
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <div class="form-group mb-0">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="checkbox checkbox-solid-success">
                                                            <input id="s_ktp" type="checkbox" name="jenis_surat[]"
                                                                value="s_ktp">
                                                            <label for="s_ktp">Kartu Tanda Penduduk(KTP)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="checkbox checkbox-solid-success">
                                                            <input id="s_kk" type="checkbox" name="jenis_surat[]"
                                                                value="s_kk">
                                                            <label for="s_kk">Kartu Keluarga (KK)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="checkbox checkbox-solid-success">
                                                            <input id="s_skbb" type="checkbox" name="jenis_surat[]"
                                                                value="s_skbb">
                                                            <label for="s_skbb">Surat Keterangan Berkelakuan Baik <p>
                                                                    (SKBB)
                                                                </p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_keteranganusaha" type="checkbox" name="jenis_surat[]"
                                                        value="s_keteranganusaha">
                                                    <label for="s_keteranganusaha">Surat Keterangan Usaha</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_keterangandomisiliusaha" type="checkbox" name="jenis_surat[]"
                                                        value="s_keterangandomisiliusaha">
                                                    <label for="s_keterangandomisiliusaha">Surat Keterangan Domisili Usaha</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_domisili" type="checkbox" name="jenis_surat[]"
                                                        value="s_domisili">
                                                    <label for="s_domisili">Surat Domisili</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_belumnikah" type="checkbox" name="jenis_surat[]"
                                                        value="s_belumnikah">
                                                    <label for="s_belumnikah">Surat Keterangan Belum Menikah</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_lingkungan" type="checkbox" name="jenis_surat[]"
                                                        value="s_lingkungan">
                                                    <label for="s_lingkungan">Surat Keterangan Bersih Lingkungan</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_ahliwaris" type="checkbox" name="jenis_surat[]"
                                                        value="s_ahliwaris">
                                                    <label for="s_ahliwaris">Surat Pernyataan dan Kuasa <p>Ahli Waris</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <div class="form-group mb-0">
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_lahir" type="checkbox" name="jenis_surat[]"
                                                        value="s_lahir">
                                                    <label for="s_lahir">Surat Keterangan Kelahiran</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_mati" type="checkbox" name="jenis_surat[]"
                                                        value="s_mati">
                                                    <label for="s_mati">Surat Keterangan Kematian</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_pengantarnikah" type="checkbox" name="jenis_surat[]"
                                                        value="s_pengantarnikah">
                                                    <label for="s_pengantarnikah">Surat Keterangan Pengantar Nikah <p>(Model NA)
                                                        </p>
                                                    </label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_miskin" type="checkbox" name="jenis_surat[]"
                                                        value="s_miskin">
                                                    <label for="s_miskin">Surat Keterangan Miskin / <p>Tidak Mampu</p>
                                                    </label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_pendatang" type="checkbox" name="jenis_surat[]"
                                                        value="s_pendatang">
                                                    <label for="s_pendatang">Surat Keterangan Pendatang Baru</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_keteranganpenghasilan" type="checkbox" name="jenis_surat[]"
                                                        value="s_keteranganpenghasilan">
                                                    <label for="s_keteranganpenghasilan">Surat Keterangan Penghasilan</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_belumpunyarumah" type="checkbox" name="jenis_surat[]"
                                                        value="s_belumpunyarumah">
                                                    <label for="s_belumpunyarumah">Surat Belum Memiliki Rumah</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_sudahnikah" type="checkbox" name="jenis_surat[]"
                                                        value="s_sudahnikah">
                                                    <label for="s_sudahnikah">Surat Keterangan Sudah Menikah</label>
                                                </div>
                                                <div class="checkbox checkbox-solid-success">
                                                    <input id="s_kosong" type="checkbox" name="jenis_surat[]"
                                                        value="s_kosong">
                                                    <label for="s_kosong">Kosong</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END Jenis Surat Keterangan --}}
                        </div>
                        <div class="card-footer text-end">
                               <a href="{{url()->previous()}}" class="btn btn-light">Kembali</a>
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
                    console.log(res.data);
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
                        $('#pengaju').val(databaru.id_warga);
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
