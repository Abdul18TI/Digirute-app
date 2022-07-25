@extends('layouts.main-rw')

@section('title')
    Warga miskin
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
    @component('components.r-w.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Warga miskin</h3>
        @endslot
        <li class="breadcrumb-item"><a href='{{ route('rw.warga.index') }}'>Warga</a></li>
        <li class="breadcrumb-item active">Warga miskin</li>
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

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="tabel-kemiskinan-rt">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Warga</th>
                                        <th>Bukti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kemiskinan as $p)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $p->wargas->nama_lengkap }}</td>
                                            <td class="text-center"> 
                                                <a class="text-success" href="{{ asset('storage/'. $p->bukti) }}">
                                                Lihat Bukti
                                            </a></td>
                                            <td class="aksi">
                                                <a class="btn btn-info btn-sm p-2" href='/RW/wargarw/wargamd/{{ $p->id }}'>
                                                    <span class="fa fa-eye"></span>
                                                </a>
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
        $('#tabel-kemiskinan-rt').DataTable();
    </script>
@endpush
