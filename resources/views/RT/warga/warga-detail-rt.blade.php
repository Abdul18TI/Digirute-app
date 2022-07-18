@extends('layouts.main-rt')

@section('title')
  Data Warga
  {{ $title }}
@endsection

@push('css')
  <link rel="stylesheet"
    type="text/css"
    href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet"
    type="text/css"
    href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
  @component('components.r-t.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Data Warga</h3>
    @endslot
    <li class="breadcrumb-item"><a href="{{ route('rt.warga.index') }}">Warga</a></li>
    <li class="breadcrumb-item active">Detail Warga</li>
  @endcomponent
  <!-- Form Tambah Warga -->
  <div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-options">
                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-2">
                                <div class="profile-title">
                                    <div class="media">
                                        <img class="img-70 rounded-circle" alt="" src="{{asset('assets/images/user/7.jpg')}}" />
                                        <div class="media-body">
                                            <h3 class="mb-1 f-20 txt-primary">{{ $warga->nama_lengkap }}</h3>
                                            <p class="f-12">RW {{ $warga->rw }} | RT {{ $warga->rt }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input class="form-control" disabled value="{{ $warga->nik }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor HandPhone</label>
                                <input class="form-control" disabled value="{{ $warga->no_hp_warga }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" disabled rows="5">{{ $warga->alamat }}</textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <form class="card">
                    <div class="card-header pb-0">
                        <div class="card-options">
                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">No KK</label>
                                    <input class="form-control" disabled value="{{ $warga->no_kk }}" type="text" Company" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">No KK kepala keluarga</label>
                                    <input class="form-control" disabled value="{{ $warga->nokk_kepala_keluarga }}" type="text"/>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nama kepala keluarga</label>
                                    <input class="form-control" disabled value="{{ $warga->nama_kepala_keluarga }}" type="email"/>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Kelurahan</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->kelurahan }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Kecamatan</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->kecamatan }}"/>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Kabupaten</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->kabupaten }}"/>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Provinsi</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->provinsi }}"/>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Kode pos</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->kode_pos }}"/>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tempat lahir</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->tempat_lahir }}"/>
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal lahir</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->tgl_lahir }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Jenis kelamin</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->jenis_kelamin }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->agamas->agama }}" />
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Golongan darah</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->golongan_darah }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Pendidikan</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->pendidikans->nama_pendidikan }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->Pekerjaan->nama_pekerjaan }}" />
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Status hubungan</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->golongan_darah }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Status perkawinan</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->status_perkawinan }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nomor passport</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->nomor_passport }}" />
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal akhir passport</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->tgl_akhir_passport }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nomor kitaskitap</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->nomor_kitaskitap }}" />
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NIK ayah</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->nik_ayah }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama ayah</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->nama_ayah }}" />
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NIK ibu</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->nik_ibu }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama ibu</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->nama_ibu }}" />
                                </div>
                            </div>
                            {{-- Line --}}
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal keluar KK</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->tgl_keluar_kk }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal perkawinan</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->tgl_perkawinan }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Akta kawin</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->akta_kawin }}" />
                                </div>
                            </div>
                            {{-- Line --}}
                            @if($warga->akta_cerai != null)
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Akta cerai</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->akta_cerai }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal cerai</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->tgl_cerai }}" />
                                </div>
                            </div>
                            @else
                            @endif
                             {{-- Line --}}
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Akta kelahiran</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->akta_kelahiran }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal kelahiran</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->tgl_kelahiran }}" />
                                </div>
                            </div>
                            {{-- Line --}}
                            @if($warga->kelainan != null)
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Kelainan</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->kelainan }}" />
                                </div>
                            </div>
                            @else
                            @endif
                             {{-- Line --}}
                             <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->email_warga }}" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No hp warga</label>
                                    <input class="form-control" type="text" disabled value="{{ $warga->no_hp_warga }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


@push('scripts')
  <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
  <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')
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
@endpush

{{-- @endsection --}}
