@extends('layouts.main-warga')

@section('title')
    Dashboard - Warga
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/whether-icon.css') }}">
@endpush
@section('container')
    <!-- Container-fluid starts-->
    <div class="container-fluid general-widget">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">

                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">

                            <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                            <div class="media-body"><span class="m-0">Jumlah warga</span>

                                <h4 class="mb-0 counter">{{ count($warga) }}</h4><i class="icon-bg"
                                    data-feather="user-plus"></i></a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-info b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="user"></i></div>
                            <div class="media-body"><span class="m-0">Warga tetap</span>
                                <h4 class="mb-0 counter">{{ count($wargatetap) }}</h4><i class="icon-bg"
                                    data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-success b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
                            <div class="media-body"><span class="m-0">Warga pendatang</span>
                                <h4 class="mb-0 counter">{{ count($wargadatang) }}</h4><i class="icon-bg"
                                    data-feather="calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-danger b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="users"></i></div>
                            <div class="media-body"><span class="m-0">K. Keluarga</span>
                                <h4 class="mb-0 counter">{{ $no_kk }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-25 box-col-4 des-xl-25">
                <div class="card latest-update-sec">
                    <div class="card-header pb-2    ">
                        <div class="header-top d-sm-flex align-items-center">
                            <h5>Gender</h5>
                            <div class="center-content">
                            </div>
                        </div>
                        <p class="text-muted">Tahun : {{ now()->year }}</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive o-hidden">
                            <table class="table table-bordernone">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                {{-- <div class="media-body"><span class="m-0">RT {{ $gt->rt_rel->no_rt }}</span>
                            </div> --}}
                                                <div class="media-body"><span class="m-0">Laki-Laki</span>
                                                    <h4 class="mb-0 counter">{{ $lk }}</h4>
                                                </div>
                                                <div class="media-body"><span class="m-0">Perempuan</span>
                                                    <h4 class="mb-0 counter">{{ $pr }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-25 box-col-4 des-xl-25">
                <div class="card latest-update-sec">
                    <div class="card-header pb-2">
                        <div class="header-top d-sm-flex align-items-center">
                            <h5>Warga Meninggal</h5>
                            <div class="center-content">
                            </div>
                        </div>
                        <p class="text-muted">Tahun : {{ now()->year }}</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive o-hidden">
                            <table class="table table-bordernone">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body"><span class="m-0">Warga meninggal</span>
                                                    <h4 class="mb-0 counter">{{ $meninggal }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-25 box-col-4 des-xl-25">
                <div class="card latest-update-sec">
                    <div class="card-header pb-2">
                        <div class="header-top d-sm-flex align-items-center">
                            <h5>Warga Miskin</h5>
                            <div class="center-content">
                            </div>
                        </div>
                        <p class="text-muted">Tahun : {{ now()->year }}</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive o-hidden">
                            <table class="table table-bordernone">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body"><span class="m-0">Warga miskin</span>
                                                    <h4 class="mb-0 counter">{{ $miskin }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-xl-6 xl-50 box-col-6">
          <div class="card">
              <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                  <h5>Warga Berdasarkan Gender</h5>
              </div>
              <div class="card-body">
                  <div class="user-status table-responsive">
                      <table class="table table-bordernone" style="overflow-x: hidden">
                          <thead>
                              <tr>
                                  <th>Laki - Laki</th>
                                  <th>{{ $lk }}</th>
                              </tr>
                          </thead>
                          <thead>
                              <tr>
                                  <th>Perempuan</th>
                                  <th>{{ $pr }}</th>
                              </tr>
                          </thead>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-6 xl-50 box-col-6">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h5>Tes</h5>
            </div>
            <div class="card-body">
                <div class="user-status table-responsive">
                    <table class="table table-bordernone" style="overflow-x: hidden">
                        <thead>
                            <tr>
                                <th>Laki - Laki</th>
                                <th>{{ $lk }}</th>
                            </tr>
                        </thead>
                        <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>2</td>
                              </tr>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        </div> --}}
    <div class="row">
        <div class="col-xl-6 xl-100 box-col-12">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5>Kegiatan yang akan datang</h5>
                </div>
                <div class="card-body">
                    @if ($kegiatan->count())
                        <div class="user-status table-responsive mb-3">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th>Nama kegiatan</th>
                                        <th>Kategori kegiatan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kegiatan as $p)
                                        <tr>
                                            <td>{{ $p->nama_kegiatan }}</td>
                                            <td>{{ $p->Kategori_kegiatans->kategori_kegiatan }}</td>
                                            <td>{{ tanggal_indo($p->tgl_mulai_kegiatan) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer pb-1 text-end">
                            <a href="{{ route('warga.kegiatan_warga.index') }}">Lihat Selengkapnya...</a>
                        </div>
                    @else
                        Tidak ada kegiatan yang akan datang
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100 box-col-12">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5>Surat Keterangan</h5>
                </div>
                <div class="card-body">
                    @if ($surat->count())
                        <div class="user-status table-responsive mb-3">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <th>Jenis Surat</th>
                                        <th>Status Surat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surat as $p)
                                        <tr>
                                            <td>
                                                @if ($p->nomor_surat == null)
                                                    <span class="badge badge-dark">Nomor Belum Terbit</span>
                                                @else
                                                    {{ $p->nomor_surat }}
                                                @endif
                                            </td>
                                            <td>{{ $p->jenis_surat }}</td>
                                            <td>
                                                @if ($p->status_surat == 1)
                                                    <span class="badge badge-warning">Diterimma RT</span>
                                                @elseif($p->status_surat == 0)
                                                    <span class="badge badge-secondary">Diajukan</span>
                                                @elseif($p->status_surat == 2)
                                                    <span class="badge badge-danger">Ditolak RT</span>
                                                @elseif($p->status_surat == 3)
                                                    <span class="badge badge-warning">Diterima RW</span>
                                                @elseif($p->status_surat == 4)
                                                    <span class="badge badge-success">Selesai</span>
                                                @elseif($p->status_surat == 4)
                                                    <span class="badge badge-danger">Ditolak RW</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer pb-1 text-end">
                            <a href="{{ route('warga.surat.index') }}">Lihat Selengkapnya...</a>
                        </div>
                    @else
                        Tidak ada kegiatan yang akan datang
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 xl-100 box-col-12">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5>Pengumuman Terbaru</h5>
                </div>
                <div class="card-body">
                    @if ($pengumuman->count())
                        <div class="user-status table-responsive mb-3">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th>Judul Pengumuman</th>
                                        <th>Kategori Pengumuman</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengumuman as $p)
                                        <tr>
                                            <td>{{ $p->judul_pengumuman }}</td>
                                            <td>{{ $p->Kategori_pengumumans->nama_kategori_pengumuman }}</td>
                                            <td>{{ tanggal_indo($p->tgl_terbit) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer pb-1 text-end">
                            <a href="{{ route('warga.pengumuman_warga.index') }}">Lihat Selengkapnya...</a>
                        </div>
                    @else
                        Tidak ada pengumuman yang akan datang
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    @push('scripts')
        <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
        <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
        <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
        <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
        <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
        <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
        <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/js/general-widget.js') }}"></script>
        <script src="{{ asset('assets/js/height-equal.js') }}"></script>
        <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    @endpush
@endsection
