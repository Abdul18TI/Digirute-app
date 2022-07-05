@extends('layouts.main-rw')

@section('title')
  Detail Kegiatan
  {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
  @component('components.r-w.breadcrumb')
    @slot('breadcrumb_title')
      <h3>
        Detail Kegiatan</h3>
    @endslot
    <li class="breadcrumb-item"><a href="{{ route('rw.kegiatan.index') }}">Kegiatan</a></li>
    <li class="breadcrumb-item active">Detail Kegiatan</li>
  @endcomponent

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-single">
          <div class="blog-box blog-details">
            @if($kegiatan->foto_kegiatan == 'no-image.jpg')
                        
						@else
                        <div class="banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="{{asset('storage/'. $kegiatan->foto_kegiatan)}}" alt="blog-main" /></div>
                        @endif
            <div class="card">
              <div class="card-body">
                <div class="blog-details">
                  <ul class="blog-social">
                    <li class="middle">Publish : {{ $kegiatan->tanggal_publish == true ? $kegiatan->tanggal_publish : $kegiatan->created_at->diffForHumans()  }}</li>
                    <li class="middle">Status :
                      @if ($kegiatan->status_kegiatan == 1)
                        <span id="status_aja" class="badge badge-success">Aktif</span>
                      @else
                        <span id="status_aja" class="badge badge-warning">Tidak Aktif</span>
                      @endif
                      </span>
                    </li>
                  </ul>
                  <h4>
                    {{ $kegiatan->nama_kegiatan }}
                  </h4>
                  <div class="single-blog-content-top txt-dark">
                    {!! $kegiatan->isi_kegiatan !!}.
                  </div>
                  <h6>Waktu</h5>
                    <div class="single-blog-content-top txt-dark mb-2">
                      <p>
                        <strong>Tanggal Mulai Kegiatan :</strong>
                        {{ tanggal_waktu_indo($kegiatan->tgl_mulai_kegiatan) }}
                      </p>
                      <p>
                        <strong>Tanggal Selesai Kegiatan :</strong>
                        {{ tanggal_waktu_indo($kegiatan->tgl_selesai_kegiatan) }}
                      </p>
                    </div>
                    @if($kegiatan->foto_kegiatan != 'no-image.jpg')
                    <h6>Lampiran</h5>
                      <div class="single-blog-content-top txt-dark">
                        <p class="text-center">
                          <img class="img-fluid w-75 " src="{{ asset('storage/' . $kegiatan->foto_kegiatan) }}"
                            alt="Foto {{$kegiatan->nama_kegiatan}} " />
                        </p>
                      </div>
                      @else
                      @endif
                </div>
              </div>
              <div class="card-footer text-end">
                {{-- TOMBOL AKTIF NON AKTIF --}}
                <button class='btn @php echo $kegiatan->status_kegiatan == 0 ? 'btn-success' : 'btn-warning' @endphp
                  btn-lg' id="ubah_status" data-id="{{ $kegiatan->id_kegiatan }}"
                  data-status="{{ $kegiatan->status_kegiatan == 1 ? 0:1 }}"
                  href="{{ route('rw.kegiatan.edit', $kegiatan->id_kegiatan) }}"><span class="fa fa-edit"></span>
                  {{ $kegiatan->status_kegiatan == 0 ? 'Aktif' : 'Non-Aktif' }}</button>
                {{-- END TOMBOL AKTIF NON AKTIF --}}

                {{-- TOMBOL EDIT --}}
                <a class="btn btn-secondary btn-lg"
                  href="{{ route('rw.kegiatan.edit', $kegiatan->id_kegiatan) }}"><span
                    class="fa fa-edit"></span>Edit</a>
                {{-- END TOMBOL EDIT --}}

                {{-- TOMBOL DELETE --}}
                <form method="POST" action="{{ route('rw.kegiatan.destroy', $kegiatan->id_kegiatan) }}"
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
      const id_kegiatan = $(this).data('id');
      alert("ID" + id_kegiatan);
      status = $(this).data('status');
      alert("STATUS" + status);
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{ route('rw.kegiatan.update.status') }}",
        data: {
          'status_kegiatan': status,
          'id_kegiatan': id_kegiatan
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
