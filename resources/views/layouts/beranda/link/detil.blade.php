@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('customCss')
@endsection


@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
        <h1>Detail</h1>
  
      
    </section>

    <!-- Main content -->

    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('link.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="username" class="col-sm-4 control-label">Gambar :</label>

              <div class="col-sm-4">
                <p class="form-control-static"><img src="{{ asset('image/beranda/'. $links->gambar) }}" class="img-responsive"  width="600px"></p>
              </div>
            </div>
           
            <div class="form-group">
              <label for="first_name" class="col-sm-4 control-label">Nama Link:</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $links->judul }}</p>
              </div>
            </div>
             <div class="form-group">
              <label for="first_name" class="col-sm-4 control-label">Link Aplikasi:</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $links->link }}</p>
              </div>
            </div>
          
           
          </div>
          <!-- /.box-body -->
        </form>
      </div>
  
    </section>






  
  
  
  
 


    </section>
    <!-- /.content -->
  </div>
  
@endsection



