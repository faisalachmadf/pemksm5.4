
<!-- jQuery -->
<script src="{{ asset('/adminkelola/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/adminkelola/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- DataTables -->
<script src="{{ asset('/adminkelola/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/adminkelola/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/adminkelola/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('/adminkelola/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('/adminkelola/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/adminkelola/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('/adminkelola/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/adminkelola/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/adminkelola/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('/adminkelola/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/adminkelola/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('/adminkelola/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
</script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/adminkelola/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- CK Editor -->
<script src="{{ asset('/adminkelola/bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('/adminkelola/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/adminkelola/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/adminkelola/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('/adminkelola/dist/js/pages/dashboard.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('/adminkelola/dist/js/demo.js') }}"></script> -->
<!-- Laravel JS -->
<script src="{{ asset('/js/laravel.js') }}"></script>
<!-- Global JS -->
<script src="{{ asset('/js/global.js') }}"></script>

<script>
  $(function () {
    $('#example1').DataTable({
      'processing'  :true,
      'serverside'  :true,
      'paging'      :true,
       'paging'      : true,
    })

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

  })
</script>

<!-- Custom JS -->
@yield('customJs')

