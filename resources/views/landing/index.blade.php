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

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    </head>

    <body class="loading" data-layout-config='{"darkMode":false}'>

        <!-- NAVBAR START -->
        <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
            <div class="container">

                <!-- logo -->
                <a href="index.html" class="navbar-brand me-lg-5">
                    <h1>Antree</h1>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <!-- menus -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <!-- left menu -->
                    <ul class="navbar-nav me-auto align-items-center">
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="{{ url('loginpage') }}">Login</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="{{ url('registerpage') }}">Register</a>
                        </li>
                    </ul>

                    <!-- right menu -->
                    {{-- <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item me-0">
                            <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm" target="_blank" class="nav-link d-lg-none">Purchase now</a>
                            <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm" target="_blank" class="btn btn-sm btn-light btn-rounded d-none d-lg-inline-flex">
                                <i class="mdi mdi-basket me-2"></i> Purchase Now
                            </a>
                        </li>
                    </ul> --}}

                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->

        <!-- START HERO -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="mt-md-4">
                            <h2 class="text-white fw-normal mb-4 mt-3 hero-title">
                                Virtual Queue
                            </h2>

                            <p class="mb-4 font-16 text-white-50">
                                everywhere, every time, make it easier</p>

                            <a href="{{ url('loginpage') }}" class="btn btn-success">Login Mercant <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-2">
                        <div class="text-md-end mt-3 mt-md-0">
                            <img src="assets/images/startup.svg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HERO -->

        <!-- START FEATURES 2 -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1 class="mt-0"><i class="mdi mdi-heart-multiple-outline"></i></h1>
                            <h3>Features you'll <span class="text-danger">love</span></h3>
                            <p class="text-muted mt-2">Antree comes with next generation virtual queue
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 py-5 align-items-center">
                    <div class="col-lg-5">
                        <img src="assets/images/5556.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <h3 class="fw-normal">Online Booking</h3>
                        <p class="text-muted mt-3">
                            Can be done anywhere at any time and not complicated.</p>

                        {{-- <div class="mt-4">
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Projects & Tasks</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Ecommerce Application Pages</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Profile, pricing, invoice</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Login, signup, forget password</p>
                        </div> --}}

                    </div>
                </div>

                <div class="row pb-3 pt-5 align-items-center">
                    <div class="col-lg-6">
                        <h3 class="fw-normal">One Platform for All</h3>
                        <p class="text-muted mt-3">The simplest and fastest way to book and queue up.</p>

                        {{-- <div class="mt-4">
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Built with latest Bootstrap</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Extensive use of SCSS variables</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Well documented and structured code</p>
                            <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Detailed Documentation</p>
                        </div> --}}

                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <img src="assets/images/3331057.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </section>
        <!-- END FEATURES 2 -->

        <!-- START FOOTER -->
        <footer class="bg-dark py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 style="color: white">Antree</h1>
                        <p class="text-muted mt-4">everywhere, every time, make it easier.</p>

                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>

                    </div>

                    {{-- <div class="col-lg-2 mt-3 mt-lg-0">
                        <h5 class="text-light">Company</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">About Us</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Documentation</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Blog</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Affiliate Program</a></li>
                        </ul>

                    </div>

                    <div class="col-lg-2 mt-3 mt-lg-0">
                        <h5 class="text-light">Apps</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Ecommerce Pages</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Email</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Social Feed</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Projects</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Tasks Management</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 mt-3 mt-lg-0">
                        <h5 class="text-light">Discover</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Help Center</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Our Products</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Privacy</a></li>
                        </ul>
                    </div> --}}
                </div>

            </div>
        </footer>
        <!-- END FOOTER -->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

    </body>

</html>
