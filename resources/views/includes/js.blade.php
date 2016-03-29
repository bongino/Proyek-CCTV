{{--{!! HTML::script('bootstrap/js/jquery-2.1.1.min.js') !!}--}}
{{--{!! HTML::script('bootstrap/js/bootstrap.min.js') !!}--}}
        <!-- jQuery -->
<script src="{{ asset('assets/js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('assets/js/plugins/metisMenu/metisMenu.min.js')}}"></script>

<!-- DataTables JavaScript -->
<script src="{{ asset('assets/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('assets/js/sb-admin-2.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>