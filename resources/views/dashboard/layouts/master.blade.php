<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dashboard/plugins/sweetalert2/sweetalert2.min.css') }}">
    <style>
        [class*=sidebar-dark-] {
            background-color: #a9bfd4;
        }
        [class*=sidebar-dark-] .sidebar a {
            color: #000000;
            font-weight: 600;
        }
        .nav-pills .nav-link{
            transition: .3s;
        }
        .nav-pills .nav-link:not(.active):hover {
            color: #264a70 !important;
            background: white !important;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #134e8d;
            color: #fff;
        }
    </style>
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('dashboard.layouts.navbar')

        @include('dashboard.layouts.sidebar')

        <div class="content-wrapper">
            @yield('breadcrump')
            @include('dashboard.layouts.errors')

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- /.content -->
        </div>

        @include('dashboard.layouts.footer')
    </div>

    <!-- jQuery -->
    <script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('dashboard/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
