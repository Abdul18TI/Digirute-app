@extends('layouts.main-rw')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
@component('components.r-w.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Iuran</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Iuran</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                        <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Data iuran</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rw.iuran.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <table class="display" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul iuran</th>
                                        <th>Jumlah terkumpul</th>
                                        <th>Target iuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($iuran as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->judul_iuran }}</td>
                                        <td>Rp.{{ number_format("0",0,".","."); }}</td>
                                        <td>
                                            @if ($i->jumlah_iuran === null)
                                            Iuran Sukarela
                                            @else
                                            Rp.{{ number_format("$i->jumlah_iuran",0,".","."); }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm p-2" href="{{ route('rw.iuran.show',$i->id_iuran ) }}"><span
                                                    class="fa fa-eye"></span></a>
                                            <a class="btn btn-secondary btn-sm p-2" href="{{ route('rw.iuran.edit',  $i->id_iuran) }}"><span
                                                    class="fa fa-edit"></span></a>
                                            <form method="POST" action="{{ route('rw.iuran.destroy', $i->id_iuran)}}" class="d-inline">
                                                @csrf
                                               <input name="_method" type="hidden" value="DELETE">
                                               <button type="submit" class="btn btn-danger btn-sm sweet" data-toggle="tooltip" title='Delete'><span
                                                class="fa fa-trash"></span></button>
                                            </form>
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
    $('#dataTable').DataTable();
</script>
@endpush