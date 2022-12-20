<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Employee Reimbursement System - Packages Group">
    <meta name="keywords" content="voucher, travelling, allowances">
    <meta name="author" content="PIXINVENT">
    <title>HR Dashboard</title>
    <link rel="apple-touch-icon" href="{{asset('assets/img/icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/icon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END Custom CSS-->
    @yield('header')
</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
      data-menu="horizontal-menu" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{URL::to('dashboard')}}">
                        <img class="brand-logo" alt="ers logo" src="{{asset('assets/img/logo-packages.png')}}">
                        <h3 class="brand-text">HR Vacancy Dashboard</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
{{--                    <li class="dropdown dropdown-user nav-item mega-dropdown">--}}
{{--                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">--}}
{{--                            <span class="mr-1">Help & Feedback</span>--}}
{{--                        </a>--}}
{{--                        <ul class="mega-dropdown-menu dropdown-menu row">--}}
{{--                            <li class="col-md-4">--}}
{{--                                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-info-circle"></i> Help</h6>--}}
{{--                                <div id="mega-menu-carousel-example">--}}
{{--                                    <div>--}}
{{--                                        <p class="news-content">--}}
{{--                                        <h4>In case of any ambiguity or problem, please feel free to contact:</h4>--}}
{{--                                        <hr>--}}
{{--                                        <h5>Rana Sajid</h5>--}}
{{--                                        <p>Accounts Executive</p>--}}
{{--                                        <p><span><i class="la la-envelope"></i></span> <a href="mailto:rana.sajid@packages.com.pk">rana.sajid@packages.com.pk</a></p>--}}
{{--                                        <p><span><i class="la la-phone-square"></i></span> +92 (423) 5811 541-6 EXT: 470</p>--}}
{{--                                        <p><span><i class="la la-mobile"></i></span> +92 3324 809509 </p>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="col-md-4">--}}
{{--                                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-info-circle"></i> Help Documents</h6>--}}
{{--                                <div id="mega-menu-carousel-example">--}}
{{--                                    <div>--}}
{{--                                        <p class="news-content">--}}
{{--                                        <h4>User Guide for Travel Order and DA Claim</h4>--}}
{{--                                        <hr>--}}
{{--                                        <p><a href="{{asset('assets/help/Travel-Order-Guide.pdf')}}" target="_blank">User Guide</a></p>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="col-md-4">--}}
{{--                                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-envelope-o"></i> Feedback</h6>--}}
{{--                                <form class="form form-horizontal" action="{{URL::to('feedback')}}" method="post">--}}
{{--                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                    <div class="form-body">--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-12">--}}
{{--                                                <div class="position-relative has-icon-left">--}}
{{--                                                    <textarea class="form-control" id="inputMessage1" rows="6" maxlength="255" placeholder="Please give your feedback here" name="feedback"></textarea>--}}
{{--                                                    <div class="form-control-position pl-1"><i class="la la-commenting-o"></i></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-sm-12 mb-1">--}}
{{--                                                <button class="btn btn-info float-right" type="submit"><i class="la la-paper-plane-o"></i> Send </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">Hello,
                              <span class="user-name text-bold-700">{{$user->employee_name}}</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{URL::to('profile')}}"><i class="ft-user"></i> Profile</a>
                            <a class="dropdown-item" href="{{URL::to('logout')}}"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{$path == 'dashboard' ? 'active':""}}">
                <a class="nav-link" href="{{URL::to('dashboard')}}"><i class="la la-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-th-list"></i><span>Vacancy</span></a>
                <ul class="dropdown-menu">
                    <li data-menu="" class="{{$path == 'vacancy/add' ? 'active':""}}">
                        <a class="dropdown-item" href="{{URL::to('vacancy/add')}}" data-toggle="dropdown"><i class="la la-angle-right"></i>New Vacancy</a>
                    </li>
                    <li data-menu="" class="{{$path == 'vacancy' ? 'active':""}}">
                        <a class="dropdown-item" href="{{URL::to('vacancy')}}" data-toggle="dropdown"><i class="la la-angle-right"></i>All Vacancy</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-file"></i><span>Trainings</span></a>
                <ul class="dropdown-menu">
                    <li data-menu="" class="{{$path == 'training/add' ? 'active':""}}">
                        <a class="dropdown-item" href="{{URL::to('training/add')}}" data-toggle="dropdown"><i class="la la-angle-right"></i>New Training</a>
                    </li>
                    <li data-menu="" class="{{$path == 'trainings' ? 'active':""}}">
                        <a class="dropdown-item" href="{{URL::to('trainings')}}" data-toggle="dropdown"><i class="la la-angle-right"></i>All Trainings</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="app-content content">
    <div class="content-wrapper">
        <div id="jsMessage"></div>
        @if (count($errors) > 0)
            <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh!</strong> Please fix the following issues to continue
                <ul class="error">
                    @foreach ($errors->all() as $error)
                        <li style="list-style: circle">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has("error"))
            <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh!</strong> {{ Session::get("error") }}
            </div>
        @endif
        @if(Session::has("systemError"))
            <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh! Please contact system administrator.</strong><br>{{ Session::get("systemError") }}<br><br><strong>Sorry for Inconvenience</strong>.
            </div>
        @endif
        @if(Session::has("success"))
            <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Yeah!</strong> {{ Session::get("success") }}
            </div>
        @endif
        @yield('body')
    </div>
</div>
<footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; {{date('Y')}} <a class="text-bold-800 grey darken-2" href="https://systemspackages.com" target="_blank">Systems Department, Packages Limited. </a>, All rights reserved. </span>
    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
<script type="text/javascript" src="{{asset('app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="{{asset('app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
<!-- END PAGE LEVEL JS-->

@yield('footer')
</body>
</html>
