@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    @foreach($iuran as $i)
                    <div class="card-header">
                        <h5 class="text-center">{{ $i->judul_iuran }}</h5>
                        <h6 class="text-center">Iuran {{ $i->jenis_iuran }}</h6>
                            {{-- <h6 class="text-center mb-3">0/Rp.{{ $i->target_iuran }}</h6> --}}
                    </div>
                    @endforeach
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Status pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Eko patrio</td>
                                        <td>jalan sejahtera no 5</td>
                                        <td>
                                            <div class="checkbox checkbox-solid-primary">
                                                <input id="solid6" type="checkbox" checked="" />
                                                <label for="solid6">&nbsp;</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Ayap saiyo</td>
                                        <td>Jalan seberang no 9</td>
                                        <td>
                                            <div class="checkbox checkbox-solid-primary">
                                                <input id="solid6" type="checkbox" />
                                                <label for="solid6">&nbsp;</label>
                                            </div>
                                        </td>
                                    </tr>
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