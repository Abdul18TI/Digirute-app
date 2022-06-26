
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="pixelstrap">
        <link rel="icon" href="{{ asset('assets/images/favicon.png')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" type="image/x-icon">
        <title>Digirute | Login RW</title>
        <!-- Google font-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css')}}">
        <!-- ico-font-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css')}}">
        <!-- Themify icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify.css')}}">
        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flag-icon.css')}}">
        <!-- Feather icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/feather-icon.css')}}">
        <!-- Plugins css start-->
        <!-- Plugins css Ends-->
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css')}}">
        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
        <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css')}}" media="screen">
        <!-- Responsive css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css')}}">
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
    <section>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <form class="theme-form login-form" method="POST" action="{{ route('rw.check-login') }}">
                            @csrf
                            <h4>Login RW</h4>
                            <h6>Selamat Datang RW Kelurahan Umban Sari.</h6>
                                 @if (session()->has('gagal'))
                                <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                                    <strong>Gagal login ! </strong> {{ session('gagal') }}.
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close" data-bs-original-title="" title=""></button>
                                </div>
                                @endif
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                                    <input class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" type=" text" placeholder="Username" autofocus >
                                    @error('username')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="password" name="password" placeholder="*********">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                   @enderror
                                    {{-- <div class="show-hide"><span class="show"> </span></div> --}}
                                </div>
                             <small class="text-danger pl-3">
                            </div>
                            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Login</button></div>
                        </form>
                            <div class="login-social-title">
                                <h5>Login Sebagai</h5>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4"><a class="btn btn-primary btn-block" href="{{ route('warga.login')}}">Warga</a></div>
                                    <div class="col-4"><a class="btn btn-light active txt-dark disabled" href="">RW</a></div>
                                    <div class="col-4"><a class="btn btn-primary btn-block" href="{{ route('rt.login')}}">RT</a></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-wrapper end-->
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/sidebar-menu.js')}}"></script>
    <script src="{{ asset('assets/js/config.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
</body>

</html>