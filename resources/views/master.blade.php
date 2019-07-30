<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>{{ (!empty($title) ? $title : 'Панель администрирования платёжных терминалов') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Платёжные терминалы - панель администратора" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @include('layouts.headscripts')

</head>


<body>

<!-- Begin page -->
<div id="wrapper">
<div id="app">

    <!-- Top Bar Start -->
    @include('layouts.topbar')
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.sidebar')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    @yield('content')

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
</div>
<!-- END wrapper -->

@include('layouts.bottomscripts')
</body>
</html>