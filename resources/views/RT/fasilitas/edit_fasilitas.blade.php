@extends('layouts.main-rt')
@section('title')
    Edit Fasilitas Umum
    {{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href={{ asset('assets/css/trix.css') }}>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
@endpush

@section('container')
@component('components.r-t.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Fasilitas</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.fasilitas.index') }}">Fasilitas</a></li>
        <li class="breadcrumb-item active">Edit fasilitas</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if ($errors->any())
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Terjadi kesalahan</strong>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form edit fasilitas</h5>
                    </div>
                    <form class="form theme-form" method="POST" enctype="multipart/form-data"
            action="{{ route('rt.fasilitas.update', $fasilitas->id_fasilitas_umum) }}">
            @method('put')
            @csrf
            <input type="hidden" name="id" value="{{ $fasilitas->id_fasilitas_umum }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama fasilitas</label>
                                        <input class="form-control @error('fasilitas_umum') is-invalid @enderror" name="fasilitas_umum" id="exampleFormControlInput1" type="text" autofocus value="{{ old('fasilitas_umum',$fasilitas->fasilitas_umum) }}"/>
                                        @error('fasilitas_umum')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Kategori fasilitas</label>
                                        <select class="form-select" name="kategori_fasilitas_umum" id="validationDefault04" required>
                                            @foreach ($kategori_fasilitas as $k)
                                                @if(old('kategori_fasilitas_umum',$fasilitas->kategori_fasilitas_umum) == $k->id_kategori_fasilitas)
                                                    <option value="{{ $k->id_kategori_fasilitas }}" selected>{{ $k->kategori_fasilitas }}</option>
                                                @else
                                                    <option value="{{ $k->id_kategori_fasilitas }}">{{ $k->kategori_fasilitas }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="deskripsi_fasilitas">Deskirpsi fasilitas</label>
                                        <input id="deskripsi_fasilitas" type="hidden" value="{{ old('deskripsi_fasilitas',$fasilitas->deskripsi_fasilitas) }}" name="deskripsi_fasilitas">
                                        <trix-editor input="deskripsi_fasilitas"></trix-editor>
                                    </div>
                                    @error('deskripsi_fasilitas')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="mb-3 row">
                                    <label class="form-label">Foto fasilitas</label>
                                    <input type="hidden" name="oldImage" value="{{ $fasilitas->foto_fasilitas }}">
                                    <div class="col-sm-9">
                                      <input class="form-control" name="foto_fasilitas" onchange="previewImage()" id="image"
                                        type="file" />
                                        <small class="text-muted">* Ukuran Maksimal File 4 Mb</small>
                                      <figure class="col-xl col-md xl-60 mt-3" itemprop="associatedMedia" itemscope="">
                                        @if ($fasilitas->foto_fasilitas)
                                          <a href="{{ asset('storage/' . $fasilitas->foto_fasilitas) }}" itemprop="contentUrl"
                                            data-size="1600x950">
                                            <img class="img-preview img-thumbnail"
                                              src="{{ asset('storage/' . $fasilitas->foto_fasilitas) }}" itemprop="thumbnail"
                                              alt="Image description" />
                                          </a>
                                        @else
                                          <a href="{{ asset('assets/images/big-lightgallry/01.jpg') }}" itemprop="contentUrl"
                                            data-size="1600x950">
                                            <img class="img-preview img-thumbnail"
                                              src="{{ asset('assets/images/lightgallry/01.jpg') }}" itemprop="thumbnail"
                                              alt="Image description" />
                                          </a>
                                        @endif
                                      </figure>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Alamat fasilitas</label>
                                        <input class="form-control @error('alamat_fasilitas') is-invalid @enderror" name="alamat_fasilitas" id="exampleFormControlInput1" type="text" autofocus value="{{ old('alamat_fasilitas',$fasilitas->alamat_fasilitas) }}"/>
                                        @error('alamat_fasilitas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Koordinat fasilitas</label>
                                        <input class="form-control @error('koordinant_fasilitas') is-invalid @enderror" name="koordinant_fasilitas" id="exampleFormControlInput1" type="text" autofocus value="{{ old('koordinant_fasilitas',$fasilitas->koordinant_fasilitas) }}"/>
                                        @error('koordinant_fasilitas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                             <button class="btn btn-primary" type="submit">Edit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <a class="btn btn-light" href="{{ url()->previous() }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script type="text/javascript" src={{ asset('assets/js/trix.js') }}></script>
@endpush

@push('scripts-custom')
    <script>
        $('#show_map').click(function() {
            var teks = $("textarea[name=koordinant_fasilitas]").val();

            $("#map-fasilitas").prepend(teks);
        });
        Trix.config.blockAttributes.default.tagName = "p";

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endpush
