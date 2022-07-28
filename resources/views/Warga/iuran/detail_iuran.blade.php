@extends('layouts.main-warga')

@section('title')
    Detail Iuran {{ $iuran->judul_iuran }}
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
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
                        <h2 class="text-center">{{ $iuran->judul_iuran }}</h2>
                        <h6 class="text-center">Iuran {{ $iuran->jenis_iurans->nama_jenis_iuran }}</h6>
                        @if ($iuran->target_iuran !== null)
                            <h6 class="text-center mb-3">0/Rp.{{ $iuran->jumlah_iuran }}</h6>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <input type="hidden" class="form-control" id="id_iuran" value="{{ $iuran->id_iuran }}" />
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
                                    @foreach ($warga as $w)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $w->nama_lengkap }}</td>
                                            <td>{{ $w->nama_lengkap }}</td>
                                            <td><input id="input" type="checkbox" class="get_value"
                                                    onchange="changestate(1);">
                                            </td>
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

        function checkData(id_iuran, id_warga) {
            $.ajax({
                type: "post",
                dataType: 'JSON',
                url: ``,
                data: {
                    nilai_kpi: nilai.value,
                    sub_indikator_id: sub.value,
                    kota_kabupaten_id: kota.value,
                    _token: _token,
                    _method: 'post',
                },
                success: function(response) {
                    console.log("berhasil");
                },
            });
        }

        function changestate(element) {
            //  alert(element);

        }

        function tambahIuran(id_iuran, id_warga) {

        }
        // $('.get_value').on("click", function() {
        //     var insert = [];
        //     $('.get_value').each(function() {
        //         if ($(this).is(":checked")) {
        //             alert($(this).attr('data-id'));
        //         }
        //     });

        //     insert = insert.toString();

        // });
    </script>
@endpush
