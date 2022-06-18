<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img
            class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">RT</span></div><a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">Sahid</h6>
        </a>
        <p class="mb-0 font-roboto">RT 01</p>
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
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>RW Umban Sari</h6>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="C_dashboard_rw"><i
                                data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href=""><i
                                data-feather="users"></i><span>Warga</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="{{ route('rt.pengaduan.home') }}"><i
                                data-feather="message-circle"></i><span>Pengaduan</span></a>
                    </li>
                    <li>
                        <form action="{{ route('warga.logout') }}" method="POST" id="form-id">
                            @csrf
                            <a class="nav-link menu-title link-nav"
                                onclick="document.getElementById('form-id').submit();"><i
                                    data-feather="log-out"></i><span>Keluar</span></a>
                        </form>
                    </li>
                    {{-- <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Warga</span></a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="">Tambah warga</a></li>
                                <li><a href="">Tabel warga</a></li>
                            </ul>
                        </li> --}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<!-- Page Sidebar Ends-->
