<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ancol</title>
    <style>
        .fc-toolbar-title {
            color: black;
            font-weight: bold;
        }
    </style>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css ">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }} ">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }} ">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }} ">
    <!-- Jquery Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ url('assets/logo_ancol_putih.png') }}" alt="" width="222px" height="72px">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                @if (Auth::check())
                    @if (Auth::user()->role === 'admin')
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="{{ url('assets/user_profile.jpg') }}" class="img-circle elevation-2"
                                    alt="User Image">
                            </div>
                            <div class="info">
                                <a href="{{ url('user') }}" class="d-block">{{ Auth::user()->name }}</a>
                            </div>
                        </div>
                        <!-- SidebarSearch Form -->
                        <div class="form-inline">
                            <!-- Sidebar Menu -->
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                    data-accordion="false">
                                    <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                                    <!-- List Pemesanan -->
                                    <li class="nav-item ">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Pemesanan
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('pemesanan') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Daftar Pemesanan</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('pemesanan/pending') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Pending</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('pemesanan/create') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tambah Pemesanan</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- List Rombongan -->
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-chart-pie"></i>
                                            <p>
                                                Rombongan
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('rombongan') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Daftar Rombongan</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('rombongan/create') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tambah Rombongan</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- List Venue  -->
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tree"></i>
                                            <p>
                                                Venue
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('venue') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Daftar Venue</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('venue/create') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tambah Venue</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- List Item  -->
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-edit"></i>
                                            <p>
                                                Item
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('item') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Daftar Item</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('item/create') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tambah Item</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/logout" class="nav-link">
                                            <p>
                                                Logout
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                        <!-- /.sidebar -->
                    @else
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="{{ url('assets/user_profile.jpg') }}" class="img-circle elevation-2"
                                    alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                            </div>
                        </div>
                        <!-- SidebarSearch Form -->
                        <div class="form-inline">
                            <!-- Sidebar Menu -->
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
                                    role="menu" data-accordion="false">
                                    <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                                    <!-- List Pemesanan -->
                                    <li class="nav-item ">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Pemesanan
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('pemesanan') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Daftar Pemesanan</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('pemesanan/create') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tambah Pemesanan</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- List Rombongan -->
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-chart-pie"></i>
                                            <p>
                                                Rombongan
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('rombongan') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Daftar Rombongan</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('rombongan/create') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tambah Rombongan</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- List Venue  -->
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tree"></i>
                                            <p>
                                                Venue
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('venue') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Daftar Venue</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('venue/create') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tambah Venue</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- List Item  -->
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tree"></i>
                                            <p>
                                                Item
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('item') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Daftar Item</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('item/create') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tambah Item</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/logout" class="nav-link">
                                            <p>
                                                Logout
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                    @endif
                @endif
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                @yield('header')
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            {{-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol> --}}
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @include('sweetalert::alert')
                @yield('content')
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>
</body>

</html>
