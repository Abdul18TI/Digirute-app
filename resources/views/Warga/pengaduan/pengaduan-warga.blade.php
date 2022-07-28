@extends('layouts.main-warga')

@section('title')Pengaduan Warga
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Pengaduan Warga</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Pengaduan Warga</li>
    @endcomponent
      
    <!-- Form Tambah Warga -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                        <strong>Sukses ! </strong> {{ session('success') }}.
                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                            aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Pengaduan Warga</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('warga.pengaduan.create') }}"
                                        data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span>
                                        Tambah Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="tabelpengaduan-warga">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dt->judul_pengaduan }}</td>
                                            <td>{{ $dt->kategori_pengaduans->nama_kategori_pengaduan }}</td>
                                            <td>{{ Str::limit($dt->deskripsi_pengaduan, 100, '...') }}</td>
                                            <td>{{ $dt->created_at->isoFormat('ddd, D MMM Y') }}</td>
                                            <td>
                                                @if ($dt->status_pengaduan == 2)
                                                    <span class="badge badge-success">Sudah Ditanggapi</span>
                                                    @elseif($dt->status_pengaduan == 0)
                                                        <span class="badge badge-warning">Proses</span></td>
                                                    @elseif($dt->status_pengaduan == 1)
                                                        <span class="badge badge-danger">Ditolak</span></td>
                                                @endif
                                            </td>
                                    <td>
                                        <a href="" onclick="detail({{ $dt->id_pengaduan }},'{{route('warga.pengaduan.show',$dt->id_pengaduan)}}')"
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
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Form Pengaduan End -->
            </div>
        </div>
    </div>
    {{-- MODAL DETAIL DATA --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid bd-example-row">
                        <div class="row mb-3"
                            style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600" >Judul Pengaduan</p>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <p id="judul_pengaduan"></p></div>
                        </div>
                        <div class="row mb-3"
                            style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600">Kategori</span>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <p id="kategori_pengaduan"></p></div>
                        </div>
                        <div class="row mb-3"
                            style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600">Deskripsi</span>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <p id="deskripsi_pengaduan"></p>
                            </div>
                        </div>
                        <div class="row mb-3" style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600">Tanggal Lapor</span>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <p id="tanggal_pengaduan"></p>
                            </div>
                        </div>
                        <div class="row mb-3" style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600">Status </span>
                            </div>
                            <div class="col-md-9 ml-auto" id="status_pengaduan"></div>
                        </div>
                        <div class="row mb-3" style="border-bottom: 1px solid #dee2e696;">
                            <div class="col-md-3">
                                <p class="f-w-600">Bukti</span>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <a id="gambar_link" href="">
                                    <img class="img img-thumbnail mb-3" id="gambar_pengaduan"
                                        src="{{ asset('assets/images/dashboard/bg.jpg') }}">
                                </a>
                            </div>
                        </div>
                        <div class="row mb-5 tanggap_rt">
                            <div class="col-md-3">
                                <p class="f-w-600">Tanggapan RT</span>
                            </div>
                            <div class="col-md-9 ml-auto">
                                <p id="tanggapan_rt"></p>
                            </div>
                        </div>
                        {{-- <div class="row ">
                            <div class="col-md-3">
                                <p class="f-w-600">Tanggapan RT</span>
                                </div>
                            <div class="col-md-9 ml-auto">
                                <input type="hidden" name="id_validasi" value="" />
                                <textarea class="form-control" name="tanggapan_rt" id="tanggapan_rt" cols="30" rows="10"></textarea>
                                <button class="btn btn-primary"> Validasi</button>
                            </div>
                        </div> --}}
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

@push('scripts-custom')
<script>
    $('#tabelpengaduan-warga').DataTable();
        //membuat modal detail
        const detail = (id, url) => {
        const judul_pengaduan = document.getElementById('judul_pengaduan');
        const deskripsi_pengaduan = document.getElementById('deskripsi_pengaduan');
        const kategori_pengaduan = document.getElementById('kategori_pengaduan');
        const tanggal_pengaduan = document.getElementById('tanggal_pengaduan');
        const tanggapan_rt = document.getElementById('tanggapan_rt');
         const gambar_pengaduan = document.getElementById('gambar_pengaduan');
         const gambar_link = document.getElementById('gambar_link');
        
        // console.log(deskripsi_pengaduan.textContent);
        // console.log(deskripsi_pengaduan.textContent);
        fetch(url)
            .then(console.log(url))
            .then(respone =>respone.json())
            .then(data=>{
                console.log(data);
                var image = "{{ asset('storage/') }}";
                gambar_pengaduan.src = image + '/' + data.bukti_pengaduan;
                gambar_link.href = image + '/' + data.bukti_pengaduan;
                judul_pengaduan.textContent = data.judul_pengaduan;
                deskripsi_pengaduan.textContent = data.deskripsi_pengaduan;
                kategori_pengaduan.textContent = data.kategori_pengaduans.nama_kategori_pengaduan;
                tanggapan_rt.textContent =  data.tanggapan_pengaduan != null ? data.tanggapan_pengaduan : '-';
                //membuat tanggal indonesia
                const event = new Date(data.created_at);
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                tanggal_pengaduan.textContent = event.toLocaleDateString('id-ID', options);
                //end membuat tanggal indonesia
                let status = '';
                if(data.status_pengaduan == 0){
                    status = '<span class="badge badge-warning">Proses</span>'
                }else if(data.status_pengaduan == 1){
                    status = '<span class="badge badge-danger">Ditolak</span>'
                }else if(data.status_pengaduan == 2){
                    status = '<span class="badge badge-success">Sudah Ditanggapi</span>'
                }
                status_pengaduan.innerHTML = status;
            })
        //end membuat modal detail
    }
</script>
@endpush