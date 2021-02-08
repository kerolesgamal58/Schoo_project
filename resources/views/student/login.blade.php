<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin
        Dashboard
    </title>
    <link rel="apple-touch-icon" href="{{ asset('adminpanel/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('adminpanel/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/vendors/css/forms/icheck/custom.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/custom-rtl.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/assets/css/style-rtl.css') }}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <img src="{{ asset('adminpanel/app-assets/images/logo/logo-dark.png') }}" alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>{{ __('admin.login') }}</span>
                                </h6>
                            </div>



                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('student.post_login') }}" method="POST">
                                        @csrf

                                        @include('teacher.layouts.message')

                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" class="form-control input-lg" name="email" placeholder="{{ __('admin.enter_email') }}">
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                            <div class="help-block font-small-3"></div>
                                            @error('email')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control input-lg" name="password" placeholder="{{ __('admin.enter_password') }}">
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                            <div class="help-block font-small-3"></div>
                                            @error('password')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-md-left">
                                                <fieldset>
                                                    <input type="checkbox" name="remember_me" class="chk-remember" value="1">
                                                    <label for="remember-me"> {{ __('admin.remember_me') }}</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> {{ __('admin.login') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                                                                                     target="_blank">PIXINVENT </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{ asset('adminpanel/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('adminpanel/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('adminpanel/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('adminpanel/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminpanel/app-assets/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminpanel/app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('adminpanel/app-assets/js/scripts/forms/form-login-register.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
