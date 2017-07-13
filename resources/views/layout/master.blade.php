<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" value="{{csrf_token()}}">
    <title>@yield('page-title', 'Dashboard')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('partials.layout.header-scripts')
    @yield('header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('partials.layout.nav')
    <!-- Left side column. contains the logo and sidebar -->
    @include('partials.layout.left-sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        @yield('page-header')
        <section class="content" id="app">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.8
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    @include('partials.layout.right-sidebar')
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('partials.layout.footer-scripts')
</body>
</html>
