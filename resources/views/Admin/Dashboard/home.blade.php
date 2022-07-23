@extends('layouts.main-admin')

@section('title')
    Dashboard - RT
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
                              
                              <h4 class="mb-0 counter">{{ count($warga)}}</h4><i class="icon-bg" data-feather="user-plus"></i></a>
                              
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
                                <h4 class="mb-0 counter">{{ count($wargatetap)}}</h4><i class="icon-bg" data-feather="user"></i>
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
                                <h4 class="mb-0 counter">{{ count($wargadatang)}}</h4><i class="icon-bg" data-feather="calendar"></i>
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
                                <h4 class="mb-0 counter">{{ $no_kk }}</h4><i class="icon-bg" data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xl-4 col-25 box-col-4 des-xl-25">
            <div class="card latest-update-sec">
              <div class="card-header">
                <div class="header-top d-sm-flex align-items-center">
                  <h5>Jumlah warga </h5><p class="text-muted">(RT)</p>
                  <div class="center-content">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive o-hidden">
                  <table class="table table-bordernone">
                    <tbody>
                        @foreach ($gruprt as $gr)
                      <tr>
                        <td>
                          <div class="media">
                            <div class="media-body"><span class="m-0">RT {{ $gr->rt_rel->no_rt }}</span>
                                <h4 class="mb-0 counter">{{ $gr->jumlah_warga}}</h4>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <div class="col-xl-4 col-25 box-col-4 des-xl-25">
            <div class="card latest-update-sec">
              <div class="card-header">
                <div class="header-top d-sm-flex align-items-center">
                  <h5>Jumlah warga </h5><p class="text-muted">(Gender)</p>
                </div>
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
                                <h4 class="mb-0 counter">{{ $lk}}</h4>
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
              <div class="card-header">
                <div class="header-top d-sm-flex align-items-center">
                  <h5>Jumlah Warga</h5><p class="text-muted">(Meninggal)</p>
                  <div class="center-content">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive o-hidden">
                  <table class="table table-bordernone">
                    <tbody>
                      <tr>
                        <td>
                          <div class="media">
                            <div class="media-body"><span class="m-0">Warga meninggal</span>
                                <h4 class="mb-0 counter">{{ $meninggal}}</h4>
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
        <div class="col-xl-6 xl-100 box-col-12">
          <div class="card">
              <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                  <h5>Kegiatan yang akan datang</h5>
              </div>
              <div class="card-body">
                  <div class="user-status table-responsive mb-3">
                      <table class="table table-bordernone">
                          <thead>
                              <tr>
                                  <th>Nama kegiatan</th>
                                  <th>Kategori kegiatan</th>
                                  <th>Tanggal</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($kegiatan as $p)
                              <tr>
                                  <td>{{ $p->nama_kegiatan }}</td>
                                  <td>{{ $p->Kategori_kegiatans->kategori_kegiatan }}</td>
                                  <td>{{ tanggal_indo($p->tgl_mulai_kegiatan) }}</td>
                                  <td>
                                      @if ($p->status_kegiatan == 1)
                                      <span class="badge badge-primary">Aktif</span>
                                  @elseif($p->status_kegiatan == 0)
                                      <span class="badge badge-danger">Tidak aktif</span>
                                      @endif
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-6 xl-100 box-col-12">
            <div class="card employee-status">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5>Warga RW</h5>
                </div>
                <div class="card-body">
                    <div class="user-status table-responsive mb-3">
                        <table class="table table-bordernone">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor HP</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($wargaw as $dw)
                                <tr>
                                    <td class="bd-t-none u-s-tb">
                                        <div class="align-middle image-sm-size"><img
                                                class="img-radius align-top m-r-15 rounded-circle"
                                                src="{{ asset('storage/' . $dw->foto_warga) }}" alt="">
                                            <div class="d-inline-block">
                                                <h6>{{ $dw->nama_lengkap }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $dw->alamat }}</td>
                                    <td>
                                      {{ $dw->no_hp_warga }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100 box-col-12">
          <div class="card employee-status">
              <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                  <h5>Pengajuan Surat</h5>
              </div>
              <div class="card-body">
                  <div class="user-status table-responsive mb-3">
                      <table class="table table-bordernone">
                          <thead>
                              <tr>
                                  <th scope="col">Nama pengaju</th>
                                  <th scope="col">Tanggal pengaju</th>
                                  <th scope="col">Status Pengajuan</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($surat as $dw)
                              <tr>
                                  <td class="bd-t-none u-s-tb">
                                      <div class="align-middle image-sm-size"><img
                                              class="img-radius align-top m-r-15 rounded-circle"
                                              src="{{ asset('storage/' . $dw->wargas->foto_warga) }}" alt="">
                                          <div class="d-inline-block">
                                              <h6>{{ $dw->wargas->nama_lengkap }}</h6>
                                          </div>
                                      </div>
                                  </td>
                                  <td>{{ tanggal_indo($dw->created_at) }}</td>
                                  <td>
                                    @if ($dw->status_surat == 0)
                                                    <span class="badge badge-warning">Diajukan</span>
                                                @elseif($dw->status_surat == 1)
                                                    <span class="badge badge-secondary">Disetuji RT</span>
                                                @elseif($dw->status_surat == 2)
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @elseif($dw->status_surat == 3)
                                                    <span class="badge badge-secondary">Disetuji RW</span>
                                                @elseif($dw->status_surat == 4)
                                                    <span class="badge badge-success">Selesai</span>
                                                @endif
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
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