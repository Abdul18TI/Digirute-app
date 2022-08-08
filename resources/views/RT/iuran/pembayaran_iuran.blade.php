@extends('layouts.main-rt')

@section('title')
  Pembayaran
  {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}"
@endpush

@section('container')
  @component('components.warga.breadcrumb')
    @slot('breadcrumb_title')
      <h3>
        Pembayaran Iuran</h3>
    @endslot
    <li class="breadcrumb-item">Iuran</li>
    <li class="breadcrumb-item active"> Pembayaran Iuran</li>
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
        @if (session()->has('error'))
        <div class="alert alert-danger dark alert-dismissible fade show"
          role="alert">
          <strong>Gagal ! </strong> {{ session('error') }}.
          <button class="btn-close"
            type="button"
            data-bs-dismiss="alert"
            aria-label="Close"
            data-bs-original-title=""
            title=""></button>
        </div>
         @endif
        <div class="card">
       
          <div class="card-header pb-0">
            <h2 class="text-center">{{ ucwords($iuran->judul_iuran) }}</h2>
                        <h6 class="text-center">Iuran {{ ucwords($iuran->jenis_iurans->nama_jenis_iuran) }}</h6>
                        @if ($iuran->target_iuran !== null)
                            <h6 class="text-center mb-3">Rp. {{ number_format($iuran->pembayarans->sum('jumlah_bayar'), 0, '.', '.') }} / Rp.{{ $iuran->jumlah_iuran }}</h6>
                        @else
                        <h4 class="text-center mb-3 text-success f-w-700">Rp. {{ number_format($iuran->pembayarans->sum('jumlah_bayar'), 0, '.', '.') }}</h6>
                          @endif
          </div>
          <form class="form theme-form"
            method="POST" enctype="multipart/form-data"
            action="{{ route('rt.iuran.storePembayaran') }}">
            @csrf
            @method('POST')
            <div class="card-body">
              {{-- INFORMASI PELAPOR --}}
              <h4 class="mb-2">Warga</h4>
              <input name="id_iuran"
              type="hidden"
              id="id_iuran"
              name="id_iuran"
              value="{{ old('id_iuran', $iuran->id_iuran) }}">
              <hr />
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label"
                      for="nik">NIK Warga</label>
                   
                    <input class="form-control @error('nik') is-invalid @enderror"
                      name="nik"
                      type="text"
                      id="nik"
                      name="nik"
                      value="{{ old('nik') }}"
                      placeholder="NIK Warga">
                    @error('nik')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <input name="id_warga"
                    type="hidden"
                    id="id_warga"
                    name="id_warga"
                    value="{{ old('id_warga') }}">

                    <input name="warga"
                      type="hidden"
                      value="{{ old('warga') }}"
                      id="warga">
                    @error('warga')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label"
                          for="nama_warga">Nama Warga</label>
                        <input class="form-control @error('nama_warga') is-invalid @enderror"
                          name="nama_warga"
                          type="text"
                          id="nama_warga"
                          name="nama_warga"
                          placeholder="Nama Warga"
                          value="{{ old('nama_warga') }}"
                          readonly>
                        @error('nama_warga')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label class="form-label"
                      for="">&nbsp;</label>
                    <button type="button" onclick="getDataWarga()"
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
                      for="nama_warga">Bayar</label>
                    <input class="form-control @error('jumlah_bayar') is-invalid @enderror"
                      name="jumlah_bayar"
                      type="text"
                      id="jumlah_bayar"
                      name="nama_warga"
                      placeholder="Jumlah Bayaran"
                      {{-- value="{{ old('jumlah_bayar') }}" --}}
                      @if($iuran->jumlah_iuran != null)
                      value="{{ old('jumlah_bayar', $iuran->jumlah_iuran) }}" readonly
                      @else
                      value="{{ old('jumlah_bayar') }}"
                      @endif
                      {{ $iuran->jumlah_iuran}}>
                    @error('jumlah_bayar')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <button class="btn btn-primary"
                type="submit"><i class="fa fa-credit-card-alt"></i> Bayar</button>
              <input class="btn btn-secondary"
                type="reset"
                value="Batal" />
              <a class="btn btn-light"
                href=" {{ url()->previous() }}"> Kembali </a>
            </div>
          </form>
        </div>

      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h5>Riwayat Pembayaran</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div class="table-responsive overflow-hidden">
                <table class="display" id="iuran-rt">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jumlah Bayar</th>
                            <th>Tanggal Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    {{-- {!! QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string') !!} --}}
                    <tbody>
                        @foreach ($iuran->pembayarans as $p)
                        <tr>
                        <td>{{  $loop->iteration }}</td>
                        <td>{{  $p->wargas->nik }}</td>
                       <td> {{  $p->wargas->nama_lengkap }}</td>
                       <td> Rp. {{ number_format($p->jumlah_bayar, 0, '.', '.') }}</td>
                       <td> {{ tanggal_indo($p->created_at)}}</td>
                       <td class="aksi">
                        <form method="POST"
                                                    action="{{ route('rt.iuran.destroyPembayaran', $p->id_pembayaran) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm sweet" data-toggle="tooltip" title='Delete'>
                                                        <span class="fa fa-trash-o"></span></button>
                                                </form>
                         {{-- {{ route('', $p->id_pembayaran) }} --}}
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
                {{-- <table class="table table-bordered table-striped" id="editable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nominal</th>
                            <th>Status pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warga as $w)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $w->nama_lengkap }}</td>
                            <td>{{ $w->alamat }}</td>
                            <td>
                                @if ($iuran->target_iuran === null)
                                Masukkan nominal
                                @else
                                Rp.{{ number_format("$iuran->target_iuran",0,".","."); }}
                                @endif
                                {{-- {{ $w->jumlah_bayar }} --}}
                            {{-- </td>
                            <td class="text-center"><div class="checkbox checkbox-solid-primary">
                                @csrf
                                <input id="name_aja" class="get_value" value="{{ $iuran->target_iuran }}" type="text" />
                                <input id="{{ $loop->iteration }}" class="get_value" value="{{ $iuran->target_iuran }}" type="checkbox" />
                                <label for="{{ $loop->iteration }}">&nbsp;</label>{{ route('rw.pembayaran.store') }}
                            </div></td>
                        </tr>
                        @endforeach
                        <button type="button" name="submit" id="submit">Simpan</button>
                    </tbody>
                </table> --}} 
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
    <script type="text/javascript" src={{ asset('assets/js/trix.js') }}></script>
@endpush

@push('scripts-custom')
<script>
   $('#iuran-rt').DataTable();
</script>
  <script>
    function getDataWarga() {
      // var id = $('#nik').val();
      let id = $("input[name=nik]").val();
      const root_url = "{{ URL::to('/') }}";
      const url = `${root_url}/RT/iuran/show_warga`;
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
            $('#id_warga').val(databaru.id_warga);
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
