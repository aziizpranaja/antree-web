<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Antree | Virtual Queue</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}

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
                        <h1>Antree</h1>
                    </span>
                    <span class="logo-sm">
                        <h1>A</h1>
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
                            <a href="{{ url('ticket') }}" class="side-nav-link">
                                <i class="uil-ticket"></i>
                                <span> Ticket </span>
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
                                        <img src="assets/images/users/profile.png" alt="user-image" class="rounded-circle">
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
                                    <h4 class="page-title">Hello {{ Auth::user()->name }} !</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="card tilebox-one">
                                    <div class="card-body">
                                        <a href="{{ url('queue') }}">
                                            <div class="card bg-success text-white">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h4> Call Queue</h4>
                                                    </div>
                                                </div> <!-- end card-body-->
                                            </div>
                                        </a>
                                    </div> <!-- end card-body-->
                                </div>
                                <!--end card-->
                            </div> <!-- end col -->

                            <div class="col-xl-9 col-lg-8">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="assets/images/users/profile.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                        <h4 class="mb-0 mt-2">{{ $mercant->mercant_name }}</h4>
                                        <p class="text-muted font-14">{{ $mercant->mercant_code }}</p>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card card-body">
                                                    <h5 class="card-title">Total Ticket</h5>
                                                    <h1>{{ $allTicket }}</h1>
                                                </div> <!-- end card-->
                                            </div> <!-- end col-->
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Ongoing
                                                    </div>
                                                    <div class="card-body">
                                                        <blockquote class="card-bodyquote">
                                                            <h1>{{ $allOngoing }}</h1>
                                                        </blockquote>
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card-->
                                            </div> <!-- end col-->

                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Cancel
                                                    </div>
                                                    <div class="card-body">
                                                        <blockquote class="card-bodyquote">
                                                            <h1>{{ $allCancel }}</h1>
                                                        </blockquote>
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card-->
                                            </div> <!-- end col-->

                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Pending
                                                    </div>
                                                    <div class="card-body">
                                                        <blockquote class="card-bodyquote">
                                                            <h1>{{ $allPending }}</h1>
                                                        </blockquote>
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card-->
                                            </div> <!-- end col-->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div>
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
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- third party js -->
        <!-- <script src="assets/js/vendor/Chart.bundle.min.js"></script> -->
        <script src="assets/js/vendor/apexcharts.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.dashboard-analytics.js"></script>
        <!-- end demo js-->
    </body>

</html>
