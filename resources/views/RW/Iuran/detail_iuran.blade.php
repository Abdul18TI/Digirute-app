@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">{{ $iuran->judul_iuran }}</h5>
                        <h6 class="text-center">Iuran {{ $iuran->jenis_iuran }}</h6>
                            @if ($iuran->jumlah_iuran !== null)
                            <h6 class="text-center mb-3">0/Rp.{{ $iuran->jumlah_iuran }}</h6>
                            @else
                            <h6 class="text-center mb-3">Total terkumpul : Rp.{{ number_format("0",0,".","."); }}</h6>
                            @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nominal</th>
                                        <th>Status pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($warga as $w)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $w->nama_lengkap }}</td>
                                        <td>{{ $w->alamat }}</td>
                                        <td>
                                            @if ($iuran->target_iuran === null)
                                            Masukkan nominal
                                            @else
                                            Rp.{{ number_format("$iuran->target_iuran",0,".","."); }}
                                            @endif
                                        </td>
                                        <td class="text-center"><div class="checkbox checkbox-solid-primary">
                                            <input id="{{ $loop->iteration }}" type="checkbox" />
                                            <label for="{{ $loop->iteration }}">&nbsp;</label>
                                        </div></td>
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