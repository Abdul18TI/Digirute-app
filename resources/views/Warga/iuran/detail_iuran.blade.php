@extends('layouts.main-warga')

@section('title')Detail Iuran {{ $iuran->judul_iuran }}
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Detail Iuran {{ $iuran->judul_iuran }}</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item">Iuran Warga</li>
        <li class="breadcrumb-item active">Detail Iuran {{ $iuran->judul_iuran }}</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">{{ $iuran->judul_iuran }}</h5>
                        <h6 class="text-center">Iuran {{ $iuran->jenis_iuran }}</h6>
                            <h6 class="text-center mb-3">0/Rp.{{ $iuran->jumlah_iuran }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="tabel-iuran-detail-warga">
                                <thead>
                                    <tr>
                                        <th width="10%">No</th>
                                        <th>Nama</th>
                                        {{-- <th>Alamat</th>
                                        <th>Status pembayaran</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($warga as $w)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $w->nama_lengkap }}</td>
                                        {{-- <td>{{ $w->alamat }}</td> --}}
                                        {{-- <td><span class="badge badge-primary">Lunas</span></td> --}}
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
</div>
<!-- Zero Configuration  Ends-->
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush
@push('scripts-custom')
<script>
    $('#tabel-iuran-detail-warga').DataTable({
        "scrollX": true
    });
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