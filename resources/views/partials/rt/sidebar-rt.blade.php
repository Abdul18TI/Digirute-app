<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="{{ route('rt.profileRT.show', auth()->user()->id_rt) }}"><i data-feather="settings"></i></a>
            @if (auth()->user()->identitas_rt->foto_warga == 'no-image.png') <img class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="" />
        @else
        <img class="img-90 rounded-circle" src="{{ asset('storage/' . auth()->user()->identitas_rt->foto_warga) }}" alt="" /> @endif
            <div class="badge-bottom"><span class="badge badge-primary">RT</span>
    </div>
    <a href="">
        <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->identitas_rt->nama_lengkap }}</h6>
    </a>
    <p class="mb-0 font-roboto">RT {{ auth()->user()->no_rt }} RW {{ auth()->user()->rw_rel->no_rw }}</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>RT {{ auth()->user()->no_rt }} Umban Sari</h6>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav {{ prefixActive('rt.home') }}"
                            href="{{ route('rt.home') }}"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a
                            class="nav-link menu-title  {{ prefixActive('rt.warga.*') ?? prefixActive('rt.kematian.*') }}"><i
                                data-feather="users"></i><span>Warga</span></a>
                        <ul class="nav-submenu menu-content"
                            style="display:{{ request()->routeIs('rt.warga.*') ? prefixBlock('rt.warga.*') : prefixBlock('rt.kematian.*') }};">
                            <li>
                                <a href="{{ route('rt.warga.index') }}"
                                    class="{{ prefixActive('rt.warga.*') }}">Daftar Warga</a>
                            </li>
                            <li>
                                <a href="{{ route('rt.kematian.index') }}"
                                    class="{{ prefixActive('rt.kematian.*') }}">Daftar Warga Meninggal</a>
                            </li>
                            <li>
                                <a href="{{ route('rt.kemiskinan.index') }}"
                                    class="{{ prefixActive('rt.kemiskinan.*') }}">Daftar Warga Miskin</a>
                            </li>
                            <li>
                                <a href="{{ route('rt.wargapindah.index') }}"
                                    class="{{ prefixActive('rt.wargapindah.*') }}">Daftar Warga Pindah</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title  {{ prefixActive('rt.surat.*') }}"><i
                                data-feather="inbox"></i><span>Surat</span></a>
                        <ul class="nav-submenu menu-content" style="display:{{ prefixBlock('rt.surat.*') }};">
                            <li><a href="{{ route('rt.surat.index') }}"
                                    class="{{ prefixActive('rt.surat.index') }}">Daftar Pengajuan Surat</a></li>
                            <li><a href="{{ route('rt.surat.nomorsurat') }}"
                                    class="{{ prefixActive('rw.surat.nomorsurat') }}">Nomor Surat</a></li>
                            <li><a href="{{ route('rt.surat.cekSurat') }}"
                                    class="{{ prefixActive('rt.surat.cekSurat') }}">Cek Surat</a></li>
                        </ul>
                    </li>
                       {{-- <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rt.iuran.index') }}"><i
                                data-feather="dollar-sign"></i><span>Iuran</span></a>
                    </li> --}}
                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rt.pengaduan.home') }}"><i
                                data-feather="archive"></i><span>Pengaduan</span></a>
                    </li>
                    {{-- <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rw.iuran.index') }}"><i
                                data-feather="dollar-sign"></i><span>Iuran</span></a>
                    </li> --}}

                    <li>
                        <a class="nav-link menu-title  link-nav {{ prefixActive('rt.kegiatan.*') }}"
                            href="{{ route('rt.kegiatan.index') }}"><i
                                data-feather="calendar"></i><span>Kegiatan</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title  link-nav {{ prefixActive('rt.pengumuman.*') }}"
                            href="{{ route('rt.pengumuman.index') }}"><i
                                data-feather="airplay"></i><span>Pengumuman</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title  link-nav {{ prefixActive('rt.fasilitas.*') }}"
                            href="{{ route('rt.fasilitas.index') }}"><i
                                data-feather="map"></i><span>Fasilitas</span></a>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="airplay"></i><span>Utilitas form</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('rt.kategori_pengumuman.index') }}">Kategori Pengumuman</a></li>
                            {{-- <li><a href="{{ route('rt.jenis_iuran.index') }}">Jenis Iuran</a></li> --}}
                            <li><a href="{{ route('rt.kategori_kegiatan.index') }}">Kategori Kegiatan</a></li>
                            <li><a href="{{ route('rt.kategori_pengaduan.index') }}">Kategori Pengaduan</a></li>
                            <li><a href="{{ route('rt.kategori_fasilitas.index') }}">Kategori Fasilitas</a></li>
                            {{-- <li><a href="{{ route('rt.agama.index') }}">Agama</a></li> --}}
                        </ul>
                    </li>
                    {{-- <li>
                         <form action="{{ route('warga.logout') }}" method="POST" id="form-id">
                            @csrf
                            <a class="nav-link menu-title link-nav"
                                onclick="document.getElementById('form-id').submit();"><i
                                    data-feather="log-out"></i><span>Keluar</span></a>
                        </form>
                    </li> --}}
                    {{-- <li>
            <a class="nav-link menu-title  link-nav {{ prefixActive('rt.kematian.*') }}"
              href="{{ route('rt.kematian.index') }}"><i data-feather="calendar"></i><span>Kegiatan</span></a>
          </li> --}}

                </ul>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
        </div>
    </nav>
</header>
