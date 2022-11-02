<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon.ico') }}">
    <link href="{{url('gymove/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gymove/vendor/select2/css/select2.min.css') }}">
    <link href="{{url('gymove/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{url('gymove/css/style.css')}}" rel="stylesheet">
    @stack('style')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    @include('sweetalert::alert')
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="index.html')}}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('gymove/images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('gymove/images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('gymove/images/logo-text.png') }}" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                @yield('judulmenu')
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="{{ asset('gymove/images/profile/17.jpg') }}" alt=""/>
                                    <div class="header-info">
                                        <span class="text-black"><strong>{{ auth()->user()->name }}</strong></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        {{--  --}}
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="{{ Request::segment(1) == 'dashboard' ? 'mm-active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="ai-icon {{ Request::segment(1) == 'dashboard' ? 'mm-active' : '' }}" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('working.hour') }}" class="ai-icon {{ Request::segment(1) == 'working-hour' ? 'mm-active' : '' }}" aria-expanded="false">
                            <i class="flaticon-381-alarm-clock"></i>
                            <span class="nav-text">Jam Kerja</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('division') }}" class="ai-icon {{ Request::segment(1) == 'division' ? 'mm-active' : '' }}" aria-expanded="false">
                            <i class="flaticon-381-briefcase"></i>
                            <span class="nav-text">Divisi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('employe') }}" class="ai-icon {{ Request::segment(1) == 'employe' ? 'mm-active' : '' }}" aria-expanded="false">
                            <i class="flaticon-381-id-card-1"></i>
                            <span class="nav-text">Karyawan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-calendar-6"></i>
                            <span class="nav-text">Absensi</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-exit-2"></i>
                            <span class="nav-text">Keluar</span>
                        </a>
                    </li>
                </ul>
                <div class="add-menu-sidebar">
                    <img src="{{ asset('gymove/images/calendar.png') }}" alt="" class="mr-3">
                    <p class="	font-w500 mb-0">Attendance App</p>
                </div>
                <div class="copyright">
                    <p><strong>Attendance App</strong> © 2020 All Rights Reserved</p>
                    <p>Made with <span class="heart"></span> by DexignZone</p>
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        @yield('container')
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2020</p>
            </div>
        </div>
    </div>
    
    <script src="{{asset('gymove/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('gymove/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('gymove/js/custom.min.js')}}"></script>
    <script src="{{asset('gymove/js/deznav-init.js')}}"></script>
    
    <script src="{{asset('gymove/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('gymove/js/plugins-init/datatables.init.js')}}"></script>
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
@stack('script')
</body>
</html>