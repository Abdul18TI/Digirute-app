@extends('layouts.main-rt')
@section('title')
    Edit Iuran
    {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href={{ asset("assets/css/trix.css")}}>
    {{-- <script type="text/javascript" src={{ asset("assets/js/trix.js")}}></script> --}}
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
        trix-toolbar {
  pointer-events: none;
}
        
    </style>
@endpush

@section('container')
@component('components.r-w.breadcrumb')
        @slot('breadcrumb_title')
        <h3>Iuran</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('rt.iuran.index') }}">Iuran</a></li>
        <li class="breadcrumb-item active">Edit iuran</li>
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form edit iuran</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="{{route('rt.iuran.update', $iuran->id_iuran)}}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $iuran->id_iuran }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul Iuran</label>
                                        <input class="form-control" name="judul_iuran" value="{{ old('judul_iuran',$iuran->judul_iuran) }}" id="exampleFormControlInput1" type="text"
                                            placeholder="Iuran tong sampah" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect7">Jenis Iuran</label>
                                        <select class="form-control" name="jenis_iuran" id="exampleFormControlSelect7" disabled>
                                            @foreach ($jenis_iuran as $j)
                                            @if(old('jenis_iuran', $j->id_jenis_iuran) == $j->id_jenis_iuran)
                                                <option value="{{ $j->id_jenis_iuran }}" selected>{{ $j->nama_jenis_iuran }}</option>
                                            @else
                                                <option value="{{ $j->id_jenis_iuran }}">{{ $j->nama_jenis_iuran }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="checkbox">
                                            <input id="checkbox-primary2" type="checkbox" disabled {{ $iuran->target_iuran != null ? 'checked':''}}  >
                                            <label for="checkbox-primary2">Ada Target Jumlah Iuran ? </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword22">Jumlah Target Iuran</label>
                                        <input class="form-control" id="exampleInputPassword22" name="target_iuran"
                                            type="number" value="{{ old('target_iuran',$iuran->target_iuran) }}" disabled="true" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox-primary" type="checkbox" disabled {{ $iuran->jumlah_iuran != null ? 'checked':''}} >
                                            <label for="checkbox-primary">Ada Target Iuran Perorang ?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Target Iuran Perorang</label>
                                        <input class="form-control" disabled="false" value="{{ old('jumlah_iuran',$iuran->jumlah_iuran) }}" name="jumlah_iuran" id="exampleFormControlInput1" type="number" readonly/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <label class="form-label">Tanggal Mulai Iuran</label>
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_mulai_iuran" value="{{ $iuran->tgl_mulai_iuran }}" readonly />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Tanggal Selesai Iuran</label>
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_akhir_iuran" value="{{ $iuran->tgl_akhir_iuran }}" readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="deskripsi_iuran">Deskripsi Iuran</label>
                                        <input id="deskripsi_iuran" type="hidden" name="deskripsi_iuran" value="{{ old('deskripsi_iuran',$iuran->deskripsi_iuran) }}" readonly>
                                        <trix-editor input="deskripsi_iuran"></trix-editor>
                                    </div>
                                    @error('deskripsi_iuran')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a class="btn btn-light" href="{{ url()->previous() }}">Kembali</a>
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
        //  document.querySelector("deskripsi_iuran").contentEditable = false
         document.querySelector('trix-editor').editor.element.setAttribute('contentEditable', false)
        function previewImage(){
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

        $(document).ready(function () {
            $('#dataTable').DataTable()
        })
    
        function enable_text(status) {
            if(status){
                document.f1.target_iuran.disabled = false;
            }else{
                document.f1.target_iuran.disabled = true;
                document.f1.target_iuran.value = "";
            }
        }
        function enable_text2(status) {
            if(status){
                document.f1.jumlah_iuran.disabled = false;
            }else{
                document.f1.jumlah_iuran.disabled = true;
                document.f1.jumlah_iuran.value = "";
              }
        }
    </script>
    @endpush
    
    

