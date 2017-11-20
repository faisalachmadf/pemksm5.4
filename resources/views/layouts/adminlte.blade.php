<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
  @include('layouts.admin_layout.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.admin_layout.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.admin_layout.sidemenu')
  


  <!-- Content Wrapper. Konten Isi -->
  @yield('content')




  <!-- /.content-wrapper, Footer -->
 @include('layouts.admin_layout.footer')
  
</div>
<!-- ./wrapper -->

<!-- Modal Global -->
<div id="modal-global" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-global-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-global-label"></h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- jQuery 3 -->
 @include('layouts.admin_layout.script')
</body>
</html>
