@extends('layouts.main-warga')

@section('title')
    Iuran Warga
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
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

                                    {{-- <a class="btn btn-primary btn-lg" href="{{ route('warga.iuran.home') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Data</a> --}}
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
                                        <th>Judul Iuran</th>
                                        <th>Target Iuran</th>
                                        <th>Jumlah Iuran Perorang</th>
                                        <th>Jumlah Terkumpul</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($iuran as $i)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $i->judul_iuran }}</td>
                                            <td>
                                                @if ($i->target_iuran === null)
                                                    Tidak Ada Target
                                                @else
                                                    Rp. {{ number_format($i->target_iuran, 0, '.', '.') }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($i->jumlah_iuran === null)
                                                    Iuran Sukarela
                                                @else
                                                   Rp. {{ number_format($i->jumlah_iuran, 0, '.', '.') }}
                                                @endif
                                            </td>
                                            <td>
                                                 <span class="text-success f-w-900">Rp. {{ number_format($i->pembayarans->sum('jumlah_bayar'), 0, '.', '.') }}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-info btn-sm p-2"
                                                    href="{{ route('warga.iuran.show', $i->id_iuran) }}"><span
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
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endpush
@push('scripts-custom')
    <script>
        $('#tabel-iuran-warga').DataTable();
    </script>
@endpush
