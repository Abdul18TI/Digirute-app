@extends('layouts.main-rt')

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
                                                <input class="form-control @error('nik') is-invalid @enderror"
                                                    type="text" id="nik" name="nik"
                                                    value="{{ old('nik', $surat->wargas->nik) }}" placeholder="NIK"
                                                    readonly>
                                                {{-- <div class="text-danger mr-3">Data warga tidak ditemukan</div> --}}
                                                <input name="pengaju" type="hidden"
                                                    value="{{ old('pengaju', $surat->wargas->id_warga) }}" id="pengaju">
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
                                                value="{{ old('no_kk', $surat->wargas->no_kk) }}" readonly>
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
                                                placeholder="Nama"
                                                value="{{ old('nama_lengkap', $surat->wargas->nama_lengkap) }}" readonly>
                                            @error('nama_lengkap')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            @php
                                                $jenis_kelamin = $surat->wargas->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';
                                            @endphp
                                            <input class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" type="text" id="jenis_kelamin" name="jenis_kelamin"
                                                placeholder="Jenis Kelamin"
                                                value="{{ old('jenis_kelamin', $jenis_kelamin) }}" readonly>
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
                                                value="{{ old('agama', $surat->wargas->agamas->agama) }}" readonly>
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
                                                placeholder="Pekerjaan"
                                                value="{{ old('pekerjaan', $surat->wargas->pekerjaans->nama_pekerjaan) }}"
                                                readonly>
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
                                                    value="{{ old('tempat_lahir', $surat->wargas->tempat_lahir) }}"
                                                    readonly>
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
                                                    placeholder="Tanggal Lahir"
                                                    value="{{ old('tgl_lahir', tanggal_indo($surat->wargas->tgl_lahir)) }}"
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
                                                    placeholder="Alamat" readonly>{{ old('alamat', $surat->wargas->alamat) }}</textarea>
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
                                @php
                                    $genap = '';
                                    $ganjil = '';
                                    $test =$surat->propertie_surat->jenis_surat;
                                @endphp
                                <div class="row justify-content-center">
                                    {{-- <li><i class="fa fa-caret-right txt-secondary m-r-10"></i>{!! setJenisSuratKeterangan($jenis_surat) !!}</li> --}}
                                    {{-- @endforeach --}}
                                    {{--                                 
                                        {{dd($surat->propertie_surat->jenis_surat[0])}}
                                        {{dd(setJenisSuratKeterangan($surat->propertie_surat->jenis_surat[0]))}} --}}
                                       {{-- @php
                                           dd($surat->propertie_surat->jenis_surat);
                                       @endphp --}}
                                        @foreach (setJenisSuratKeterangan() as $key => $value)
                                        {{-- @foreach ($surat->propertie_surat)
                                        @endforeach --}}
                                       {{-- @foreach ($surat->propertie_surat->jenis_surat as $tes)
                                        @php var_dump($tes) @endphp
                                    @endforeach --}}
                                   @php
                                       $check = $key == in_array($key,$test) ? 'checked' : '';
                                   @endphp  
                                        @if ($loop->iteration <= round(count(setJenisSuratKeterangan())/2))
                                            @php $genap .=
                                                   '<div class="row">
                                                        <div class="col">
                                                            <div class="checkbox checkbox-solid-success">
                                                                <input id="'. $key.'" type="checkbox" name="jenis_surat[]" value="'. $key.'"'.$check.' disabled> 
                                                                <label for="'. $key.'">' .$value .'</label>
                                                            </div>
                                                        </div>
                                                    </div>';
                                            @endphp
                                        @else
                                            @php $ganjil .=
                                                     '<div class="row">
                                                        <div class="col">
                                                            <div class="checkbox checkbox-solid-success">
                                                                <input id="'. $key.'" type="checkbox" name="jenis_surat[]" value="'. $key.'"'.$check.' disabled> 
                                                                <label for="'. $key.'">' .$value .'</label>
                                                            </div>
                                                        </div>
                                                    </div>';
                                            @endphp
                                        @endif

                                    @endforeach
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <div class="form-group mb-0">
                                                {!! $genap !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <div class="form-group mb-0">
                                                {!! $ganjil !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END Jenis Surat Keterangan --}}
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Ajukan</button>
                            <a href="{{url()->previous()}}" class="btn btn-light">Batal</a>
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
