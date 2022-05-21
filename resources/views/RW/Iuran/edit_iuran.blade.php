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
                    @foreach($iuran as $i)
                    <form class="form theme-form" name="f1" method="POST" action="/RW/iuran/{{ $i->id_iuran }}">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $i->id_iuran }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul iuran</label>
                                        <input class="form-control" name="judul_iuran" value="{{ old('judul_iuran',$i->judul_iuran) }}" id="exampleFormControlInput1" type="text"
                                            placeholder="Iuran tong sampah" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlSelect7">Jenis iuran</label>
                                        <select class="form-select btn-pill digits" name="jenis_iuran" id="exampleFormControlSelect7">
                                            <option value="kebersihan">Iuran kebersihan</option>
                                            <option value="keamanan">Iuran keamanan</option>
                                            <option value="wajib">Iuran wajib</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Jumlah iuran</label>
                                        <input class="form-control" value="{{ old('jumlah_iuran',$i->jumlah_iuran) }}" name="jumlah_iuran" id="exampleFormControlInput1" type="number" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox-primary" type="checkbox"
                                                onclick="enable_text(this.checked)">
                                            <label for="checkbox-primary">Ada target iuran</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputPassword22">Target iuran</label>
                                        <input class="form-control" id="exampleInputPassword22" name="other_text"
                                            type="number" value="{{ old('target_iuran',$i->target_iuran) }}" disabled="" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal mulai iuran</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_mulai_iuran" value="{{ $i->tgl_mulai_iuran }}" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal selesai iuran</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_akhir_iuran" value="{{ $i->tgl_akhir_iuran }}" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <div>
                                    <label class="form-label" for="exampleFormControlTextarea4">Deskripsi iuran</label>
                                    <textarea class="form-control" name="deskripsi_iuran" id="exampleFormControlTextarea4"
                                        rows="6">{{ old('deskripsi_iuran',$i->deskripsi_iuran) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Edit</button>
                            <input class="btn btn-light" type="reset" value="Batal" />
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
