@extends('layouts.main-admin')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                        <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-9">
                                <h5>Data RT</h5>
                            </div>
                            <div class="col-3">
                                <div class="bookmark">

                                    <a class="btn btn-primary btn-lg" href="{{ route('rt.create') }}" data-bs-original-title="" title=""> <span class="fa fa-plus-square"></span> Tambah RT</a>
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
                                        <th>Nama RT</th>
                                        <th>Aksi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kelola_rt as $rt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rt->identitas_rt->nama_lengkap }}</td>
                                        <td><div class="media-body text-center icon-state">
                                            <label class="switch">
                                              <input type="checkbox"
                                                {{ $rt->status_rt == 1 ? 'checked' : '' }}
                                                data-id="{{ $rt->id_rt}}"
                                                class="toggle-class"><span class="switch-state"></span>
                                            </label>
                                          </div></td>
                                        <td>
                                            <a class="btn btn-info btn-sm p-2" href="rt/{{ $rt->id_rt }}"><span
                                                class="fa fa-eye"></span></a>
                                            <a class="btn btn-success btn-sm p-2" href="rt/{{ $rt->id_rt }}/edit"><span class="fa fa-pencil"></span></a>
                                            <form method="POST" action="{{ route('rt.destroy', $rt->id_rt)}}" class="d-inline">
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
<script>
    $('.toggle-class').change(function() {
      var status = $(this).prop('checked') == true ? 1 : 0;
      var product_id = $(this).data('id');
      // alert(status);
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{ route('rt.update.status') }}",
        data: {
          'status_rt': status,
          'id_rt': product_id
        },
        success: function(data) {
          console.log(data.success)
        }
      });
    });
  </script>
@endsection