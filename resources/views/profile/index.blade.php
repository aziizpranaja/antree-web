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
                                        <!-- Standard  modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="edit-max" data-bs-target="#standard-modal">Edit Max Ticket</button>
                                    </div>
                                    <h4 class="page-title">Profile Mercant</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- Standard modal content -->
                        <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="standard-modalLabel">Edit Max Ticket</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_max" action="" class="form-data-validate" novalidate method="POST">
                                            @csrf
                                            <input type="hidden" name="id" id="id"
                                                value="{{ $mercant->id }}">
                                            <div class="mb-3">
                                                <label for="max" class="form-label">Max Ticket</label>
                                                <input class="form-control" type="number" id="max" name="max" required="" placeholder="Michael Zenaty" value="{{$mercant->max_ticket}}">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="submitMax" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Profile -->
                                <div class="card bg-primary">
                                    <div class="card-body profile-user-box" id="card-profile">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-lg">
                                                            <img src="{{asset('assets/images/users/profile.png')}}" alt="" class="rounded-circle img-thumbnail">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <h4 class="mt-1 mb-1 text-white">{{ $mercant->mercant_name }}</h4>
                                                            <p class="font-13 text-white-50">{{ $mercant->mercant_code }}</p>
                                                            <li class="list-inline-item">
                                                                <h5 class="mb-1" style="color:white">Max Ticket</h5>
                                                                <p class="mb-0 font-13 text-white-50">{{ $mercant->max_ticket }}</p>
                                                            </li>

                                                            <ul class="mb-0 list-inline text-light">
                                                                <li class="list-inline-item me-3">
                                                                    <h5 class="mb-1">Address</h5>
                                                                    <p class="mb-0 font-13 text-white-50">{{ $mercant->address }}</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h5 class="mb-1">Phone</h5>
                                                                    <p class="mb-0 font-13 text-white-50">{{ $mercant->phone }}</p>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <h5 class="mb-1">Email</h5>
                                                                    <p class="mb-0 font-13 text-white-50">{{ $mercant->mercant_email }}</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col-->
                                        </div> <!-- end row -->
                                    </div> <!-- end card-body/ profile-user-box-->
                                </div><!--end profile/ card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
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
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        <script>

            $(document).on('click', '#edit-max', async function(event) {
            $('#standart-modal').modal('show');
            const btnEdit = $('#submitMax').attr('id', 'submitMax');
            const id = $(this).data('id');
            $('#modal-title').text('Edit Max Ticket');
            const idForm = $('form#form_max').attr('id', 'form_max');
            $('#max').removeClass(['is-invalid', 'invalid-more']);

            submitEditMax();
        });

            const submitEditMax = () => {
            Array.prototype.filter.call($('#form_max'), function(form) {
                $('#submitMax').unbind().on('click', function(event) {
                    if (form.checkValidity() === false) {
                        form.classList.add('invalid');
                    }

                    form.classList.add('was-validated');
                    event.preventDefault();

                    const formEditData = document.querySelector('#form_max');
                    if (formEditData) {
                        const request = new FormData(formEditData);

                        const data = {
                            _token: request.get('_token'),
                            id: request.get('id'),
                            max_ticket: request.get('max'),
                        };
                        console.log(data);

                        const id = $('#id').val();

                        fetch(`/edit-max/${id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify(data),
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.error) {
                                    if (data.message) {
                                        throw data.message;
                                    }

                                    $.each(data.error, (prefix, val) => {
                                        $(`#${prefix}`).addClass('is-invalid');
                                        $(`#${prefix}`).addClass('invalid-more');
                                        $(`.${prefix}_error`).text(val[0]);
                                    });

                                } else {
                                    setTimeout(() => {
                                        $("#card-profile").load(window.location.href +
                                            " #card-profile");
                                    }, 0);

                                    $('#standard-modal').modal('hide');
                                }
                            }).catch((error) => {
                                console.error('Error:', error);
                            });
                    } else {
                        submitMax();
                    }
                });
            });
        };
        </script>

    </body>
</html>
