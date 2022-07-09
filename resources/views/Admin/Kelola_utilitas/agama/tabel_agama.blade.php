@extends('layouts.main-rt')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Agama</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Agama</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                        <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Data Agama</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rt.agama.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Data</a>
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
                                        <th>Agama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($agama as $ji)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ji->agama }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm p-2" href="{{route('rt.agama.edit',$ji->id_agama)}}"><span class="fa fa-pencil"></span></a>
                                            <form method="POST" action="{{ route('rt.agama.destroy', $ji->id_agama)}}" class="d-inline">
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