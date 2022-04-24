@extends('layouts.main')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Form tambah iuran</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="/store-iuran">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul iuran</label>
                                        <input class="form-control" name="judul_iuran" id="exampleFormControlInput1" type="text"
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
                                        <input class="form-control" name="jumlah_iuran" id="exampleFormControlInput1" type="number" />
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
                                            type="number" disabled="" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal mulai iuran</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_mulai_iuran" value="2018-01-19T18:45:00" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal selesai iuran</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_akhir_iuran" value="2018-01-19T18:45:00" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <div>
                                    <label class="form-label" for="exampleFormControlTextarea4">Deskripsi iuran</label>
                                    <textarea class="form-control" name="deskripsi_iuran" id="exampleFormControlTextarea4"
                                        rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            <input class="btn btn-light" type="reset" value="Batal" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection