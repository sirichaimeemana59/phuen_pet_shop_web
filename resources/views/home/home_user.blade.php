<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Phuen Pet Shop</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{!! url('/') !!}/home/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{!! url('/') !!}/home/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{!! url('/') !!}/home/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{!! url('/') !!}/home/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{!! url('/') !!}/home/images/favicon.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo" href="index.html"><img src="home/images/logo.svg" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="home/images/logo-mini.svg" alt="logo"/></a>
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{!! trans('messages.lang') !!}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{!! url('/locale/th') !!}">
                            <i class="mdi mdi-settings text-primary"></i>
                            Thai
                        </a>
                        <a class="dropdown-item" href="{!! url('/locale/en') !!}">
                            <i class="mdi mdi-settings text-primary"></i>
                            English
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown mr-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-message-text mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="home/images/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal">David Grey
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    The meeting is cancelled
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="home/images/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal">Tim Cook
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    New product launch
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="home/images/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown mr-4">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-success">
                                    <i class="mdi mdi-information mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-warning">
                                    <i class="mdi mdi-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-info">
                                    <i class="mdi mdi-account-box mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="home/images/faces/face5.jpg" alt="profile"/>
                        <span class="nav-profile-name">Louis Barnett</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="mdi mdi-settings text-primary"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="{!! url('/logout') !!}">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @if(Auth::user()->role == 0)
            @include('home.menu_employee')
        @elseif(Auth::user()->role == 1)
            @include('home.home_customer')
        @endif
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                {{--<div class="row">--}}
                    {{--<div class="col-md-12 grid-margin stretch-card">--}}
                        {{--<div class="card">--}}
                            {{--<div class="card-body dashboard-tabs p-0">--}}
                                {{--<ul class="nav nav-tabs px-4" role="tablist">--}}
                                    {{--<li class="nav-item">--}}
                                        {{--<a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item">--}}
                                        {{--<a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Sales</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item">--}}
                                        {{--<a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Purchases</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                                {{--<div class="tab-content py-0 px-0">--}}
                                    {{--<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">--}}
                                        {{--<div class="d-flex flex-wrap justify-content-xl-between">--}}
                                            {{--<div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Start date</small>--}}
                                                    {{--<div class="dropdown">--}}
                                                        {{--<a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                            {{--<h5 class="mb-0 d-inline-block">26 Jul 2018</h5>--}}
                                                        {{--</a>--}}
                                                        {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">--}}
                                                            {{--<a class="dropdown-item" href="#">12 Aug 2018</a>--}}
                                                            {{--<a class="dropdown-item" href="#">22 Sep 2018</a>--}}
                                                            {{--<a class="dropdown-item" href="#">21 Oct 2018</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Revenue</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">$577545</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-eye mr-3 icon-lg text-success"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Total views</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">9833550</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-download mr-3 icon-lg text-warning"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Downloads</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">2233783</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Flagged</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">3497843</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">--}}
                                        {{--<div class="d-flex flex-wrap justify-content-xl-between">--}}
                                            {{--<div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Start date</small>--}}
                                                    {{--<div class="dropdown">--}}
                                                        {{--<a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                            {{--<h5 class="mb-0 d-inline-block">26 Jul 2018</h5>--}}
                                                        {{--</a>--}}
                                                        {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">--}}
                                                            {{--<a class="dropdown-item" href="#">12 Aug 2018</a>--}}
                                                            {{--<a class="dropdown-item" href="#">22 Sep 2018</a>--}}
                                                            {{--<a class="dropdown-item" href="#">21 Oct 2018</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-download mr-3 icon-lg text-warning"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Downloads</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">2233783</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-eye mr-3 icon-lg text-success"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Total views</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">9833550</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Revenue</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">$577545</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Flagged</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">3497843</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">--}}
                                        {{--<div class="d-flex flex-wrap justify-content-xl-between">--}}
                                            {{--<div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Start date</small>--}}
                                                    {{--<div class="dropdown">--}}
                                                        {{--<a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                            {{--<h5 class="mb-0 d-inline-block">26 Jul 2018</h5>--}}
                                                        {{--</a>--}}
                                                        {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">--}}
                                                            {{--<a class="dropdown-item" href="#">12 Aug 2018</a>--}}
                                                            {{--<a class="dropdown-item" href="#">22 Sep 2018</a>--}}
                                                            {{--<a class="dropdown-item" href="#">21 Oct 2018</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Revenue</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">$577545</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-eye mr-3 icon-lg text-success"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Total views</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">9833550</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-download mr-3 icon-lg text-warning"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Downloads</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">2233783</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">--}}
                                                {{--<i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>--}}
                                                {{--<div class="d-flex flex-column justify-content-around">--}}
                                                    {{--<small class="mb-1 text-muted">Flagged</small>--}}
                                                    {{--<h5 class="mr-2 mb-0">3497843</h5>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


                @yield('content')

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<!-- plugins:js -->
<script src="{!! url('') !!}/home/vendors/base/vendor.bundle.base.js"></script>
<script src="{!! url('') !!}/home/vendors/chart.js/Chart.min.js"></script>
<script src="{!! url('') !!}/home/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{!! url('') !!}/home/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{!! url('') !!}/home/js/off-canvas.js"></script>
<script src="{!! url('') !!}/home/js/hoverable-collapse.js"></script>
<script src="{!! url('') !!}/home/js/template.js"></script>
<script src="{!! url('') !!}/home/js/dashboard.js"></script>
<script src="{!! url('') !!}/home/js/data-table.js"></script>
<script src="{!! url('') !!}/home/js/jquery.dataTables.js"></script>
<script src="{!! url('') !!}/home/js/dataTables.bootstrap4.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('script')

</body>
</html>


