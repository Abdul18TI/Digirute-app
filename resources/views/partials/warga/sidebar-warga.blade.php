<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">Warga</span></div>
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->nama_lengkap }}</h6></a>
        <p class="mb-0 font-roboto">RT {{ auth()->user()->rt_rel->no_rt }} RW {{auth()->user()->rt_rel->rw_rel->no_rw }}</p>
        <ul>
            <li>
                <span><span class="counter">19.8</span>k</span>
                <p>Follow</p>
            </li>
            <li>
                <span>2 year</span>
                <p>Experince</p>
            </li>
            <li>
                <span><span class="counter">95.2</span>k</span>
                <p>Follower</p>
            </li>
        </ul>
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
                            <h6>General</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{routeActive('warga.home')}}" href="{{ route('warga.home') }}"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{  prefixActive('warga.pengaduan.*') }}" href="javascript:void(0)"><i data-feather="message-circle"></i><span>Pengaduan</span></a>                  
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('warga.pengaduan.*') }};">
                            <li><a  href="{{ route('warga.pengaduan.index') }}" class="{{routeActive('warga.pengaduan.index')}}">Pengaduan Warga</a></li>
                            <li><a href="{{ route('warga.pengaduan.pribadi') }}" class="{{routeActive('warga.pengaduan.pribadi')}}">Pengaduan Pribadi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{routeActive('warga.rw-rt')}}" href="{{ route('warga.rw-rt') }}"><i data-feather="users"></i><span>Profile RT RW</span></a>
                    </li>
                    
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>