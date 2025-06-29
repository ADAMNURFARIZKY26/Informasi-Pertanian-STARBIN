<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') | Admin</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <link rel="stylesheet" href="{{asset('dashboard-admin/plugins/fontawesome-free/css/all.min.css')}}" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{asset('dashboard-admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard-admin/plugins/jqvmap/jqvmap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard-admin/dist/css/adminlte.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard-admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard-admin/plugins/daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard-admin/plugins/summernote/summernote-bs4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('authentikasi/sign-in/css/flashmassage.css')}}" />
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <div class="wrapper">

        @include('layouts.admin.partials.navbar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('layouts.admin.partials.footer')

    </div>

    <script src="{{asset('dashboard-admin/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <script src="{{asset('dashboard-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/sparklines/sparkline.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('dashboard-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('dashboard-admin/dist/js/adminlte.js')}}"></script>
    <script src="{{asset('dashboard-admin/dist/js/pages/dashboard.js')}}"></script>
</body>

</html>