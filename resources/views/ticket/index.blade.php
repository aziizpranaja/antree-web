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
                        <img src="assets/images/Logo.png" alt="" height="55">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/favicon.png" alt="" height="55">
                    </span>
                </a>

                <div class="h-100" id="leftside-menu-container" data-simplebar="">

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a href="{{ url('dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboard </span>
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
                                    <h4 class="page-title">History Ticket</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="select2-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p class="mb-1 fw-bold text-muted">Select Status</p>
                                                        <select class="form-control select2" data-toggle="select2" id="status" name="status" onchange="selectFunction()">
                                                            <option value="">Select</option>
                                                            <option value="done">Done</option>
                                                            <option value="cancel">Cancel</option>
                                                        </select>
                                                    </div> <!-- end col -->

                                                    <div class="col-lg-6">
                                                        <div class="mb-3 position-relative" id="datepicker1">
                                                            <p class="mb-1 fw-bold text-muted">Select Date</p>
                                                            <input type="date" name="date" id="date"
                                                                value="{{ request('date') }}" required class="form-control" onchange="selectFunction()"/>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane show active" id="basic-datatable-preview">
                                                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Name</th>
                                                                                    <th>Queue Number</th>
                                                                                    <th>Date</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>
                                                                    </div> <!-- end preview-->
                                                                </div> <!-- end tab-content-->
                                                            </div> <!-- end card body-->
                                                        </div> <!-- end card -->
                                                    </div><!-- end col-->
                                                </div>
                                                <!-- end row-->
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                    </div> <!-- container -->

                </div> <!-- content -->

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

        <!-- Typehead -->
        <script src="assets/js/vendor/handlebars.min.js"></script>
        <script src="assets/js/vendor/typeahead.bundle.min.js"></script>

        <!-- Demo -->
        <script src="assets/js/pages/demo.typehead.js"></script>

        <!-- Timepicker -->
        <script src="assets/js/pages/demo.timepicker.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="assets/js/vendor/dataTables.buttons.min.js"></script>
        <script src="assets/js/vendor/buttons.bootstrap5.min.js"></script>
        <script src="assets/js/vendor/buttons.html5.min.js"></script>
        <script src="assets/js/vendor/buttons.flash.min.js"></script>
        <script src="assets/js/vendor/buttons.print.min.js"></script>
        <script src="assets/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="assets/js/vendor/dataTables.select.min.js"></script>
        <script src="assets/js/vendor/flatpickr.min.js"></script>
        <script src="assets/js/vendor/select2.full.min.js"></script>
        <!-- third party js ends -->

        <script>

            let status = 0;
            let date = "{{ date('Y-m-d') }}";

            $(document).ready(() => {
                $('#status').select2();
            });

            const dataTable_Ajax = (date, status) => {
            var dt_ajax_table = $("#basic-datatable");
            // console.log(dt_ajax_table.length);
            if (dt_ajax_table.length) {
                const dt_ajax = dt_ajax_table.dataTable({
                    processing: true,
                    ordering: false,
                    // dom: '<"d-flex justify-content-between align-items-end mx-0 row"<"col"l><"col-md-auto"f><"col col-lg-2 p-0."<"#button.btn btn-md btn-outline-primary">>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    // drawCallback: function() {
                    //     $(this.api().table().header()).hide();
                    // },
                    ajax: {
                        url: `/ticket/get?status=${status}&date=${date}`,
                        method: 'GET'
                    },
                    scrollX: true,
                    language: {
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        },
                    },
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'queue_number',
                            name: 'Queue Number'
                        },
                        {
                            data: 'date',
                            name: 'date'
                        },
                        {
                            data: (data) => {
                                switch (data.status) {
                                    case 'done':
                                        return '<span class="badge bg-success rounded-pill">Done</span>';
                                        break;
                                    case 'cancel':
                                        return '<span class="badge bg-secondary text-light rounded-pill">Cancelled</span>';
                                        break;
                                }
                            },
                            name: 'status'
                        },

                    ],
                    columnDefs: [{
                        targets: 1,
                        className: 'text-center',
                    }],
                });
            }
        }

        let statusId = '';
        const selectFunction = () => {
            status = $('#status').val();
            date = $('#date').val();
            (status === null) ? status = 0: status;
            (date === null) ? date = 0: date;
            $("#basic-datatable").DataTable().destroy();
            dataTable_Ajax(date, status);
        };

        dataTable_Ajax(date, status);
        </script>

    </body>
</html>
