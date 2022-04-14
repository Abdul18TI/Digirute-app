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
                    <form class="form theme-form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama iuran</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="text"
                                            placeholder="Iuran tong sampah" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
								<div class="col">
									<div class="mb-3">
										<label class="form-label" for="exampleFormControlSelect7">Jenis iuran</label>
										<select class="form-select btn-pill digits" id="exampleFormControlSelect7">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
								</div>
							</div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Jumlah iuran</label>
                                        <input class="form-control" id="exampleFormControlInput1" type="number"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox-primary" type="checkbox">
                                            <label for="checkbox-primary">Ada target iuran</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="row">
								<div class="col">
									<div class="mb-3">
										<label class="form-label" for="exampleInputPassword22">Target iuran</label>
										<input class="form-control" id="exampleInputPassword22" type="text" disabled="" placeholder="Disabled" />
									</div>
								</div>
							</div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal mulai iuran</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" value="2018-01-19T18:45:00" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal selesai iuran</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" value="2018-01-19T18:45:00" />
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
