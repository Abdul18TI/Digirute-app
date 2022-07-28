<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="{{ route('rw.profile.show', auth()->user()->id_rw) }}"><i data-feather="settings"></i></a>
        @if (auth()->user()->identitas_rw->foto_warga == 'no-image.png')
            <img class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="" />
        @else
            <img class="img-90 rounded-circle" src="{{ asset('storage/' . auth()->user()->identitas_rw->foto_warga) }}"
                alt="" />
        @endif
        <div class="badge-bottom"><span class="badge badge-primary">RW</span></div>
        <a href="">
            {{-- <h6 class="mt-3 f-14 f-w-600">Nama lengkap</h6> --}}
            <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->identitas_rw->nama_lengkap }}</h6>
        </a>
        {{-- <p class="mb-0 font-roboto">RT 1 RW 1</p> --}}
        <p class="mb-0 font-roboto">RW {{ auth()->user()->no_rw }}</p>
    </div>
    <nav>
        {{-- <header class="main-nav">
            <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ asset("assets/images/dashboard/1.png")}}" alt="">
                <div class="badge-bottom"><span class="badge badge-primary">RW</span></div><a href="{{ route('rw.profile.show',auth()->user()->id_rw) }}">
                    <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->identitas_rw->nama_lengkap }}</h6>
            </a>
            <p class="mb-0 font-roboto">RW {{ auth()->user()->no_rw }}</p>
            </div>
            <nav> --}}
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>RW Umban Sari</h6>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rw.dashboard.home') }}"><i
                                data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('rw.warga.*') }}"><i
                                data-feather="users"></i><span>Warga</span></a>
                        <ul class="nav-submenu menu-content" style="display:{{ prefixBlock('rw.surat.*') }};">
                            <li><a href="{{ route('rw.warga.index') }}" class="{{ prefixActive('rw.warga.index') }}">Daftar Warga</a></li>
                            <li><a href="{{ route('rw.wargaw.tetapw') }}" class="{{ prefixActive('rw.wargaw.tetapw') }}">Daftar Warga Tetap</a></li>
                            <li><a href="{{ route('rw.warga.index') }}" class="{{ prefixActive('rw.wargatw.pendatanw') }}">Daftar Warga Tidak Tetap</a></li>
                            <li><a href="{{ route('rw.warga.index') }}" class="{{ prefixActive('rw.wargaww.wargaww') }}">Daftar Kepala Keluarga</a></li>
                            <li><a href="{{ route('rw.warga.index') }}" class="{{ prefixActive('rw.warga.index') }}">Daftar Warga Miskin</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title  {{ prefixActive('rw.surat.*') }}"><i
                                data-feather="inbox"></i><span>Surat</span></a>
                        <ul class="nav-submenu menu-content" style="display:{{ prefixBlock('rw.surat.*') }};">
                            <li><a href="{{ route('rw.surat.index') }}"
                                    class="{{ prefixActive('rw.surat.index') }}">Daftar Pengajuan Surat</a></li>
                            <li><a href="{{ route('rw.surat.nomorsurat') }}"
                                    class="{{ prefixActive('rw.surat.nomorsurat') }}">Nomor Surat</a></li>
                             <li><a href="{{ route('rw.surat.cekSurat') }}"
                                    class="{{ prefixActive('rw.surat.cekSurat') }}">Cek Surat</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rw.kegiatan.index') }}"><i
                                data-feather="calendar"></i><span>Kegiatan</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rw.pengumuman.index') }}"><i
                                data-feather="airplay"></i><span>Pengumuman</span></a>
                    </li>

                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rw.pengaduan.index') }}"><i
                                data-feather="archive"></i><span>Pengaduan</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title  link-nav {{ prefixActive('rw.fasilitasrw.*') }}"
                            href="{{ route('rw.fasilitasrw.index') }}"><i
                                data-feather="map"></i><span>Fasilitas</span></a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<!-- Page Sidebar Ends-->
</nav>
</header>
