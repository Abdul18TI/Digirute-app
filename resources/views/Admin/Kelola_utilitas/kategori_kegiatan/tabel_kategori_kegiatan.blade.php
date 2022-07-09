@extends('layouts.main-rt')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush
r-t
@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Kategori kegiatan</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Kategori kegiatan</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                        <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Data Kategori Kegiatan</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rt.kategori_kegiatan.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah Data</a>
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
                                        <th>kategori kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kategori_kegiatan as $kp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kp->kategori_kegiatan }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm p-2" href="{{ route('rt.kategori_kegiatan.edit',$kp->id_kategori_kegiatan)}}"><span class="fa fa-pencil"></span></a>
                                            <form method="POST" action="{{ route('rt.kategori_kegiatan.destroy', $kp->id_kategori_kegiatan)}}" class="d-inline">
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