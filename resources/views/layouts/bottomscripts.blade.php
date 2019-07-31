<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
{{--<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>--}}
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>

@if(Route::currentRouteName() == 'report.incassation' || Route::currentRouteName() == 'report.terminals' || Route::currentRouteName() == 'report.payments' || Route::currentRouteName() == 'report.filials')
    <!-- Required datatable js -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>

    <!-- Key Tables -->
    <script src="{{asset('assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

    <!-- Selection table -->
    <script src="{{asset('assets/plugins/datatables/dataTables.select.min.js')}}"></script>
    <script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>
    <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/timepicker/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/pages/jquery.form-advanced.init.js')}}"></script>
    @if(Route::currentRouteName() != 'report.terminals' && Route::currentRouteName() != 'report.filials')
        {!! $dataTable->scripts() !!}
    @endif
@endif

<!-- Dashboard init -->
{{--<script src="{{asset('js/all.js')}}"></script>--}}
<script src="{{asset('assets/js/jquery.dashboard.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/jquery.core.js')}}"></script>
<script src="{{asset('assets/js/jquery.app.js')}}"></script>