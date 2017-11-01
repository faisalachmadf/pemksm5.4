<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
  @include('layouts_user.admin_layoutuser.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts_user.admin_layoutuser.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts_user.admin_layoutuser.sidemenu')
  <!-- Content Wrapper. Konten Isi -->
  @yield('content')
  <!-- /.content-wrapper, Footer -->
 @include('layouts_user.admin_layoutuser.footer')
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
 @include('layouts_user.admin_layoutuser.script')
</body>
</html>
