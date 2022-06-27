<!-- Page Body Start-->
<div class="page-body-wrapper sidebar-icon">
    <!-- Page Sidebar Start-->
    <header class="main-nav">
        <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ asset("assets/images/dashboard/1.png")}}" alt="">
            <div class="badge-bottom"><span class="badge badge-primary">RW</span></div><a href="{{ route('rw.profile.index') }}">
                <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->identitas_rw->nama_lengkap }}</h6>
            </a>
            <p class="mb-0 font-roboto">RW {{ auth()->user()->no_rw }}</p>
        </div>
        <nav>
            <div class="main-navbar">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="mainnav">
                    <ul class="nav-menu custom-scrollbar">
                        <li class="back-btn">
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                        </li>
                        <li class="sidebar-main-title">
                            <div>
                                <h6>RW Umban Sari</h6>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link menu-title link-nav" href="{{ route('rw.dashboard.home') }}"><i data-feather="home"></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a class="nav-link menu-title link-nav" href="{{ route('rw.warga.index') }}"><i data-feather="users"></i><span>Warga</span></a>
                        </li>
                        <li>
                            <a class="nav-link menu-title link-nav" href="{{ route('rw.kegiatan.index') }}"><i data-feather="calendar"></i><span>Kegiatan</span></a>
                        </li>
                        <li>
                            <a class="nav-link menu-title link-nav" href="{{ route('rw.pengumuman.index') }}"><i data-feather="airplay"></i><span>Pengumuman</span></a>
                        </li>
                        <li>
                            <a class="nav-link menu-title link-nav" href="{{ route('rw.pengaduan.index') }}"><i data-feather="archive"></i><span>Pengaduan</span></a>
                        </li>
                        <li>
                            <a class="nav-link menu-title link-nav" href="{{ route('rw.iuran.index') }}"><i data-feather="dollar-sign"></i><span>Iuran</span></a>
                        </li>
                        <li>
                            <a class="nav-link menu-title link-nav" href="{{ route('rw.profile.show',auth()->user()->id_rw) }}"><i data-feather="user"></i><span>Profil saya</span></a>
                        </li>
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
        </nav>
    </header>
    <!-- Page Sidebar Ends-->