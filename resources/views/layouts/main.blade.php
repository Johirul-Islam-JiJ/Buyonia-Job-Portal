<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{$existing_setting->name}}</title>
    {{-- font awesome 4 icons--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="layout-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/images/{{$existing_setting->favicon}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('layout-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->

    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow mt-0">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a>
                    </li>
                </ul>






            </div>

        </div>
        <span class="nav navbar-nav align-items-center mt-1 mr-1 p-0">

            <span class="nav-item dropdown dropdown-user p-0"><a class="nav-link dropdown-toggle dropdown-user-link p-0" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none p-0"><span class="user-name font-weight-bolder  bg-light-success p-1 rounded">{{ Auth::user()->name  }} <i class="fa fa-angle-down"></i></span></div>
                    <span class="avatar"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('setting.index') }}">
                        <i class="mr-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="mr-50" data-feather="power"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </span>
        </span>
    </nav>


    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/home') }}"><span class="brand-logo">

                            <img src="/images/{{$existing_setting->logo}}">
                        </span>
                        <h2 class="brand-text">{{$existing_setting->name}}</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a class="d-flex align-items-center " href="{{ url('/home') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>

                </li>
                {{-- <li class="nav-item {{ request()->routeIs('trees-grid*') ? 'active' : '' }}"><a class="d-flex align-items-center " href="{{ url('/trees-grid') }}"><i class='fa fa-th'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Trees Grid</span></a>--}}

                {{-- </li>--}}



                <li class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}"><a class="d-flex align-items-center " href="{{ route('user.index') }}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Users</span></a>

                </li>
                @can('role-management')
                <li class="nav-item {{ request()->routeIs('role.*') ? 'active' : '' }}"><a class="d-flex align-items-center " href="{{ route('role.index') }}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Roles</span></a>

                </li>
                <li class="nav-item {{ request()->routeIs('permission.*') ? 'active' : '' }}"><a class="d-flex align-items-center " href="{{ route('permission.index') }}"><i data-feather="shield-off"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Permissions</span></a>

                </li>
                @endcan
                <li class="nav-item {{ request()->routeIs('setting.index') ? 'active' : '' }}"><a class="d-flex align-items-center " href="{{ route('setting.index') }}"><i data-feather="settings"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Settings</span></a>

                </li>


            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->


    @yield('content')


    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0 text-center"><span>Developed By Buyonia Limited | COPYRIGHT &copy; {{ $existing_setting->copyright }}</span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <script src="{{asset('layout-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('layout-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('layout-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('layout-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('layout-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('layout-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14
                    , height: 14
                });
            }

        })

    </script>
</body>
<!-- END: Body-->

</html>
