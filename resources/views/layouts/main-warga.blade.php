<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href={{ asset("assets/images/favicon.png")}} type="image/x-icon">
    <link rel="shortcut icon" href={{ asset("assets/images/favicon.png")}} type="image/x-icon">
    <title>Digirute | {{ $title }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/fontawesome.css") }}>
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/icofont.css")}}>
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/themify.css")}}>
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/flag-icon.css")}}>
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/feather-icon.css")}}>
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/animate.css")}}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/chartist.css")}}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/owlcarousel.css")}}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/prism.css")}}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/datatables.css")}}>
    <!-- Plugins css Ends-->
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/date-picker.css")}}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/owlcarousel.css")}}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/prism.css")}}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/whether-icon.css")}}>
    <!-- Plugins css Ends-->
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/datatables.css")}}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/datatable-extension.css")}}>
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/bootstrap.css")}}>
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/style.css")}}>
    <link id="color" rel="stylesheet" href={{ asset("assets/css/color-1.css")}} media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/responsive.css")}}>
    <!-- latest jquery-->
    <script src={{ asset("assets/js/jquery-3.5.1.min.js")}}></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header close-icon">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
                                src={{ asset("assets/images/logo/logo.png")}} alt=""></a></div>
                    <div class="dark-logo-wrapper"><a href="index.html"><img class="img-fluid"
                                src={{ asset("assets/images/logo/dark-logo.png")}} alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
                            id="sidebar-toggle"></i></div>
                </div>

                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus">
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>
                        <li class="onhover-dropdown p-0">
                            <form action="{{ route('warga.logout');}}" class="m-0" method="POST">
                                @csrf
                            <button class="btn btn-primary-light" ><i
                                        data-feather="log-out"></i>Keluar</a></button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
        <!-- Page Header Ends -->

        @include('partials.sidebar-warga')

        @yield('container')

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2021-22 © Team Digirute PCR.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Innovillage2021 <i class="fa fa-heart font-secondary"></i></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
<!-- latest jquery-->
<script src="{{asset("assets/js/jquery-3.5.1.min.js")}}"></script>
<!-- feather icon js-->
<script src="{{asset("assets/js/icons/feather-icon/feather.min.js")}}"></script>
<script src="{{asset("assets/js/icons/feather-icon/feather-icon.js")}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset("assets/js/sidebar-menu.js")}}"></script>
<script src="{{asset("assets/js/config.js")}}"></script>
<!-- Bootstrap js-->
<script src="{{asset("assets/js/bootstrap/popper.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap/bootstrap.min.js")}}"></script>
<!-- Plugins JS start-->
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset("assets/js/script.js")}}"></script>
<script src="{{asset("assets/js/theme-customizer/customizer.js")}}"></script>
<!-- login js-->
<!-- Plugin used-->

    {{-- <!-- feather icon js-->
    <script src={{ asset("assets/js/icons/feather-icon/feather.min.js")}}></script>
    <script src={{ asset("assets/js/icons/feather-icon/feather-icon.js")}}></script>
    <!-- Sidebar jquery-->
    <script src={{ asset("assets/js/sidebar-menu.js")}}></script>
    <script src={{ asset("assets/js/config.js")}}></script>
    <!-- Bootstrap js-->
    <script src={{ asset("assets/js/bootstrap/popper.min.js")}}></script>
    <script src={{ asset("assets/js/bootstrap/bootstrap.min.js")}}></script>
    <!-- Plugins JS start-->
    <script src={{ asset("assets/js/chart/chartjs/chart.min.js")}}></script>
    <script src={{ asset("assets/js/chart/chartist/chartist.js")}}></script>
    <script src={{ asset("assets/js/chart/chartist/chartist-plugin-tooltip.js")}}></script>
    <script src={{ asset("assets/js/chart/knob/knob.min.js")}}></script>
    <script src={{ asset("assets/js/chart/apex-chart/apex-chart.js")}}></script>
    <script src={{ asset("assets/js/chart/apex-chart/stock-prices.js")}}></script>
    <script src={{ asset("assets/js/owlcarousel/owl-custom.js")}}></script>
    <script src={{ asset("assets/js/dashboard/dashboard_2.js")}}></script>
    <script src={{ asset("assets/js/datatable/datatables/datatable.custom.js")}}></script>
    <script src={{ asset("assets/js/datatable/datatables/jquery.dataTables.min.js")}}></script>
    <script src={{ asset("assets/js/datatable/datatable-extension/dataTables.buttons.min.js")}}></script>
    <script src={{ asset("assets/js/prism/prism.min.js")}}></script>
    <script src={{ asset("assets/js/clipboard/clipboard.min.js")}}></script>
    <script src={{ asset("assets/js/counter/jquery.waypoints.min.js")}}></script>
    <script src={{ asset("assets/js/counter/jquery.counterup.min.js")}}></script>
    <script src={{ asset("assets/js/counter/counter-custom.js")}}></script>
    <script src={{ asset("assets/js/custom-card/custom-card.js")}}></script>
    <script src={{ asset("assets/js/datepicker/date-picker/datepicker.js")}}></script>
    <script src={{ asset("assets/js/datepicker/date-picker/datepicker.en.js")}}></script>
    <script src={{ asset("assets/js/datepicker/date-picker/datepicker.custom.js")}}></script>
    <script src={{ asset("assets/js/owlcarousel/owl.carousel.js")}}></script>
    <script src={{ asset("assets/js/general-widget.js")}}></script>
    <script src={{ asset("assets/js/height-equal.js")}}></script>
    <script src={{ asset("assets/js/tooltip-init.js")}}></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src={{ asset("assets/js/script.js")}}></script>
    <script src={{ asset("assets/js/theme-customizer/customizer.js")}}></script> --}}
    @yield('js')
</body>

</html>