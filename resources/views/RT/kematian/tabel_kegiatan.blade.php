@extends('layouts.main-rt')

@section('title')
  Kegiatan
  {{ $title }}
@endsection

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
  @component('components.warga.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Warga Meninggal</h3>
    @endslot
    {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
    <li class="breadcrumb-item active">Warga Meninggal</li>
  @endcomponent

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-9">
                <h5>Data Warga Meninggal</h5>
              </div>
              <div class="col-3">
                <div class="bookmark">

                  <a class="btn btn-primary btn-lg" href="{{ route('rt.kegiatan.create') }}" data-bs-original-title=""
                    title=""> <span class="fa fa-plus-square"></span>
                    Tambah Data</a>
                </div>
              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive overflow-hidden">
              <table class="display" id="tabelkegiatan-rt">
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama kegiatan</th>
                    <th>Tanggal Mulai Kegiatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kegiatan as $p)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $p->nama_kegiatan }}</td>
                      <td>{{ tanggal_indo($p->tgl_mulai_kegiatan) }}</td>
                      <td>
                        <div class="media-body text-center icon-state">
                          <label class="switch">
                            <input type="checkbox" {{ $p->status_kegiatan == 1 ? 'checked' : '' }}
                              data-id="{{ $p->id_kegiatan }}" class="toggle-class"><span class="switch-state"></span>
                          </label>
                        </div>
                        {{-- @if ($p->status_kegiatan == 1)
                          <span class="badge badge-success">aktif</span>
                        @else
                          <span class="badge badge-warning">tidak aktif</span>
                        @endif --}}
                      </td>
                      <td class="aksi">
                        <a class="btn btn-info btn-sm p-2" href="{{ route('rt.kegiatan.show', $p->id_kegiatan) }}"><span
                            class="fa fa-eye"></span></a>
                        <a class="btn btn-secondary btn-sm p-2"
                          href="{{ route('rt.kegiatan.edit', $p->id_kegiatan) }}"><span class="fa fa-edit"></span></a>
                        <a class="btn btn-danger btn-sm p-2 sweet"
                          href="{{ route('rt.kegiatan.destroy', $p->id_kegiatan) }}"
                          onclick="event.preventDefault();
                                                                                      document.getElementById('logout-form{{ $p->id_kegiatan }}').submit();">
                          <span class="fa fa-trash-o"></span>
                        </a>
                        {{-- FORM DELETE --}}
                        <form method="POST" class="d-none" id="logout-form{{ $p->id_kegiatan }}"
                          action="{{ route('rt.kegiatan.destroy', $p->id_kegiatan) }}" class="d-inline">
                          @csrf
                          @method('DELETE')
                        </form>
                        {{-- END FORM DELETE --}}
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
    $('#tabelkegiatan-rt').DataTable();
    $('.toggle-class').change(function() {
      var status = $(this).prop('checked') == true ? 1 : 0;
      var product_id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{ route('rt.kegiatan.update.status') }}",
        data: {
          'status_kegiatan': status,
          'id_kegiatan': product_id
        },
        success: function(data) {
          console.log(data.success)
        }
      });
    });
  </script>
@endpush
