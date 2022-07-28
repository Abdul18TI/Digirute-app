@extends('layouts.main-rt')

@section('title')
  Warga
  {{ $title }}
@endsection

@push('css')
  <link rel="stylesheet"
    type="text/css"
    href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet"
    type="text/css"
    href="{{ asset('assets/css/custom.css') }}">
@endpush

@section('container')
  @component('components.r-t.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Warga</h3>
    @endslot
    <li class="breadcrumb-item">Warga</li>
    <li class="breadcrumb-item active">Daftar Warga</li>
  @endcomponent
  <!-- Form Tambah Warga -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        @if (session()->has('success'))
          <div class="alert alert-success dark alert-dismissible fade show"
            role="alert">
            <strong>Sukses ! </strong> {{ session('success') }}.
            <button class="btn-close"
              type="button"
              data-bs-dismiss="alert"
              aria-label="Close"
              data-bs-original-title=""
              title=""></button>
          </div>
        @endif
        @if (session()->has('error'))
          <div class="alert alert-danger dark alert-dismissible fade show"
            role="alert">
            <strong>Gagal ! </strong> {{ session('error') }}.
            <button class="btn-close"
              type="button"
              data-bs-dismiss="alert"
              aria-label="Close"
              data-bs-original-title=""
              title=""></button>
          </div>
        @endif
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-9">
                <h5>Data Warga</h5>
              </div>
              <div class="col-3">
                <div class="bookmark">
                  <a class="btn btn-primary btn-lg"
                    href="{{ route('rt.warga.create') }}"
                    data-bs-original-title=""
                    title=""> <span class="fa fa-plus-square"></span> Tambah Data</a>
                </div>
              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive overflow-hidden">
              <table class="display"
                id="tabelwarga-rt">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($warga as $dw)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $dw->nama_lengkap }}</td>
                      <td>{{ $dw->nik }}</td>
                      <td>{{ $dw->alamat }}</td>
                      <td>{{ $dw->no_hp_warga }}</td>
                      <td class="aksi">
                        <a class="btn btn-info btn-sm p-2"
                          href="{{ route('rt.warga.show',$dw->id_warga) }}"><span class="fa fa-eye"></span></a>
                        <a class="btn btn-secondary btn-sm p-2"
                          href="{{ route('rt.warga.edit', $dw->id_warga) }}"><span class="fa fa-edit"></span></a>
                        <form method="POST"
                          action="{{ route('rt.warga.destroy', $dw->id_warga) }}"
                          class="d-inline">
                          @csrf
                          <input name="_method"
                            type="hidden"
                            value="DELETE">
                          <button type="submit"
                            class="btn btn-danger btn-sm sweet"
                            data-toggle="tooltip"
                            title='Delete'><span class="fa fa-trash-o"></span></button>
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
    $('#tabelwarga-rt').DataTable();
  </script>
@endpush
