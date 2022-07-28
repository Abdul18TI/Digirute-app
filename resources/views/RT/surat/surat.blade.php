@extends('layouts.main-rt')

@section('title')
    Pengajuan Surat
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Pengajuan Surat</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item">Surat</li>
        <li class="breadcrumb-item active">Pengjuan Surat</li>
    @endcomponent

    <!-- Form Tambah Warga -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- @if (session()->has('success'))
                    <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                        <strong>Sukses ! </strong> {{ session('success') }}.
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                            data-bs-original-title="" title=""></button>
                    </div>
                @endif --}}
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Pengajuan Surat</h5>
                            </div>
                            {{-- <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('warga.pengaduan.create') }}"
                                        data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span>
                                        Tambah Data</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="tabelpengaduan-warga">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengaju Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Jenis Surat</th>
                                        <th>Sub Jenis Surat</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surat as $s)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $s->wargas->nama_lengkap }}<p class="text-muted">
                                                    ({{ $s->wargas->nik }})
                                                </p>
                                            </td>
                                            <td class="text-center">{!! $s->nomor_surat ?? ' <span class="badge badge-dark ">Nomor Surat Belum Terbit</span>' !!}</td>
                                            <td>{{ $s->jenis_surat }}</td>
                                            <td>
                                                @php
                                                    $surat = $s->propertie_surat;
                                                @endphp
                                                <ul>
                                                    @if ($surat == null)
                                                        <p class="text-center">-</p>
                                                    @else
                                                        @if (isset($surat->jenis_surat))
                                                            @foreach ($surat->jenis_surat as $jenis_surat)
                                                                <li><i
                                                                        class="fa fa-caret-right txt-secondary m-r-10"></i>{!! setJenisSuratKeterangan($jenis_surat) !!}
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </ul>
                                            </td>
                                            <td>{{ tanggal_indo($s->created_at) }}</td>
                                            {{-- <td>{{ $s->propertie_surat->jenis_surat }}</td> --}}
                                            <td>
                                                @if ($s->status_surat == 0)
                                                    <span class="badge badge-warning">Diajukan</span>
                                                @elseif($s->status_surat == 1)
                                                    <span class="badge badge-secondary">Disetuji RT</span>
                                                @elseif($s->status_surat == 2)
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @elseif($s->status_surat == 3)
                                                    <span class="badge badge-secondary">Disetuji RW</span>
                                                @elseif($s->status_surat == 4)
                                                    <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>
                                            <td class="aksi">
                                                <a class="btn btn-success btn-sm p-2 m-1"
                                                    href="{{ route('rt.surat.detail.surat_keterangan', $s->id_surat) }}"><span
                                                        class="fa fa-list"></span></a>
                                                @if ($s->status_tandatangan == 1 && $s->status_surat == 4 && $s->nomor_surat != null)
                                                    <a class="btn btn-secondary btn-sm p-2 m-1"
                                                        href="{{ route('rt.surat.print.surat_keterangan', $s->id_surat) }}"><span
                                                            class="fa fa-print"></span></a>
                                                @endif
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
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')
    <script>
        $('#tabelpengaduan-warga').DataTable();
    </script>
@endpush
