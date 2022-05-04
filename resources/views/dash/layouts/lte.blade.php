<?php
/**
 * Created by PhpStorm
 * User: Junior Trust
 * Date: 8/13/2020
 * Time: 6:39 PM
 */
?>

    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{asset('lte/dist/css/adminlte.min.css')}}>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('lte/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('lte/plugins/load-mask/dist/app.min.css')}}">
    <link rel="stylesheet" href="{{asset("lte/plugins/datetimepicker/tempusdominus-bootstrap-4.min.css")}}" />

    @yield('css')
</head>
<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../../index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('lte/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('lte/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="#link={{route("dash",null,false)}}" class="nav-link dash_page active">
                            <i class="nav-icon fas  fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link dash_grp">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Catalog
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#link={{route("catalog_create_view",null,false)}}" class="nav-link dash_page">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#link={{route("catalog_list_view",null,false)}}" class="nav-link dash_page">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#link={{route("catalog_view",1,false)}}" class="nav-link dash_page">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link  dash_grp">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                               Create Transactions
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">6</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#link={{route("transaction_create_view",["type"=>"sales"],false)}}" class="nav-link dash_page">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sales</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#link={{route("transaction_create_view",["type"=>"credit_sales"],false)}}" class="nav-link dash_page">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Credit Sales</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#link={{route("transaction_create_view",["type"=>"purchase"],false)}}" class="nav-link dash_page">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Purchases</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#link={{route("transaction_create_view",["type"=>"credit_purchase"],false)}}" class="nav-link dash_page">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Credit Purchases</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                View Transactions
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#link={{route("transaction_list_view",["type"=>"purchase"],false)}}" class="nav-link dash_page">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#link={{route("transaction_aggregate_view",["type"=>"purchase"],false)}}" class="nav-link dash_page">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Aggregate</p>
                                </a>
                            </li>

                        </ul>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

   @yield("content")

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.4
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lte/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('lte/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('lte/plugins/auto-resize/autosize.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{asset('lte/dist/js/demo.js')}}"></script>--}}
<script src="{{asset("js/jHelper.js")}}" type="text/javascript"></script>
<script src="{{asset('lte/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('lte/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- Data tables -->
<script src="{{asset('lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>

<script type="text/javascript" src="{{asset("lte/plugins/moment/moment.min.js")}}"></script>
<script type="text/javascript" src="{{asset("lte/plugins/datetimepicker/tempusdominus-bootstrap-4.min.js")}}"></script>


<script>
    function logOut() {

        document.getElementById('logout-form').submit();

        return false

    }
</script>
<script src="{{asset('lte/plugins/load-mask/dist/app.min.js')}}"></script>
<script src="{{asset('js/date format.js')}}"></script>

@yield("js")

@yield("modals")

</body>
</html>
