@extends('layouts.main-rt')

@section('title')
    Tambah Data Kepindahan Warga
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href={{ asset('assets/css/trix.css') }}>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
            <h3>
                Tambah Data Kepindahan Warga</h3>
        @endslot
        <li class="breadcrumb-item">Warga</li>
        <li class="breadcrumb-item">Pindah</li>
        <li class="breadcrumb-item active">Tambah Data Kepindahan Warga</li>
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
                    <div class="card-header pb-0">
                        <h5>Tambah </h5>
                    </div>
                    <form class="form theme-form" method="POST" enctype="multipart/form-data"
                        action="{{ route('rt.wargapindah.store') }}">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            {{-- INFORMASI PELAPOR --}}
                            <h4 class="mb-2">Informasi Warga</h4>
                            <hr />
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik">NIK Warga</label>
                                        <input class="form-control @error('nik') is-invalid @enderror" name="nik"
                                            type="text" id="nik" name="nik" value="{{ old('nik') }}"
                                            placeholder="NIK Warga">
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <input name="warga" type="hidden" value="{{ old('warga') }}" id="warga">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama_warga">Nama Warga</label>
                                        <input class="form-control @error('nama_warga') is-invalid @enderror"
                                            name="nama_warga" type="text" id="nama_warga" name="nama_warga"
                                            placeholder="Nama Warga" value="{{ old('nama_warga') }}" readonly>
                                        @error('nama_warga')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">&nbsp;</label>
                                        <button type="button" onclick="getDataWarga()" id="cek_pelapor"
                                            class="btn btn-secondary form-control text-white"><span
                                                class="fa fa-search"></span> Cek
                                            Data</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="dokumen_pindah">Dokumen Pindah</label>
                                        <input class="form-control" name="dokumen_pindah" onchange="previewImage()"
                                            id="image" type="file" />
                                        {{-- <img class=" img-fluid mb-3 col-sm-5"> --}}
                                        <figure class="col-xl col-md xl-60 mt-3" itemprop="associatedMedia" itemscope="">
                                            <a href="{{ asset('assets/images/big-lightgallry/01.jpg') }}"
                                                itemprop="contentUrl" data-size="1600x950"><img
                                                    class="img-preview img-thumbnail"
                                                    src="{{ asset('assets/images/lightgallry/01.jpg') }}"
                                                    itemprop="thumbnail" alt="Image description" /></a>
                                        </figure>
                                        @error('dokumen_pindah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="tanggal_pindah"> Tanggal Pindah</label>
                                        <input class="form-control digits @error('tanggal_pindah') is-invalid @enderror"
                                            type="date" name="tanggal_pindah" {{-- value="{{ old('tanggal_pindah') }}" --}}>
                                        @error('tanggal_pindah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-9">
                                    <div class="mb-3">
                                        <label class="form-label" for="alamat_pindah"> Alamat Pindah</label>
                                        <input class="form-control @error('alamat_pindah') is-invalid @enderror"
                                            name="alamat_pindah" type="text" id="alamat_pindah" name="alamat_pindah"
                                            value="{{ old('alamat_pindah') }}" placeholder="Alamat Pindah">
                                        @error('alamat_pindah')
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

            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush

@push('scripts-custom')
    <script>
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
    <script>
        function getDataWarga() {
            // var id = $('#nik').val();
            let id = $("input[name=nik]").val();
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
                        $('#warga').val(databaru.id_warga);
                        $('#nama_warga').val(databaru.nama_lengkap.toUpperCase());
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
