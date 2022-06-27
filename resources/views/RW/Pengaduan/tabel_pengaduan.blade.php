@extends('layouts.main-rw')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
@component('components.r-w.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Pengaduan</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Pengaduan</li>
    @endcomponent
        <!-- Form Tambah Warga -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col">
                                    <h5>Pengaduan Warga</h5>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive overflow-hidden">
                                @if (session()->has('success'))
                                    <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                        <strong>Sukses ! </strong> {{ session('success') }}.
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close" data-bs-original-title="" title=""></button>
                                    </div>
                                @endif
                                <table class="display" id="tabelpengaduan-warga">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelapor</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengaduan as $dt)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dt->nama_lengkap }}</td>
                                                <td>{{ $dt->judul_pengaduan }}</td>
                                                <td>{{ $dt->nama_kategori_pengaduan }}</td>
                                                <td>{{ Str::limit($dt->deskripsi_pengaduan, 100, '...') }}</td>
                                                <td>{{ $dt->created_at->isoFormat('ddd, D MMM Y') }}</td>
                                                <td>
                                                    @if ($dt->status_pengaduan == 1)
                                                        <span class="badge badge-success">Sudah Ditanggapi</span>
                                                    @elseif($dt->status_pengaduan == 0)
                                                            <span class="badge badge-warning">Proses</span></td>
                                                    @elseif($dt->status_pengaduan == 3)
                                                            <span class="badge badge-warning">Ditolak</span></td>
                                                    @endif
                                                </td>
                                        <td>
                                            <a href="" onclick="detail({{ $dt->id_pengaduan }}, '{{ route('rw.pengaduan.show',$dt->id_pengaduan)}}')"
                                                class="btn btn-success btn-sm p-2" role="button" data-bs-toggle="modal"
                                                data-original-title="test" data-bs-target="#exampleModal"><span
                                                    class="fa fa-list"></span></a>
                                            {{-- @if ($dt->ditampilkan == '0')
                                                <a href="{{ $dt->id_pengaduan }}" class="btn btn-danger btn-sm p-2"
                                                    data-container="body" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Edit"><span class="fa fa-trash"></span></a>
                                            @endif --}}
                                        </td>
                                        </tr>
                                        @endforeach
                                        {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Simple</button> --}}
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Form Pengaduan End -->
                    </div>
            </div>
        </div>
        {{-- MODAL DETAIL DATA --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid bd-example-row">
                        <div class="row mb-3 pb-2"
                            style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600" >Judul Pengaduan</p>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <p id="judul_pengaduan"></p></div>
                        </div>
                        <div class="row mb-3 pb-2"
                            style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600">Kategori</span>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <p id="kategori_pengaduan"></p></div>
                        </div>
                        <div class="row mb-3 pb-2"
                            style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600">Deskripsi</span>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <p id="deskripsi_pengaduan"></p>
                            </div>
                        </div>
                        <div class="row mb-3 pb-2"
                            style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600">Bukti</span>
                            </div>
                            <div class="col-md-9 ml-auto"><img
                                    src="{{ asset('assets/images/dashboard/bg.jpg') }}">
                            </div>
                        </div>
                        <div class="row mb-3 pb-2"
                            style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600">Tanggal Lapor</span>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <p id="tanggal_pengaduan"></p>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-3">
                                <p class="f-w-600">Status </span>
                            </div>
                            <div class="col-md-9 ml-auto" id="status_pengaduan"></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button class="btn btn-primary" type="button"
                        data-bs-dismiss="modal">Edit</button>
                  <button class="btn btn-secondary" type="button">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- END DETAIL MODAL --}}
@endsection
@push('scripts')
  <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
  <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush
    <!-- Plugins JS start-->
    @push('scripts-custom')
    <script>
        $('#tabelpengaduan-warga').DataTable();
         //membuat modal detail
         const detail = (id,url) => {
            //  alert(url);
            const judul_pengaduan = document.getElementById('judul_pengaduan');
            const deskripsi_pengaduan = document.getElementById('deskripsi_pengaduan');
            const kategori_pengaduan = document.getElementById('kategori_pengaduan');
            const tanggal_pengaduan = document.getElementById('tanggal_pengaduan');
            // console.log(deskripsi_pengaduan.textContent);
            // console.log(deskripsi_pengaduan.textContent);
            fetch(url)
            // .then(alert(url))
                .then(respone =>respone.json())
                .then(data=>{
                    // console.log(data);
                    judul_pengaduan.textContent = data[0].judul_pengaduan;
                    deskripsi_pengaduan.textContent = data[0].deskripsi_pengaduan;
                    kategori_pengaduan.textContent = data[0].kategori_pengaduan;
                    //membuat tanggal indonesia
                    const event = new Date(data[0].created_at);
                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    tanggal_pengaduan.textContent = event.toLocaleDateString('id-ID',options);
                    //end membuat tanggal indonesia
                    let status = '';
                    if(data[0].status_pengaduan == 0){
                        status = '<span class="badge badge-warning">Proses</span>'
                    }
                    status_pengaduan.innerHTML = status;
                })
            //end membuat modal detail    
         }
    </script>
    @endpush
    <!-- Plugins JS Ends-->

