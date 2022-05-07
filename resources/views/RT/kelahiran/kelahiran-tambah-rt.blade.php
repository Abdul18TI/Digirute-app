@extends('layouts.main-rt')

@section('container')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Tambah data kelahiran</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Tambah Warga -->
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<form class="needs-validation" novalidate="">
                                <h6 class="mb-4">Informasi kelahiran</h6>
							<div class="row g-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom01">Desa / Kelurahan</label>
									<input class="form-control" id="validationCustom01" type="text" placeholder="Desa / Kelurahan" value="" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kecamatan</label>
									<input class="form-control" id="validationCustom02" type="text" placeholder="Kecamatan" value="" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kabutan / Kota</label>
									<input class="form-control" id="validationCustom02" type="text" placeholder="Kabutan / Kota" value="" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Nama Kepala Keluarga</label>
									<input class="form-control" id="validationCustom02" type="text" placeholder="Nama Kepala Keluarga" value="" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Nomor Kartu Keluarga</label>
									<input class="form-control" id="validationCustom02" type="text" placeholder="Nomor Kartu Keluarga" value="" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
                            <hr>
                                <h6 class="mb-4">Bayi / Anak</h6>
                            <div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom01">Nama</label>
									<input class="form-control" id="validationCustom01" placeholder="Nama" type="text" value="" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Jenis Kelamin</label>
                                    <div class="col">
                                        <div class="form-group m-checkbox-inline mb-0">
                                          <div class="checkbox checkbox-dark">
                                            <input id="inline-1" type="checkbox">
                                            <label for="inline-1">Laki-laki</label>
                                          </div>
                                          <div class="checkbox checkbox-dark">
                                            <input id="inline-2" type="checkbox">
                                            <label for="inline-2">Perempuan</span></label>
                                          </div>
                                        </div>
                                      </div>
                                </div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationDefault04">Tempat dilahirkan</label>
									<select class="form-select" id="validationDefault04" required="">
										<option selected="" disabled="" value="">Choose...</option>
										<option>...</option>
									</select>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Tempat kelahiran</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Tanggal kelahiran</label>
									<input class="form-control digits" type="date" value="2018-01-01" />
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Pukul</label>
									<input class="form-control digits" type="time" value="21:45:00" />
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Jenis kelahiran</label>
									<select class="form-select" id="validationDefault04" required="">
										<option selected="" disabled="" value="">Choose...</option>
										<option>...</option>
									</select>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kelahiran ke</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Penolong kelahiran</label>
									<select class="form-select" id="validationDefault04" required="">
										<option selected="" disabled="" value="">Choose...</option>
										<option>...</option>
									</select>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Berat</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Panjang bayi</label>
									<input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
                            <hr>
                                <h6 class="mb-4">Ibu</h6>
                            <div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom01">First name</label>
									<input class="form-control" id="validationCustom01" type="text" placeholder="NIK" value="" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Nama</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
                                <div class="col-md-4">
									<label class="form-label" for="validationCustom02">Tanggal lahir</label>
									<input class="form-control digits" type="date" value="2018-01-01" />
								</div>
							</div>
							<div class="row g-3 mt-3">
                                <div class="col-md-4">
									<label class="form-label" for="validationDefault04">Pekerjaan</label>
									<select class="form-select" id="validationDefault04" required="">
										<option selected="" disabled="" value="">Choose...</option>
										<option>...</option>
									</select>
								</div>
                                <div class="col-md-4">
									<label class="form-label" for="validationCustom02">Alamat</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Provinsi</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kecamatan</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Desa / Lurah</label>
									<input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kewarganegaraan</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kebangsaan</label>
									<input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
                                <div class="col-md-4">
									<label class="form-label" for="validationCustom02">Tanggal Pencatatan Perkawinan</label>
									<input class="form-control digits" type="date" value="2018-01-01" />
								</div>
							</div>
                            <hr>
                                <h6 class="mb-4">Ayah</h6>
                            <div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom01">NIK</label>
									<input class="form-control" id="validationCustom01"placeholder="NIK" type="text" value="" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Nama</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
                                <div class="col-md-4">
									<label class="form-label" for="validationCustom02">Tanggal lahir</label>
									<input class="form-control digits" type="date" value="2018-01-01" />
								</div>
							</div>
							<div class="row g-3 mt-3">
                                <div class="col-md-4">
									<label class="form-label" for="validationDefault04">Pekerjaan</label>
									<select class="form-select" id="validationDefault04" required="">
										<option selected="" disabled="" value="">Choose...</option>
										<option>...</option>
									</select>
								</div>
                                <div class="col-md-4">
									<label class="form-label" for="validationCustom02">Alamat</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Provinsi</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kecamatan</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Desa / Lurah</label>
									<input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
							<div class="row g-3 mt-3">
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kewarganegaraan</label>
									<input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
								<div class="col-md-4">
									<label class="form-label" for="validationCustom02">Kebangsaan</label>
									<input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
									<div class="valid-feedback">Looks good!</div>
								</div>
							</div>
                            <hr>
                                <h6 class="mb-4">Pelapor</h6>
                            <div class="row g-3 mt-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom02">NIK</label>
                                        <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                            </div>
                            <div class="row g-3 mt-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom02">Nama</label>
                                        <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label" for="validationCustom02">Umur</label>
                                        <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom02">Jenis Kelamin</label>
                                        <div class="col">
                                            <div class="form-group m-checkbox-inline mb-0">
                                              <div class="checkbox checkbox-dark">
                                                <input id="inline-1" type="checkbox">
                                                <label for="inline-1">Laki-laki</label>
                                              </div>
                                              <div class="checkbox checkbox-dark">
                                                <input id="inline-2" type="checkbox">
                                                <label for="inline-2">Perempuan</label>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                            </div>
                            <div class="row g-3 mt-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationDefault04">Pekerjaan</label>
                                            <select class="form-select" id="validationDefault04" required="">
                                                <option selected="" disabled="" value="">Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Alamat</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                            </div>
                            <div class="row g-3 mt-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Provinsi</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                            </div>
                            <div class="row g-3 mt-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Kecamatan</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                            </div>
                            <div class="mb-5">
							</div>
                            <hr>
                                <h6 class="mb-4">Saksi 1</h6>
                            <div class="row g-3 mt-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom02">NIK</label>
                                        <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                            </div>
                            <div class="row g-3 mt-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom02">Nama</label>
                                        <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label" for="validationCustom02">Umur</label>
                                        <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                            </div>
                            <div class="row g-3 mt-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationDefault04">Alamat</label>
                                            <select class="form-select" id="validationDefault04" required="">
                                                <option selected="" disabled="" value="">Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Pekerjaan</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                            </div>
                            <div class="row g-3 mt-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Provinsi</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                            </div>
                            <div class="row g-3 mt-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Kecamatan</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Desa / Lurah</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                            </div>
                            <div class="mb-5">
							</div>
                            <hr>
                                <h6 class="mb-4">Saksi 2</h6>
                            <div class="row g-3 mt-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom02">NIK</label>
                                        <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                            </div>
                            <div class="row g-3 mt-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="validationCustom02">Nama</label>
                                        <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label" for="validationCustom02">Umur</label>
                                        <input class="form-control" id="validationCustom02" type="number" value="Otto" required="" />
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                            </div>
                            <div class="row g-3 mt-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationDefault04">Alamat</label>
                                            <select class="form-select" id="validationDefault04" required="">
                                                <option selected="" disabled="" value="">Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Pekerjaan</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                            </div>
                            <div class="row g-3 mt-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Provinsi</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Kabupaten / Kota</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                            </div>
                            <div class="row g-3 mt-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Last name</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Last name</label>
                                            <input class="form-control" id="validationCustom02" type="text" value="Otto" required="" />
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                            </div>
                            <div class="mb-5">
							</div>
                            <hr>
							<button class="btn btn-primary" type="submit">Submit form</button>
						</form>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
