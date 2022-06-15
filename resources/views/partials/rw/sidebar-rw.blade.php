<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img
            class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">RT</span></div>
        <a href="user-profile">
            <h6 class="mt-3 f-14 f-w-600">Nama lengkap</h6>
            {{-- <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->identitas_rt->nama_lengkap }}</h6> --}}
        </a>
        <p class="mb-0 font-roboto">RT 1 RW 1</p>
        {{-- <p class="mb-0 font-roboto">RT {{ auth()->user()->no_rt }} RW {{ auth()->user()->rw_rel->no_rw }}</p> --}}
    </div>
    <nav>
        <header class="main-nav">
            <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ asset("assets/images/dashboard/1.png")}}" alt="">
                <div class="badge-bottom"><span class="badge badge-primary">RW</span></div><a href="user-profile.html">
                    <h6 class="mt-3 f-14 f-w-600">Sahid</h6>
                </a>
                <p class="mb-0 font-roboto">RW 04</p>
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
                                <a class="nav-link menu-title link-nav" href="{{ route('warga.index') }}"><i data-feather="users"></i><span>Warga</span></a>
                            </li>
                            <li>
                                <a class="nav-link menu-title link-nav" href="{{ route('kegiatan.index') }}"><i data-feather="calendar"></i><span>Kegiatan</span></a>
                            </li>
                            <li>
                                <a class="nav-link menu-title link-nav" href="{{ route('pengumuman.index') }}"><i data-feather="airplay"></i><span>Pengumuman</span></a>
                            </li>
                            <li>
                                <a class="nav-link menu-title link-nav" href="{{ route('iuran.index') }}"><i data-feather="dollar-sign"></i><span>Iuran</span></a>
                            </li>
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