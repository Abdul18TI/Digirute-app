<!-- Page Body Start-->
<div class="page-body-wrapper sidebar-icon">
    <!-- Page Sidebar Start-->
    <header class="main-nav">
        <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ asset("assets/images/dashboard/1.png")}}" alt="">
            <div class="badge-bottom"><span class="badge badge-primary">RW</span></div><a href="">
                <h6 class="mt-3 f-14 f-w-600">Sahid</h6>
            </a>
            <p class="mb-0 font-roboto">RW 04</p>
            <!-- <ul>
                <li><span><span class="counter">19.8</span>k</span>
                    <p>Follow</p>
                </li>
                <li><span>2 year</span>
                    <p>Experince</p>
                </li>
                <li><span><span class="counter">95.2</span>k</span>
                    <p>Follower </p>
                </li>
            </ul> -->
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
                            <a class="nav-link menu-title link-nav" href="{{ route('admin.dashboard.home') }}"><i data-feather="home"></i><span>Dashboard</span></a>
                        </li>
                        <li>
                        <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Utilitas form</span></a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="{{ route('kategori_pengumuman.index') }}">Kategori pengumuman</a></li>
                                <li><a href="{{ route('rt.jenis_iuran.index') }}">Jenis iuran</a></li>
                                <li><a href="{{ route('kategori_kegiatan.index') }}">Kategori kegiatan</a></li>
                                <li><a href="{{ route('rt.agama.index') }}">Agama</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Kelola RTRW</span></a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="{{ route('rt.index') }}">Daftar RT</a></li>
                                <li><a href="{{ route('rw.index') }}">Daftar RW</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
        </nav>
    </header>
    <!-- Page Sidebar Ends-->