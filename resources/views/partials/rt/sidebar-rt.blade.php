<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img
            class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">RT</span></div>
        <a href="user-profile">
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
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link menu-title  link-nav {{ prefixActive('rt.kegiatan.*') }}"
                            href="{{ route('rt.kegiatan.index') }}"><i
                                data-feather="calendar"></i><span>Kegiatan</span></a>
                    </li>
                    {{-- <li>
                        <a class="nav-link menu-title link-nav" href=""><i
                                data-feather="airplay"></i><span>Pengumuman</span></a>
                    </li> --}}
                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rt.pengaduan.home') }}"><i
                                data-feather="archive"></i><span>Pengaduan</span></a>
                    </li>
                    {{-- <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rw.iuran.index') }}"><i
                                data-feather="dollar-sign"></i><span>Iuran</span></a>
                    </li> --}}
                  {{--  <li>
                         <form action="{{ route('warga.logout') }}" method="POST" id="form-id">
                            @csrf
                            <a class="nav-link menu-title link-nav"
                                onclick="document.getElementById('form-id').submit();"><i
                                    data-feather="log-out"></i><span>Keluar</span></a>
                        </form> 
                    </li>--}}
                    {{-- <li>
            <a class="nav-link menu-title  link-nav {{ prefixActive('rt.kematian.*') }}"
              href="{{ route('rt.kematian.index') }}"><i data-feather="calendar"></i><span>Kegiatan</span></a>
          </li> --}}

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
