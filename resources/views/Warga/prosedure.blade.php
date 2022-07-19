@extends('layouts.main-warga')

@section('title')
    Persyaratan Administratif
    {{ $title }}
@endsection

@push('css')
@endpush

@section('container')
    @component('components.warga.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Persyaratan Administratif</h3>
        @endslot
        {{-- <li class="breadcrumb-item">Pengaduan</li> --}}
        <li class="breadcrumb-item active">Persyaratan Administratif</li>
    @endcomponent
    <div class="col-sm-12">
        <div class="card">
            {{-- <div class="card-header pb-0">
                <h5>Persyaratan Administratif</h5>
            </div> --}}
            <div class="card-body row pricing-content pricing-col">
                <div class="row mb-5">
                    {{-- Membuat KTP Perdana --}}
                    <div class="col-md-3">
                        <div class="pricing-block card text-center">
                            <div class="pricing-header">
                                <h2>Membuat KTP Perdana</h2>

                            </div>
                            <div class="pricing-list ">
                                <ul class="pricing-inner">
                                    <li>
                                        <h6><span> Fotokopi</span> Kartu Keluarga</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> Akta Lahir</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> Ijazah Terakhir</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- END Membuat KTP Perdana --}}

                    {{-- Membuta KTP Baru Karena Rusak --}}
                    <div class="col-md-3">
                        <div class="pricing-block card text-center">
                            <div class="pricing-header">
                                <h2>Membuta KTP Baru Karena Rusak</h2>
                                {{-- <div class="price-box">
                                <div>
                                    <h3>$30</h3>
                                    <p>/ month</p>
                                </div>
                            </div> --}}
                            </div>
                            <div class="pricing-list ">
                                <ul class="pricing-inner">
                                    <li>
                                        <h6><span> Fotokopi</span> Kartu Keluarga</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> KTP</h6>
                                    </li>
                                </ul>
                                {{-- <button class="btn btn-primary btn-lg" type="button" data-original-title="btn btn-primary btn-lg" title="">Download Form</button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- END Membuta KTP Baru Karena Rusak --}}

                    {{-- Membuat / Mengganti KK Baru --}}
                    <div class="col-md-3">
                        <div class="pricing-block card text-center">
                            <div class="pricing-header">
                                <h2>Membuat KK Baru</h2>
                                <span class="text-muted">Menambah Anggota Keluarga</span>
                            </div>
                            <div class="pricing-list ">
                                <ul class="pricing-inner">
                                    <li>
                                        <h6><span> Fotokopi</span> Kartu Keluarga</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> KTP</h6>
                                    </li>
                                </ul>
                                {{-- <button class="btn btn-primary btn-lg" type="button" data-original-title="btn btn-primary btn-lg" title="">Download Form</button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- END Membuat / Mengganti KK Baru --}}

                    {{-- Membuat / Mengganti KK Baru --}}
                    <div class="col-md-3">
                        <div class="pricing-block card text-center">
                            <div class="pricing-header">
                                <h2>Membuat KK Baru</h2>
                                <span class="text-muted">Pisah KK <p>(Karena Ikut Suami/Istri)</p></span>
                            </div>
                            <div class="pricing-list ">
                                <ul class="pricing-inner">
                                    <li>
                                        <h6><span> Fotokopi</span> Kartu Keluarga</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> KTP</h6>
                                    </li>
                                </ul>
                                {{-- <button class="btn btn-primary btn-lg" type="button" data-original-title="btn btn-primary btn-lg" title="">Download Form</button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- END Membuat / Mengganti KK Baru --}}
                </div>
                <div class="row mb-5 justify-content-center">
                    {{-- END Mengurus Nikah --}}
                    <div class="col-md-3">
                        <div class="pricing-block card text-center">
                            <div class="pricing-header">
                                <h2>Mengurus Nikah</h2>
                                {{-- <div class="price-box">
                                <div>
                                    <h3>$30</h3>
                                    <p>/ month</p>
                                </div>
                            </div> --}}
                            </div>
                            <div class="pricing-list ">
                                <ul class="pricing-inner">
                                    <li>
                                        <h6><span> Fotokopi</span> Kartu Keluarga</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> KTP Pribadi</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> KTP Ibu dan Ayah atau Wali</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> Surat Nikah</h6>
                                    </li>
                                    <li>
                                        <h6><span>Surat</span> Pernyataan Status Perkawinan</h6>
                                    </li>
                                </ul>
                                {{-- <button class="btn btn-primary btn-lg" type="button" data-original-title="btn btn-primary btn-lg" title="">Download Form</button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- END Mengurus Nikah --}}

                    {{-- Mengurus Akta Lahir Anak --}}
                    <div class="col-md-3">
                        <div class="pricing-block card text-center">
                            <div class="pricing-header">
                                <h2>Mengurus Akta Lahir Anak</h2>
                                <span class="text-muted">(Baru Lahir)</span>

                            </div>
                            <div class="pricing-list ">
                                <ul class="pricing-inner">
                                    <li>
                                        <h6><span> Fotokopi</span> Kartu Keluarga</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> KTP Ibu</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> KTP Ayah</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> Surat Nikah</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> 2 Orang Saksi</h6>
                                    </li>
                                </ul>
                                {{-- <button class="btn btn-primary btn-lg" type="button" data-original-title="btn btn-primary btn-lg" title="">Download Form</button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- END Mengurus Akta Lahir Anak --}}

                    {{-- <h2>Mengurus Kehilangan Dokumen</h2> --}}
                    <div class="col-md-3">
                        <div class="pricing-block card text-center">
                            <div class="pricing-header">
                                <h2>Mengurus Kehilangan Dokumen</h2>
                                {{-- <div class="price-box">
                                <div>
                                    <h3>$30</h3>
                                    <p>/ month</p>
                                </div>
                            </div> --}}
                            </div>
                            <div class="pricing-list ">
                                <ul class="pricing-inner">
                                    <li>
                                        <h6><span> Fotokopi</span> Kartu Keluarga</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> KTP</h6>
                                    </li>
                                    <li>
                                        <h6><span> Fotokopi</span> Dokumen Yang Hilang (Jika Tersedia)</h6>
                                    </li>
                                    <li>
                                        <h6><span>Surat</span> Keterangan Kepolisian</h6>
                                    </li>
                                </ul>
                                {{-- <button class="btn btn-primary btn-lg" type="button" data-original-title="btn btn-primary btn-lg" title="">Download Form</button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- END Mengurus Kehilangan Dokumen --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Zero Configuration  Ends-->
@endsection
