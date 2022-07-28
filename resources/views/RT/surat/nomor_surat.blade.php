@extends('layouts.main-rt')

@section('title')
    Nomor Surat
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Nomor Surat</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item">Surat</li>
        <li class="breadcrumb-item active">Nomor Surat</li>
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
                                <h5>Nomor Surat</h5>
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
                            <table class="display text-center" id="tabelpengaduan-warga">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Nama Pengaju Surat</th>
                                        <th>Jenis Surat</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status Surat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surat as $s)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                {{-- {{dd($s)}} --}}
                                                @php
                                                    $url = null;
                                                    $propertie_surat = $s->propertie_surat;
                                                    if ($s->jenis_surat == 'Surat Keterangan') {
                                                        $url = route('rt.surat.print.surat_keterangan', $s->id_surat);
                                                    }else if($s->jenis_surat == 'Surat Keterangan Kematian'){
                                                        if (property_exists($propertie_surat,'id_surat_meninggal')){
                                                            $url = route('rt.kematian.print_surat',  $propertie_surat->id_surat_meninggal);
                                                        }else{
                                                              $url = null;
                                                        }
                                                    }
                                                @endphp
                                                <a href="{{ is_null($url) ? 'javascript:void(0)' :$url}}">
                                                    {{ $s->nomor_surat }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $s->wargas->nama_lengkap }}<p class="text-muted">
                                                    ({{ $s->wargas->nik }})
                                                </p>
                                            </td>
                                            <td>{{ $s->jenis_surat }}</td>
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
