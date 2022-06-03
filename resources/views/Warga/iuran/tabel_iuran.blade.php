@extends('layouts.main-warga')

@section('title')Iuran Warga
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Iuran Warga</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Iuran Warga</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                        <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Data Iuran</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('iuran.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="tabel-iuran-warga">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul iuran</th>
                                        <th>Jumlah terkumpul</th>
                                        <th>Jumlah iuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($iuran as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->judul_iuran }}</td>
                                        <td>0</td>
                                        <td>{{ $i->jumlah_iuran }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm p-2" href="{{ route('warga.iuran.show',$i->id_iuran ) }}"><span
                                                    class="fa fa-eye"></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Form Pengaduan End -->
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
    $('#tabel-iuran-warga').DataTable();
    //     //membuat modal detail
    //     const detail = (id, url) => {
    //     const judul_pengaduan = document.getElementById('judul_pengaduan');
    //     const deskripsi_pengaduan = document.getElementById('deskripsi_pengaduan');
    //     const kategori_pengaduan = document.getElementById('kategori_pengaduan');
    //     const tanggal_pengaduan = document.getElementById('tanggal_pengaduan');
    //     // console.log(deskripsi_pengaduan.textContent);
    //     // console.log(deskripsi_pengaduan.textContent);
    //     fetch(url)
    //         .then(console.log(url))
    //         .then(respone =>respone.json())
    //         .then(data=>{
    //             // judul_pengaduan.textContent ='';
    //             // deskripsi_pengaduan.textContent ='';
    //             // kategori_pengaduan.textContent ='';
    //             judul_pengaduan.textContent = data.judul_pengaduan;
    //             deskripsi_pengaduan.textContent = data.deskripsi_pengaduan;
    //             kategori_pengaduan.textContent = data.kategori_pengaduan;
    //             //membuat tanggal indonesia
    //             const event = new Date(data.created_at);
    //             const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    //             tanggal_pengaduan.textContent = event.toLocaleDateString('id-ID', options);
    //             //end membuat tanggal indonesia
    //             let status = '';
    //             if(data.status_pengaduan == 0){
    //                 status = '<span class="badge badge-warning">Proses</span>'
    //             }else if(data.status_pengaduan == 1){
    //                 status = '<span class="badge badge-warning">Proses</span>'
    //             }
    //             status_pengaduan.innerHTML = status;
    //         })
    //     //end membuat modal detail
    // }
</script>
@endpush