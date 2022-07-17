@extends('layouts.main-rw')

@section('title')
  Detail Pengumuman
  {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
  @component('components.r-w.breadcrumb')
    @slot('breadcrumb_title')
      <h3>
        Detail Pengumuman</h3>
    @endslot
    <li class="breadcrumb-item"><a href="{{ route('rw.pengumuman.index') }}">Pengumuman</a></li>
    <li class="breadcrumb-item active">Detail Pengumuman</li>
  @endcomponent

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-single">
          <div class="blog-box blog-details">
            @if($pengumuman->foto_pengumuman == null)     
            @else
            <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="{{asset('storage/'. $pengumuman->foto_pengumuman)}}" alt="blog-main" /></div>
            @endif
            <div class="card">
              <div class="card-body">
                <div class="blog-details">
                  <ul class="blog-social">
                    <li class="middle">Publish : {{ tanggal_waktu_indo($pengumuman->tgl_terbit) }}</li>
                    <li class="middle">Status :
                      @if ($pengumuman->status_pengumuman == 1)
                        <span id="status_aja" class="badge badge-success">Aktif</span>
                      @else
                        <span id="status_aja" class="badge badge-warning">Tidak Aktif</span>
                      @endif
                      </span>
                    </li>
                    <li class="middle">Kategori :{{ $pengumuman->Kategori_pengumumans->nama_kategori_pengumuman }}</li>
                  </ul>
                  <h4>
                    {{ $pengumuman->judul_pengumuman }}
                  </h4>
                  <div class="single-blog-content-top txt-dark">
                    {!! $pengumuman->isi_pengumuman !!}.
                  </div>
                  @if($pengumuman->foto_pengumuman != null)
                  <h6>Lampiran</h5>
                    <div class="single-blog-content-top txt-dark">
                      <p class="text-center">
                        <img class="img-fluid w-75 " src="{{ asset('storage/' . $pengumuman->foto_pengumuman) }}"
                          alt="Foto {{$pengumuman->judul_pengumuman}} " />
                      </p>
                    </div>
                    @else
                    @endif
                </div>
              </div>
              <div class="card-footer text-end">
                {{-- TOMBOL AKTIF NON AKTIF --}}
                <button class='btn @php echo $pengumuman->status_pengumuman == 0 ? 'btn-success' : 'btn-warning' @endphp
                  btn-lg' id="ubah_status" data-id="{{ $pengumuman->id_pengumuman }}"
                  data-status="{{ $pengumuman->status_pengumuman == 1 ? 0:1 }}"
                  href="{{ route('rw.pengumuman.edit', $pengumuman->id_pengumuman) }}"><span class="fa fa-edit"></span>
                  {{ $pengumuman->status_pengumuman == 0 ? 'Aktif' : 'Non-Aktif' }}</button>
                {{-- END TOMBOL AKTIF NON AKTIF --}}

                {{-- TOMBOL EDIT --}}
                <a class="btn btn-secondary btn-lg"
                  href="{{ route('rw.pengumuman.edit', $pengumuman->id_pengumuman) }}"><span
                    class="fa fa-edit"></span>Edit</a>
                {{-- END TOMBOL EDIT --}}

                {{-- TOMBOL DELETE --}}
                <form method="POST" action="{{ route('rw.pengumuman.destroy', $pengumuman->id_pengumuman) }}"
                  class="d-inline">
                  @csrf
                  @method('DELETE')
                  {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                  <button type="submit" class="btn btn-danger btn-lg border-0 sweet"><span class="fa fa-trash"></span>
                    Hapus</button>
                </form>
              </div>
              {{-- END TOMBOL DELETE --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- </div>
  </div> --}}
@endsection

@push('scripts-custom')
  <script>
    $('#ubah_status').click(function() {
      let status = null;
      const id_pengumuman = $(this).data('id');
      alert("ID" + id_pengumuman);
      status = $(this).data('status');
      alert("STATUS" + status);
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{ route('rw.pengumuman.update.status') }}",
        data: {
          'status_pengumuman': status,
          'id_pengumuman': id_pengumuman
        },
        success: function(data) {
          // console.log(data);
          // console.log(data.status);
          // $('#ubah_status').data('status', data.status);
          $('#ubah_status').attr("data-status", data.status);
          if (data.status == 0) {
            //Mengubah status tidak aktif menjadi aktif
            $("#status_aja")
              .addClass("badge-success")
              .removeClass("badge-warning");
            $('#status_aja').text("Aktif");
            $("#ubah_status")
              .addClass("btn-warning")
              .removeClass("btn-success");
            $('#ubah_status').html('<span class="fa fa-edit"></span>Non Aktif');
          } else {
            //Mengubah status aktif menjadi tidak aktif
            $("#status_aja")
              .addClass("badge-warning")
              .removeClass("badge-success");
            $('#status_aja').text("Tidak Aktif");
            $("#ubah_status")
              .addClass("btn-success")
              .removeClass("btn-warning");
            $('#ubah_status').html('<span class="fa fa-edit"></span>Aktif');
          }

        }
      });
    });
  </script>
@endpush
