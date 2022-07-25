@extends('layouts.main-rw')

@section('title')
    Cek Surat
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
            <div class="col-sm-12 col-xl-7">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Pindai Barcode</h5>
                    </div>
                    <div class="card-body">
                        <p>
                            Silahkan pindai barcode yang ada di surat untuk melihat keabsahan surat
                        </p>
                        <div id="reader"></div>
                        <input type="hidden" id="hasil" />
                        <input name="csrf-token" type="hidden" value="{{ csrf_token() }}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-5">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Detail Surat</h5>
                    </div>
                    <div class="card-body">
                        <p>
                            Informasi tentang surat
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="nomor_surat">Nomor Surat</label>
                                    <input class="form-control input-air-primary" id="nomor_surat" type="text"
                                        placeholder="Nomor Surat" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="pengaju">Pengaju</label>
                                    <input class="form-control input-air-primary" id="pengaju" type="text"
                                        placeholder="Pengaju" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="jenis_surat">Jenis Surat</label>
                                    <input class="form-control input-air-primary" id="jenis_surat" type="text"
                                        placeholder="Jenis Surat" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="tgl_pengaju">Tanggal Pengajuan</label>
                                    <input class="form-control input-air-primary" id="tgl_pengaju" type="text"
                                        placeholder="Tanggal Pengajuan" readonly>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
@endpush

@push('scripts-custom')
    <script>
        $('#tabelpengaduan-warga').DataTable();

        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);
            $('#hasil').val(decodedText);

            let id = decodedText;
            csrf_token = $('input[name="csrf-token"]').val();
            // alert('SUKSES');
            swal({
                title: `Scan Berhasil`,
                // text: "data akan hilang selamanya.",
                icon: "success",
                // buttons: true,
                // dangerMode: true,
            }).then((result) => {
                // alert('ya');
                // console.log(result.value);
                if (result) {
                    $.ajax({
                        url: "{{ route('rw.surat.validasi_qrcode') }}",
                        type: "POST",
                        data: {
                            '_method': 'POST',
                            '_token': csrf_token,
                            'qr_code': id
                        },
                        success: function(response) {
                            if (response.error) {
                                swal({
                                    title: `Surat Tidak Terdeteksi`,
                                    text: "Surat tidak terdaftar di dalam sistem.",
                                    icon: "error"
                                });
                            } else {
                                swal({
                                    title: `Surat Terdeteksi Benar`,
                                    text: "Surat terdaftar di dalam sistem.",
                                    icon: "success"
                                });
                                $('#nomor_surat').val(response.nomor_surat);
                                $('#pengaju').val(response.wargas.nama_lengkap);
                                $('#jenis_surat').val(response.jenis_surat);
                                const tanggal_pengajuan = $('#tgl_pengaju');
                                const options = {
                                    weekday: 'long',
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric',
                                    hour12: false
                                };
                                const event = new Date(response.created_at);
                                const tanggal = event.toLocaleDateString('id-ID', options)
                                tanggal_pengajuan.val(tanggal);
                            }
                            // console.log(response);
                        },
                        error: function(response) {
                            swal({
                                title: `Surat terdeteksi benar`,
                                // text: "data akan hilang selamanya.",
                                icon: "error"
                            });
                            console.log('error');
                        }
                    })
                };
            })

        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 200,
                    height: 200
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endpush
