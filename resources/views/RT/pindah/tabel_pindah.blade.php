@extends('layouts.main-rt')

@section('title')
    Kepindahan Warga
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
    @component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Kepindahan Warga</h3>
        @endslot
         <li class="breadcrumb-item">Warga</li>
        <li class="breadcrumb-item active">Kepindahan Warga</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
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
                        <div class="row">
                            <div class="col-9">
                                <h5>Data Kepindahan Warga</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rt.wargapindah.create') }}"
                                        data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span>
                                        Tambah Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="tabel-pindah-rt">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Warga</th>
                                        <th>Alamat Pindah</th>
                                        <th>Tanggal Pindah</th>
                                        <th>Tanggal Lapor</th>
                                        <th>Bukti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pindah as $p)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $p->wargas->nama_lengkap }}<p class="text-muted">({{$p->wargas->nik}})</p></td>
                                            <td>{{ $p->alamat_pindah }}</p></td>
                                            <td>{{ tanggal_indo($p->tanggal_pindah) }}</td>
                                            <td>{{ tanggal_indo($p->created_at) }}</td>
                                            <td class="text-center"> 
                                                <a class="text-success" href="{{ asset('storage/'. $p->dokumen_pindah) }}" target="_blank">
                                                <span class="badge badge-primary">Lihat Bukti</span>
                                            </a></td>
                                            <td class="aksi">
                                                <form method="POST"
                                                    action="{{ route('rt.wargapindah.destroy', $p->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm sweet" data-toggle="tooltip" title='Delete'>
                                                        <span class="fa fa-trash-o"></span></button>
                                                </form>
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
    <a href="#" class="ignielToTop"></a>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')
    <script>
        $('#tabel-pindah-rt').DataTable();
    </script>
@endpush
