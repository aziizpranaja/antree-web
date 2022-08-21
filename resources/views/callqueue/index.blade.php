<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Antree | Virtual Queue</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- third party css -->
        <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- LOGO -->
                <a href="{{ url('dashboard') }}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="55">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/favicon.png')}}" alt="" height="55">
                    </span>
                </a>

                <div class="h-100" id="leftside-menu-container" data-simplebar="">

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a href="{{ url('dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span class=" active"> Dashboards </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ url('profile') }}" class="side-nav-link">
                                <i class="uil-user"></i>
                                <span> Profile </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ url('nowserve') }}" class="side-nav-link">
                                <i class="uil-play"></i>
                                <span> Now Serve </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ url('ticket') }}" class="side-nav-link">
                                <i class="uil-ticket"></i>
                                <span> History </span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{asset('assets/images/users/profile.png')}}" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                                        <span class="account-position">{{ Auth::user()->level }}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="{{ url('logout') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                        </form>
                                    </div>
                                    <h4 class="page-title">{{ $mercant->mercant_name }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xxl-6 col-lg-6">
                                <div class="card widget-flat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-account-multiple widget-icon bg-white text-primary"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Approach</h6>
                                        <h3 class="mt-3 mb-3">{{ $allPending }}</h3>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-6 col-lg-6">
                                <div class="card widget-flat bg-success text-white">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Done</h6>
                                        <h3 class="mt-3 mb-3">{{ $allDone }}</h3>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>

                            <div class="col-xl-12 col-lg-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card text-center">
                                            <div class="card-header">
                                                Now Serve
                                            </div>
                                            <div class="card-body">
                                                <blockquote class="card-bodyquote">
                                                    @if($ongoing == null)
                                                        <h1>0</h1>
                                                    @else
                                                        <h1>{{ $ongoing->queue_number }}</h1>
                                                    @endif
                                                </blockquote>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div>
                                <!-- end row -->
                                <div class="card text-center">
                                    <div class="row">
                                        <div class="card-body">
                                            @if($queue == null)
                                                <button disabled class="btn btn-primary mb-2"  type="submit">
                                                    Call Queue
                                                </button>
                                            @else
                                                <form action="{{ url('queue/'.$queue->id) }}" method="POST">
                                                    {{csrf_field()}}
                                                    @method('PUT')
                                                    @if($ongoing == null)
                                                        <button class="btn btn-primary"  type="submit">
                                                            Call Queue
                                                        </button>

                                                    @else
                                                        <button disabled class="btn btn-primary"  type="submit">
                                                            Call Queue
                                                        </button>
                                                    @endif
                                                </form><br>
                                            @endif
                                        </div> <!-- end card-body -->
                                        <div class="card-body">
                                            @if($ongoing == null)
                                                <button disabled class="btn btn-success mb-2"  type="submit">
                                                    Done Queue
                                                </button>
                                            @else
                                                <form action="{{ url('queue/done/'.$ongoing->id) }}" method="POST">
                                                    {{csrf_field()}}
                                                    @method('PUT')
                                                    @if($ongoing == null)
                                                        <button disabled class="btn btn-success"  type="submit">
                                                            Done Queue
                                                        </button>
                                                    @else
                                                        <button class="btn btn-success"  type="submit">
                                                            Done Queue
                                                        </button>
                                                    @endif
                                                </form><br>
                                            @endif
                                        </div> <!-- end card-body -->
                                    </div>
                                </div> <!-- end card -->
                            </div>

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Antree - Virtual Queue
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <!-- bundle -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        <!-- third party js -->
        <!-- <script src="assets/js/vendor/Chart.bundle.min.js"></script> -->
        <script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{asset('assets/js/pages/demo.dashboard-analytics.js')}}"></script>
        <!-- end demo js-->
    </body>

</html>
