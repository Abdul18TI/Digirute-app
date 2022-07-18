<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="logo-wrapper"><a href="#"><img class="img-fluid"
                        src="{{ asset('assets/images/logo/logofix2.png') }}" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="#"><img class="img-fluid"
                        src="{{ asset('assets/images/logo/dark-logo.png') }}" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">
                </i></div>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>
                <li class="onhover-dropdown p-0">
                    <form action="{{ route('rt.logout') }}" class="m-0" method="POST">
                        @csrf
                        <button class="btn btn-primary-light"><i data-feather="log-out"></i>Keluar</a></button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>
