@extends('layouts.main-rt')

@section('title')
    Warga Meninggal
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Warga Meninggal</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item">Warga</li>
        <li class="breadcrumb-item active">Warga Meninggal</li>
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
                                <h5>Data Warga Meninggal</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rt.kematian.create') }}"
                                        data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span>
                                        Tambah Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="tabelkegiatan-rt">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Keterangan Kematian</th>
                                        <th>Tanggal Meninggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                {{-- {!! QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string') !!} --}}
                                <tbody>
                                    @foreach ($kematian as $p)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $p->wargas->nama_lengkap }}<p class="text-muted">({{ $p->wargas->nik }})</p></td>
                                            <td><p class><span class="f-w-600">Sebab : </span>{{$p->sebab_kematian}}</p>
                                            <p class><span class="f-w-600">Lokasi : </span>{{ $p->tempat_kematian}}</p></td>
                                            <td>{{ tanggal_indo($p->tgl_kematian) }}</td>
                                            <td class="aksi">

                                                <a class="btn btn-secondary btn-sm p-2"
                                                    href="{{ route('rt.kematian.show', $p->id) }}"><span
                                                        class="fa fa-eye"></span></a>
                                                @if ($p->no_surat == null && $p->cetak_surat == 0)
                                                    <a class="btn btn-primary btn-sm p-2" href="{{ route('rt.kematian.request_surat', $p->id) }}" data-container="body"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Request Surat Kematian"><span
                                                            class="fa fa-file-text-o"></span></a>
                                                @else
                                                <a class="btn btn-primary btn-sm p-2"
                                                    href="{{ route('rt.kematian.print_surat', $p->id) }}"><span
                                                        class="fa fa-print"></span></a>
                                                        @endif
                                                <a class="btn btn-danger btn-sm p-2 sweet"
                                                    href="{{ route('rt.kematian.destroy', $p->id) }}"
                                                    onclick="event.preventDefault();
                                                                                      document.getElementById('logout-form{{ $p->id }}').submit();">
                                                    <span class="fa fa-trash-o"></span>
                                                </a>
                                                {{-- FORM DELETE --}}
                                                <form method="POST" class="d-none" id="logout-form{{ $p->id }}"
                                                    action="{{ route('rt.kematian.destroy', $p->id) }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                {{-- END FORM DELETE --}}
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
        $('#tabelkegiatan-rt').DataTable();
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('rt.kegiatan.update.status') }}",
                data: {
                    'status_kegiatan': status,
                    'id_kegiatan': product_id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        });
    </script>
@endpush
