@extends('layouts.main')

@section('container')
{{-- tableEdit --}}
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
@endpush

<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">{{ $iuran->judul_iuran }}</h5>
                        <h6 class="text-center">Iuran {{ $iuran->jenis_iurans->nama_jenis_iuran }}</h6>
                            @if ($iuran->jumlah_iuran !== null)
                            <h6 class="text-center mb-3">0/Rp.{{ $iuran->jumlah_iuran }}</h6>
                            @else
                            <h6 class="text-center mb-3">Total terkumpul : Rp.{{ number_format("0",0,".","."); }}</h6>
                            @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @csrf
                            <table class="table table-bordered table-striped" id="editable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="display:none;">Id pembayaran</th>
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
                                        <td style="display:none;">{{ $w->id_pembayaran }}</td>
                                        <td>{{ $w->nama_lengkap }}</td>
                                        <td>{{ $w->alamat }}</td>
                                        <td>
                                            {{-- @if ($iuran->target_iuran === null)
                                            Masukkan nominal
                                            @else
                                            Rp.{{ number_format("$iuran->target_iuran",0,".","."); }}
                                            @endif --}}
                                            {{ $w->jumlah_bayar }}
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

<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dataType:"json",
            columns:{
                identifier:[1, 'id_pembayaran'],
                editable:[4, 'jumlah_bayar']
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
            }
        });
    });
</script>
<!-- Zero Configuration  Ends-->
@endsection