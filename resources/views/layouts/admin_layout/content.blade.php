@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('customCss')
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
        Dashboard
        <small>Admin panel</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="col-md-11">
        <h2>Selamat Datang <font color="red">{{ $userLogin['first_name'] }}</font></h2>
        <h3> pada Halaman Admin Website Biro Pemerintahan dan Kerja Sama </h3>
        <h4> developed by : Kasubbag Perencanaan dan Ketatausahaan </h4>
        <h6> <i>jika mengalami kendala, harap hubungi Tim Developer, --  Terima Kasih -- </i></h6>
       
      </div>

      <hr/>
     
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
       
          <!-- /.box (chat box) -->

          

          <!-- quick email widget -->
          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient"> <!-- /.box-body-->          </div>
          <!-- /.box -->

          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient"> <!-- /.box-body -->            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  
@endsection

@section('customJs')
@endsection
