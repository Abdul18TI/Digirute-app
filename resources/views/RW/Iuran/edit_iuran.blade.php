@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form edit iuran</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="/RW/iuran/{{ $iuran->id_iuran }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $iuran->id_iuran }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul iuran</label>
                                        <input class="form-control" name="judul_iuran" value="{{ old('judul_iuran',$iuran->judul_iuran) }}" id="exampleFormControlInput1" type="text"
                                            placeholder="Iuran tong sampah" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect7">Jenis iuran</label>
                                        <select class="form-select btn-pill digits" name="jenis_iuran" id="exampleFormControlSelect7">
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
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox-primary2" type="checkbox"
                                                onclick="enable_text2(this.checked)" value="">
                                            <label for="checkbox-primary2">Ada Target Jumlah Iuran ?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Jumlah Target Iuran</label>
                                        <input class="form-control" disabled="false" value="{{ old('jumlah_iuran',$iuran->jumlah_iuran) }}" name="jumlah_iuran" id="exampleFormControlInput1" type="number" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox-primary" type="checkbox"
                                                onclick="enable_text(this.checked)">
                                            <label for="checkbox-primary">Ada Target Iuran Perorang ?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword22">Target Iuran Peroarang</label>
                                        <input class="form-control" id="exampleInputPassword22" name="other_text"
                                            type="number" value="{{ old('target_iuran',$iuran->target_iuran) }}" disabled="" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal mulai iuran</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_mulai_iuran" value="{{ $iuran->tgl_mulai_iuran }}" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal selesai iuran</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_akhir_iuran" value="{{ $iuran->tgl_akhir_iuran }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="deskripsi_iuran">deskripsi iuran</label>
                                        <input id="deskripsi_iuran" type="hidden" name="deskripsi_iuran" value="{{ old('deskripsi_iuran',$iuran->deskripsi_iuran) }}">
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
                            <button class="btn btn-primary" type="submit">Edit</button>
                            <input class="btn btn-light" type="reset" value="Batal" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
