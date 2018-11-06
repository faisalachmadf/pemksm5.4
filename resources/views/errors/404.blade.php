<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PemKSM | 404 Page not found</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="{{ asset('/adminkelola/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Font Awesome -->
  <link href="{{ asset('/adminkelola/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Ionicons -->
  <link href="{{ asset('/adminkelola/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Theme style -->
  <link href="{{ asset('/adminkelola/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="{{ asset('/adminkelola/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper no-margin">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow no-margin"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Halaman tidak ditemukan.</h3>

          <p>
            <a href="{{ request()->segment(1) == 'adminpanel' ? route('admin.dashboard') : route('index') }}">Kembali ke Halaman Utama</a>.
          </p>

        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-margin">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="{{ route('index') }}">Biro Pemerintahan dan Kerja Sama</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('/adminkelola/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/adminkelola/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/adminkelola/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/adminkelola/dist/js/adminlte.min.js') }}"></script>
<!-- Custom Script -->
<script type="text/javascript">
  $(function() {
    var wrapper = $(window).height() - $('footer').outerHeight();
    $('body').css('min-height', $(window).height());
    $('.wrapper, .content-wrapper').css('min-height', wrapper);
    $('.content-header').css('min-height', (wrapper - $('.content').outerHeight()) / 2);
    $(window).resize();
  })
</script>
</body>
</html>
