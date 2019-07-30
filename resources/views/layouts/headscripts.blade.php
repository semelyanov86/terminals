<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
@if(Route::currentRouteName() == 'report.incassation' || Route::currentRouteName() == 'report.terminals')
    <!-- DataTables -->
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Multi Item Selection examples -->
    <link href="{{asset('assets/plugins/datatables/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
@endif
<!-- App css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/all.css')}}" rel="stylesheet" type="text/css" />

<script src="{{asset('assets/js/modernizr.min.js')}}"></script>