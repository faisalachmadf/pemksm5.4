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

<!-- jQuery 3 -->
 @include('layouts.admin_layout.script')
</body>
</html>
