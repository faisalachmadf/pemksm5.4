  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title','ADMIN BIRO PEMERINTAHAN DAN KERJASAMA | Dashboard')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Datatables -->
  <link href="{{ asset('/adminkelola/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css">
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
  <!-- Morris chart -->
  <link href="{{ asset('/adminkelola/bower_components/morris.js/morris.css') }}" rel="stylesheet" type="text/css">
  <!-- jvectormap -->
  <link href="{{ asset('/adminkelola/bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" type="text/css">
  <!-- Date Picker -->
  <link href="{{ asset('/adminkelola/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
  
  <!-- Daterange picker -->
  <link href="{{ asset('/adminkelola/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="{{ asset('/adminkelola/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link href="{{ asset('/adminkelola/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Global CSS -->
  <link href="{{ asset('/css/global.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom CSS -->
  @yield('customCss')
