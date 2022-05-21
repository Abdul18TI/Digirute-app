@extends('layouts.main')

@section('container')
<div class="page-body">
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
                        <h5>Form tambah iuran</h5>
                    </div>
                    <form class="form theme-form" name="f1" method="POST" action="{{ route('iuran.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Judul iuran</label>
                                        <input class="form-control" value="{{ old('judul_iuran') }}" name="judul_iuran" id="exampleFormControlInput1" type="text"/>
                                        @error('judul_iuran')
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
                                        <label class="form-label" for="exampleFormControlSelect7">Jenis iuran</label>
                                        <select class="form-select btn-pill digits" name="jenis_iuran" id="exampleFormControlSelect7">
                                            @foreach ($jenis_iuran as $j)
                                                @if(old('jenis_iuran') == $j->id_jenis_iuran)
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
                                        <label class="form-label" for="exampleFormControlInput1">Jumlah iuran</label>
                                        <input class="form-control" value="{{ old('jumlah_iuran') }}" name="jumlah_iuran" id="exampleFormControlInput1" type="number" />
                                    </div>
                                    @error('jumlah_iuran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
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
                                        @error('tgl_mulai_iuran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">Tanggal selesai iuran</label>
                                <div class="col-sm-9">
                                    <input class="form-control digits" id="example-datetime-local-input"
                                        type="datetime-local" name="tgl_akhir_iuran" value="2018-01-19T18:45:00" />
                                        @error('tgl_akhir_iuran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="deskripsi_iuran">Deskripsi iuran</label>
                                        <input id="deskripsi_iuran" type="hidden" value="{{ old('deskripsi_iuran') }}" name="deskripsi_iuran">
                                        <trix-editor input="deskripsi_iuran"></trix-editor>
                                    </div>
                                    @error('deskripsi_iuran')
                                    <a class="text-danger">
                                        {{ $message }}
                                    </a>
                                    @enderror
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