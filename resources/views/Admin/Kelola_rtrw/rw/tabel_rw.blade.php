@extends('layouts.main-admin')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
@component('components.admin.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Tabel RW</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Tabel RW</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                        <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Data RW</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rw.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah RW</a>
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
                                        <th>Nama RW</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kelola_rw as $rw)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rw->identitas_rw->nama_lengkap }}</td>
                                        <td><div class="media-body text-center icon-state">
                                            <label class="switch">
                                              <input type="checkbox"
                                                {{ $rw->status_rw == 1 ? 'checked' : '' }}
                                                data-id="{{ $rw->id_rw}}"
                                                class="toggle-class"><span class="switch-state"></span>
                                            </label>
                                          </div></td>
                                        <td>
                                            <a class="btn btn-info btn-sm p-2" href="rw/{{ $rw->id_rw }}"><span
                                                class="fa fa-eye"></span></a>
                                            <a class="btn btn-success btn-sm p-2" href="rw/{{ $rw->id_rw }}/edit"><span class="fa fa-pencil"></span></a>
                                            <form method="POST" action="{{ route('rw.destroy', $rw->id_rw)}}" class="d-inline">
                                                @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm p-2 border-0 sweet" data-toggle="tooltip" title='Delete'><span
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
<script>
    $('.toggle-class').change(function() {
      var status = $(this).prop('checked') == true ? 1 : 0;
      var product_id = $(this).data('id');
      // alert(status);
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{ route('rw.update.status') }}",
        data: {
          'status_rw': status,
          'id_rw': product_id
        },
        success: function(data) {
          console.log(data.success)
        }
      });
    });
  </script>
@endpush