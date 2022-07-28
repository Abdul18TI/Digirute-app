@extends('layouts.main-warga')

@section('title')
    Pengjuan Surat
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
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
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
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
                                            <td>
                                                {{-- {!! QrCode::size(150)->generate($s->id_surat); !!} --}}

                                                {{ tanggal_indo($s->created_at) }}</td>
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
                                                @if ($s->status_surat == 0 || $s->status_surat == 2)
                                                    <form method="POST"
                                                        action="{{ route('warga.surat.destroy', $s->id_surat) }}"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm sweet"
                                                            data-toggle="tooltip" title='Delete'><span
                                                                class="fa fa-trash-o"></span></button>
                                                    </form>
                                                @else
                                                    {{-- @if ($s->status_tandatangan == 1 || ($s->status_tandatangan == 1 && $s->nomor_surat != null))
                                                        <a class="btn btn-secondary btn-sm p-2 m-1"
                                                        href="{{ route('warga.surat.print.surat_keterangan', $s->id_surat) }}"><span
                                                            class="fa fa-print"></span></a> --}}
                                                    @if ($s->status_tandatangan == 1 and $s->status_surat == 4 and $s->nomor_surat != null)
                                                        <a class="btn btn-secondary btn-sm p-2 m-1"
                                                            href="{{ route('warga.surat.print.surat_keterangan', $s->id_surat) }}"><span
                                                                class="fa fa-print"></span></a>
                                                    @else
                                                        <span class="badge badge-light text-dark">Tidak Ada Aksi</span>
                                                    @endif
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
@endsection

@push('scripts')
    {{-- <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script> --}}
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush

@push('scripts-custom')
    <script>
        $('#tabelpengaduan-warga').DataTable();
    </script>
@endpush
