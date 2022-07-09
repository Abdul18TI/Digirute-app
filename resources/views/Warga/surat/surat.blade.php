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
                                <thead class="text-center" >
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
                                            <td>{{ $s->nomor_surat ?? 'Nomor Surat Belum Terbit' }}</td>
                                            <td>{{ $s->jenis_surat }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($s->propertie_surat->jenis_surat as $jenis_surat)
                                                        <li><i
                                                                class="fa fa-caret-right txt-secondary m-r-10"></i>{{ setJenisSuratKeterangan($jenis_surat) }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ tanggal_indo($s->created_at) }}</td>
                                            <td>
                                                @if ($s->status_surat == 0)
                                                    <span class="badge badge-warning">Diajukan</span>
                                                @elseif($s->status_surat == 1)
                                                    <span class="badge badge-secondary">Tahapan RT</span>
                                                @elseif($s->status_surat == 2)
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @elseif($s->status_surat == 3)
                                                    <span class="badge badge-secondary">Tahapan RW</span>
                                                @elseif($s->status_surat == 4)
                                                    <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>
                                            <td class="aksi">
                                                @if ($s->status_surat == 0)
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
                                                   <span class="badge badge-light text-dark">Tidak Ada Aksi</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Jenis Surat</th>
                                        <th>Sub Jenis Surat</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfooter>
                            </table>
                        </div>
                    </div>
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
        $('#tabelpengaduan-warga').DataTable();
    </script>
@endpush
